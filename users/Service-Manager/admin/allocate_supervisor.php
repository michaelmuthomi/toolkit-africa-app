<?php
include 'includes/session.php';
include 'includes/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $booking_id = $_POST['booking_id'];
  $supervisor = $_POST['supervisor'];

  // Fetch booking details
  $query = "SELECT idnumber, fname, lname, email, phone, address, service FROM booking WHERE booking_id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('i', $booking_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $booking = $result->fetch_assoc();

  if ($booking) {
    // Insert into supervisor_tasks
    $query = "INSERT INTO supervisor_tasks (idnumber, fname, lname, email, phone, address, service, supervisor, status, date_allocated, cleaner_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 0, NOW(), 0)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssssss', $booking['idnumber'], $booking['fname'], $booking['lname'], $booking['email'], $booking['phone'], $booking['address'], $booking['service'], $supervisor);
    $stmt->execute();

    // Update booking table
    $query = "UPDATE booking SET supervisor_status = 1 WHERE booking_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $booking_id);
    $stmt->execute();

    $_SESSION['success'] = 'Supervisor allocated successfully.';
  } else {
    $_SESSION['error'] = 'Booking not found.';
  }

  $stmt->close();
  $conn->close();

  header('Location: booked-services.php');
  exit;
} else {
  $_SESSION['error'] = 'Invalid request.';
  header('Location: home.php');
  exit;
}
?>
