<?php
include 'includes/conn.php'; // Assuming this includes your database connection

if (isset($_POST['id']) && isset($_POST['status'])) {
    $taskId = $_POST['id'];
    $status = $_POST['status'];

    $query = "UPDATE cleaner_tasks SET status = ? WHERE No = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $status, $taskId);

    if ($stmt->execute()) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>
