<?php
session_start();
include 'includes/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Fetch product details
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Add product to cart session variable
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['product_id'] == $product['product_id']) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $item = [
                'product_id' => $product['product_id'],
                'name' => $product['product_name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'image' => $product['image']
            ];
            $_SESSION['cart'][] = $item;
        }

        $_SESSION['success'] = 'Product added to cart';
    } else {
        $_SESSION['error'] = 'Product not found';
    }
    $stmt->close();
} else {
    $_SESSION['error'] = 'Invalid request';
}

header("Location: products.php");
exit();
?>
