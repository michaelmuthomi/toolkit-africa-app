<?php
// Include session and database connection files
include 'includes/session.php';
include 'includes/conn.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve POST data
  $booking_id = $_POST['booking_id'];
  $supervisors = $_POST['supervisor']; // Array of selected supervisor IDs

  // Fetch booking details from the database
  $query = "SELECT idnumber, fname, lname, email, phone, address, service, supervisor FROM supervisor_tasks WHERE No = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('i', $booking_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $booking = $result->fetch_assoc();

  if ($booking) {
    // Iterate through selected supervisors and insert into constructor_tasks table
    foreach ($supervisors as $supervisor_id) {
      $insertQuery = "INSERT INTO cleaner_tasks (idnumber, fname, lname, email, phone, address, service, supervisor, cleaner, status, date_allocated) VALUES (?,?,?,?,?,?,?,?,?,0,NOW())";
      $stmtInsert = $conn->prepare($insertQuery);
      $stmtInsert->bind_param('sssssssss', $booking['idnumber'], $booking['fname'], $booking['lname'], $booking['email'], $booking['phone'], $booking['address'], $booking['service'], $booking['supervisor'], $supervisor_id);
      $stmtInsert->execute();
      $stmtInsert->close();
    }

    // Update supervisor_tasks table to mark allocation
    $updateQuery = "UPDATE supervisor_tasks SET cleaner_status = 1 WHERE No = ?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param('i', $booking_id);
    $stmtUpdate->execute();
    $stmtUpdate->close();

    // Set success message in session
    $_SESSION['success'] = 'Waste Collector allocated successfully.';
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
} else {
  // Redirect to booked-services.php if not a POST request
  $_SESSION['error'] = 'Invalid request.';
  header('Location: allocate-workers.php');
  exit;
}
?>
