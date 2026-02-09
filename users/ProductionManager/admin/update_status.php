<?php
// Start session and include necessary files
include 'includes/session.php';
include 'includes/conn.php'; // Assuming this includes your database connection

// Check if ID parameter exists in the URL
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];

    // Update task status in the database
    $query = "UPDATE product_tenders SET supplier_status = 1 WHERE id = '$task_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['success'] = "Product status updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update product status: " . mysqli_error($conn);
    }
} else {
    $_SESSION['error'] = "Product ID not provided.";
}

// Redirect back to the supervisor panel page
header("Location: pending-tasks.php");
exit();
?>
