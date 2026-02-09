<?php
// Include session and database connection files
include 'includes/session.php';
include 'includes/conn.php';

// Check if the request method is POST
switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    // Retrieve POST data
    $booking_id = $_POST['booking_id'];
    // Console log the booking id
    error_log("Booking ID: " . $booking_id); // Log for debugging
    $supervisors = $_POST['supervisor']; // Array of selected supervisor IDs

  // Fetch booking details from the database
  $query = "SELECT * FROM product_tenders WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('i', $booking_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $booking = $result->fetch_assoc();

  if ($booking) {
    // Iterate through selected supervisors and insert into product_tasks table
      $insertQuery = "INSERT INTO product_tasks (idnumber, fname, lname, email, phone, service, supervisor, cleaner, status, date_allocated) VALUES (?,?,?,?,?,?,?,?,?,NOW())";
    $stmtInsert = $conn->prepare($insertQuery);
    $cleaner = '';
    $status = 0;
    $stmtInsert->bind_param('ssssssssi', $booking['id'], $booking['fname'], $booking['lname'], $booking['email'], $booking['phone'], $booking['title'], $_SESSION['admin'], $cleaner, $status);
    $stmtInsert->execute();
    $stmtInsert->close();

    // Update supervisor_tasks table to mark allocation
    $updateQuery = "UPDATE product_tenders SET cleaner_status = 1 WHERE id = ?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param('i', $booking_id);
    $stmtUpdate->execute();
    $stmtUpdate->close();

    // Set success message in session
    $_SESSION['success'] = 'Recyclers allocated successfully.';
  } else {
    // Set error message in session if booking not found
    $_SESSION['error'] = 'Booking not found.';
  }

  // Close database connection
  $stmt->close();
  $conn->close();
    // Redirect to booked-services.php after processing
    header('Location: allocate-workers.php');
    exit;
    break;
  default:
    // Redirect to booked-services.php if not a POST request
    $_SESSION['error'] = 'Invalid request.';
    header('Location: allocate-workers.php');
    exit;
    break;
}

?>
