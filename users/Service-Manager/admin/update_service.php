<?php
include 'includes/session.php';
include 'includes/conn.php';

if (!isset($_SESSION['admin'])) {
    header('location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Update the service details
    $sql = "UPDATE services SET service_name = ?, description = ?, price = ? WHERE service_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssdi', $name, $description, $price, $id); // Corrected type specifier

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Service updated successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while updating the service';
    }

    $stmt->close();
    $conn->close();
} else {
    $_SESSION['error'] = 'Invalid request';
}

header('location: manage_services.php');
exit();
?>
