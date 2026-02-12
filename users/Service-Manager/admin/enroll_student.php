<?php
include 'includes/conn.php';
include 'includes/session.php';

if (isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];

    if (empty($booking_id)) {
        $_SESSION['error'] = 'Invalid request. Missing Booking ID.';
        header('Location: booked-services.php');
        exit();
    }

    // 1. Fetch Booking Details from Chemolex DB
    $stmt = $conn->prepare("SELECT fname, lname, email, phone, address, service FROM booking WHERE booking_id = ?");
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();
    $stmt->close();

    if (!$booking) {
        $_SESSION['error'] = 'Booking not found.';
        header('Location: booked-services.php');
        exit();
    }

    // 2. Connect to E-Learning Database ('open')
    $elearning_db = new mysqli('localhost', 'root', '', 'open');

    if ($elearning_db->connect_error) {
        $_SESSION['error'] = 'Failed to connect to E-Learning database: ' . $elearning_db->connect_error;
        header('Location: booked-services.php');
        exit();
    }

    // 3. Ensure 'Vocational Training' class exists
    $class_name = "Vocational Training";
    $stmt = $elearning_db->prepare("SELECT class_id FROM class WHERE name = ?");
    $stmt->bind_param("s", $class_name);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $class = $result->fetch_assoc();
        $class_id = $class['class_id'];
    } else {
        // Create Class if not exists (Assign to FIRST teacher found as fallback/placeholder)
        $teacher_query = $elearning_db->query("SELECT teacher_id FROM teacher LIMIT 1");
        $teacher_row = $teacher_query->fetch_assoc();
        $teacher_id = $teacher_row ? $teacher_row['teacher_id'] : 0;

        $name_numeric = "VT";
        $insert_class = $elearning_db->prepare("INSERT INTO class (name, name_numeric, teacher_id) VALUES (?, ?, ?)");
        $insert_class->bind_param("ssi", $class_name, $name_numeric, $teacher_id);
        if ($insert_class->execute()) {
            $class_id = $insert_class->insert_id;
        } else {
             $_SESSION['error'] = 'Failed to create Class in E-Learning.';
             $elearning_db->close();
             header('Location: booked-services.php');
             exit();
        }
        $insert_class->close();
    }
    $stmt->close();

    // 4. Check/Create Student
    $stmt = $elearning_db->prepare("SELECT student_id, class_id FROM student WHERE email = ?");
    $stmt->bind_param("s", $booking['email']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        // Optional: Update class if needed, or manage multiple enrollments (complex logic skipped for MVP)
        // For now, assume existing student is fine.
    } else {
        // Create New Student
        // Default password: sha1('1234') -> '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'
        $password = '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'; 
        $full_name = $booking['fname'] . ' ' . $booking['lname'];
        
        // Prepare Insert Query (Matching schema from database.sql)
        // Note: Using default/empty values for non-critical fields to satisfy NOT NULL constraints
        $insert_student = $elearning_db->prepare("INSERT INTO student (name, email, password, phone, address, class_id, section_id, parent_id, transport_id, dormitory_id, house_id, student_category_id, club_id, birthday, age, place_birth, sex, m_tongue, religion, blood_group, city, state, nationality, ps_attended, ps_address, ps_purpose, class_study, date_of_leaving, am_date, tran_cert, dob_cert, mark_join, physical_h, father_name, mother_name, roll, session, card_number, issue_date, expire_date, dormitory_room_number, more_entries, login_status) VALUES (?, ?, ?, ?, ?, ?, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-2026', '', '', '', '', '', '0')");
        
        // Bind Parameters (s=string, i=integer)
        $insert_student->bind_param("sssssi", $full_name, $booking['email'], $password, $booking['phone'], $booking['address'], $class_id);
        
        if (!$insert_student->execute()) {
             $_SESSION['error'] = 'Failed to create Student in E-Learning: ' . $elearning_db->error;
             $elearning_db->close();
             header('Location: booked-services.php');
             exit();
        }
        $insert_student->close();
    }
    $stmt->close();
    $elearning_db->close();

    // 5. Update Enrollment Status in Chemolex DB
    $update_stmt = $conn->prepare("UPDATE booking SET enrollment_status = 1 WHERE booking_id = ?");
    $update_stmt->bind_param("i", $booking_id);
    
    if ($update_stmt->execute()) {
        $_SESSION['success'] = 'Student enrolled successfully into E-Learning system.';
    } else {
        $_SESSION['error'] = 'Student created but failed to update local enrollment status.';
    }
    $update_stmt->close();
    $conn->close();

    header('Location: booked-services.php');
    exit();

} else {
    $_SESSION['error'] = 'Invalid request.';
    header('Location: booked-services.php');
    exit();
}
?>
