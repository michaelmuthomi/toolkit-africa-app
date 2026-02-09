<?php
include 'includes/session.php';
include 'includes/conn.php';

if (!isset($_SESSION['admin'])) {
    header('location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Delete the service
    $sql = "DELETE FROM services WHERE service_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Service deleted successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while deleting the service';
    }

    $stmt->close();
    $conn->close();
} else {
    $_SESSION['error'] = 'Invalid request';
}

header('location: manage_services.php');
exit();
?>
