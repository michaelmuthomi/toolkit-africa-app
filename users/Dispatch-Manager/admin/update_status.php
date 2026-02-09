<?php
include 'includes/conn.php';
session_start(); // Start session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);

    // Update status in database
    $update_sql = "UPDATE dispatch_tasks SET status = 1 WHERE No = '$order_id'";
    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        $_SESSION['success'] = "Delivery Process Started."; // Set success message
        header('Location: pending-deliveries.php'); // Redirect back to index.php
        exit;
    } else {
        $_SESSION['error'] = "Delivery Process start failed: " . mysqli_error($conn); // Set error message
        header('Location: pending-deliveries.php'); // Redirect back to index.php
        exit;
    }
} else {
    // Handle invalid request method if necessary
    $_SESSION['error'] = "Invalid request method";
    header('Location: pending-deliveries.php'); // Redirect back to index.php
    exit;
}
?>
