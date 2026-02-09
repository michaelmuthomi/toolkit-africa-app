<?php
// Start session and include necessary files
include 'includes/session.php';
include 'includes/conn.php'; // Assuming this includes your database connection

// Check if ID parameter exists in the URL
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];

    // Update task status in the database
    $query = "UPDATE supervisor_tasks SET status = 1 WHERE No = '$task_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['success'] = "Task status updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update task status: " . mysqli_error($conn);
    }
} else {
    $_SESSION['error'] = "Task ID not provided.";
}

// Redirect back to the supervisor panel page
header("Location: pending-tasks.php");
exit();
?>
