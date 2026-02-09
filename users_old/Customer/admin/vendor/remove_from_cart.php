<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    // Remove product from cart
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['product_id'] == $product_id) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
                $_SESSION['success'] = 'Product removed from cart';
                break;
            }
        }
    }
} else {
    $_SESSION['error'] = 'Invalid request';
}

header("Location: cart.php");
exit();
?>
