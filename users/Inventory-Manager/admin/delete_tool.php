<?php
include 'includes/session.php';
include 'includes/conn.php';

if (!isset($_SESSION['admin'])) {
    header('location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Delete the product
    $sql = "DELETE FROM tools WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Product deleted successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while deleting the product';
    }

    $stmt->close();
    $conn->close();
} else {
    $_SESSION['error'] = 'Invalid request';
}

header('location: tools.php');
exit();
?>
