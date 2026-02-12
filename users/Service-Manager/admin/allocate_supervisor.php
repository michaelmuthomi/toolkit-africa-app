<?php
include 'includes/session.php';
// conn.php is already included in session.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  file_put_contents('debug_log.txt', "POST received\n", FILE_APPEND);

  $booking_id = isset($_POST['booking_id']) ? $_POST['booking_id'] : '';
  $supervisor = isset($_POST['supervisor']) ? $_POST['supervisor'] : '';

  file_put_contents('debug_log.txt', "Booking ID: $booking_id, Supervisor: $supervisor\n", FILE_APPEND);

  if (empty($booking_id) || empty($supervisor)) {
    $_SESSION['error'] = 'Invalid request parameters.';
    header('Location: booked-services.php');
    exit;
  }

  // Fetch booking details
  $query = "SELECT idnumber, fname, lname, email, phone, address, service FROM booking WHERE booking_id = ?";
  $stmt = $conn->prepare($query);
  if (!$stmt) {
    file_put_contents('debug_log.txt', "Prepare failed (booking): " . $conn->error . "\n", FILE_APPEND);
    die("Database error: " . $conn->error);
  }

  $stmt->bind_param('i', $booking_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $booking = $result->fetch_assoc();
  $stmt->close();

  if ($booking) {
    file_put_contents('debug_log.txt', "Booking found: " . json_encode($booking) . "\n", FILE_APPEND);

    // Insert into supervisor_tasks
    $query = "INSERT INTO supervisor_tasks (idnumber, fname, lname, email, phone, address, service, supervisor, status, date_allocated, cleaner_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 0, NOW(), 0)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
      file_put_contents('debug_log.txt', "Prepare failed (insert): " . $conn->error . "\n", FILE_APPEND);
      die("Database error (insert): " . $conn->error);
    }

    // Bind parameters - explicitly passing values
    $idnumber = $booking['idnumber'];
    $fname = $booking['fname'];
    $lname = $booking['lname'];
    $email = $booking['email'];
    $phone = $booking['phone'];
    $address = $booking['address'];
    $service = $booking['service'];

    $stmt->bind_param('ssssssss', $idnumber, $fname, $lname, $email, $phone, $address, $service, $supervisor);

    if (!$stmt->execute()) {
      file_put_contents('debug_log.txt', "Execute failed (insert): " . $stmt->error . "\n", FILE_APPEND);
      die("Execution error: " . $stmt->error);
    }
    $stmt->close();

    // Update booking table
    $query = "UPDATE booking SET supervisor_status = 1 WHERE booking_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $booking_id);
    if (!$stmt->execute()) {
      file_put_contents('debug_log.txt', "Execute failed (update): " . $stmt->error . "\n", FILE_APPEND);
    }
    $stmt->close();

    $conn->close();

    $_SESSION['success'] = 'Supervisor allocated successfully.';
    header('Location: booked-services.php');
    exit;

  } else {
    file_put_contents('debug_log.txt', "Booking not found\n", FILE_APPEND);
    $_SESSION['error'] = 'Booking not found.';
    $conn->close();
    header('Location: booked-services.php');
    exit;
  }

} else {
  $_SESSION['error'] = 'Invalid request.';
  header('Location: home.php');
  exit;
}
?>
