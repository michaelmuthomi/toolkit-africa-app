<?php
include 'includes/conn.php';
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service_id = $_POST['service_id'];
    $supervisor_id = $_POST['supervisor_id'];

    if (empty($service_id) || empty($supervisor_id)) {
        $_SESSION['error'] = 'Invalid request. Missing Course or Supervisor.';
        header('Location: manage_services.php');
        exit();
    }

    // 1. Fetch Supervisor Details from Chemolex DB
    $stmt = $conn->prepare("SELECT fname, lname, email, phone FROM supervisor WHERE idnumber = ?");
    $stmt->bind_param("s", $supervisor_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $supervisor = $result->fetch_assoc();
    $stmt->close();

    if (!$supervisor) {
        $_SESSION['error'] = 'Supervisor not found.';
        header('Location: manage_services.php');
        exit();
    }

    // 2. Fetch Service Details from Chemolex DB
    $stmt = $conn->prepare("SELECT service_name FROM services WHERE service_id = ?");
    $stmt->bind_param("i", $service_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $service = $result->fetch_assoc();
    $stmt->close();

    if (!$service) {
        $_SESSION['error'] = 'Course not found.';
        header('Location: manage_services.php');
        exit();
    }

    // 3. Connect to E-Learning Database ('open')
    // Note: Assuming 'root' with empty password as per typical XAMPP setup and previous investigation
    $elearning_db = new mysqli('localhost', 'root', '', 'open');

    if ($elearning_db->connect_error) {
        $_SESSION['error'] = 'Failed to connect to E-Learning database: ' . $elearning_db->connect_error;
        header('Location: manage_services.php');
        exit();
    }

    // 4. Sync Teacher (Supervisor -> Teacher)
    // Check if teacher exists by email
    $stmt = $elearning_db->prepare("SELECT teacher_id FROM teacher WHERE email = ?");
    $stmt->bind_param("s", $supervisor['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $teacher = $result->fetch_assoc();
        $teacher_id = $teacher['teacher_id'];
    } else {
        // Create new teacher
        // Default password for new teachers (e.g., hash of '123456') - matching typical md5 seen in dump
        // OR using the supervisor's phone as a temporary password/handle
        // Default password for new teachers (e.g., hash of '1234') - matching typical md5 seen in dump
        // OR using the supervisor's phone as a temporary password/handle
        $default_password = sha1('1234'); // '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'
        $role = 2; // Assuming 2 is for teachers based on dump
        
        $insert_teacher = $elearning_db->prepare("INSERT INTO teacher (name, email, password, phone, role, designaton_id, department_id, birthday, sex, religion, blood_group, address, date_of_joining, status) VALUES (?, ?, ?, ?, ?, 0, 0, '', '', '', '', '', NOW(), 1)");
        $full_name = $supervisor['fname'] . ' ' . $supervisor['lname'];
        $insert_teacher->bind_param("sssss", $full_name, $supervisor['email'], $default_password, $supervisor['phone'], $role);
        
        if ($insert_teacher->execute()) {
            $teacher_id = $insert_teacher->insert_id;
        } else {
             $_SESSION['error'] = 'Failed to create Teacher in E-Learning: ' . $elearning_db->error;
             $elearning_db->close();
             header('Location: manage_services.php');
             exit();
        }
        $insert_teacher->close();
    }
    $stmt->close();

    // 5. Sync Class ("Vocational Training")
    // Check if class exists
    $class_name = "Vocational Training";
    $stmt = $elearning_db->prepare("SELECT class_id FROM class WHERE name = ?");
    $stmt->bind_param("s", $class_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $class = $result->fetch_assoc();
        $class_id = $class['class_id'];
    } else {
        // Create new class
        $name_numeric = "VT";
        $insert_class = $elearning_db->prepare("INSERT INTO class (name, name_numeric, teacher_id) VALUES (?, ?, ?)");
        $insert_class->bind_param("ssi", $class_name, $name_numeric, $teacher_id);
        if ($insert_class->execute()) {
            $class_id = $insert_class->insert_id;
        } else { // Fallback if simple insert fails
             $class_id = 0; 
        }
        $insert_class->close();
    }
    $stmt->close();


    // 6. Sync Subject (Service -> Subject)
    // Check if subject exists
    $stmt = $elearning_db->prepare("SELECT subject_id FROM subject WHERE name = ? AND class_id = ?");
    $stmt->bind_param("si", $service['service_name'], $class_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update existing subject's teacher
        $subject = $result->fetch_assoc();
        $update_subject = $elearning_db->prepare("UPDATE subject SET teacher_id = ? WHERE subject_id = ?");
        $update_subject->bind_param("ii", $teacher_id, $subject['subject_id']);
        $update_subject->execute();
        $update_subject->close();
    } else {
        // Create new subject
        $insert_subject = $elearning_db->prepare("INSERT INTO subject (name, class_id, teacher_id) VALUES (?, ?, ?)");
        $insert_subject->bind_param("sii", $service['service_name'], $class_id, $teacher_id);
        $insert_subject->execute();
        $insert_subject->close();
    }
    $stmt->close();

    $elearning_db->close();
    
    $_SESSION['success'] = 'Teacher assigned and E-Learning synchronized successfully.';
    header('Location: manage_services.php');
    exit();

} else {
    header('Location: manage_services.php');
    exit();
}
?>
