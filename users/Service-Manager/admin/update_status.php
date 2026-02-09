<?php
include 'includes/session.php';
include 'includes/conn.php';

if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $updateQuery = "UPDATE services SET status = ? WHERE service_id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('ii', $status, $id);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
    
    $stmt->close();
}
?>
