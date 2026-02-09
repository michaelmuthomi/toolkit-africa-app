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
    $stock = $_POST['stock'];
    $now = date("Y-m-d H:i:s");

    // Image upload handling
    $target_dir = "uploads/";
    $image = $_FILES['image']['name'];
    if($image) {
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES['image']['tmp_name']);
        if($check !== false) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        } else {
            $_SESSION['error'] = 'File is not an image.';
            header("Location: manage_services.php");
            exit();
        }

        $stmt = $conn->prepare("UPDATE products SET product_name = ?, description = ?, price = ?, stock = ?, image = ?, last_update = ? WHERE product_id = ?");
        $stmt->bind_param("ssdisis", $name, $description, $price, $stock, $target_file, $now, $id);
    } else {
        $stmt = $conn->prepare("UPDATE products SET product_name = ?, description = ?, price = ?, stock = ?, last_update = ? WHERE product_id = ?");
        $stmt->bind_param("ssdisi", $name, $description, $price, $stock, $now, $id);
    }
    
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Product updated successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while updating the product';
    }

    $stmt->close();
}

header('location: manage_product.php');
exit();
?>
