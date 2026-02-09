<?php
include 'includes/session.php';
include 'includes/conn.php';

if (!isset($_SESSION['admin'])) {
    header('location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $tool_name = $_POST['tool_name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $now = date("Y-m-d H:i:s");

    // Update the database
    $stmt = $conn->prepare("UPDATE tools SET tool_name = ?, description = ?, quantity = ?, last_update = ? WHERE id = ?");
    $stmt->bind_param("ssisi", $tool_name, $description, $quantity, $now, $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Tool updated successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while updating the tool';
    }

    $stmt->close();
}

header('location: managetools.php');
exit();
?>
