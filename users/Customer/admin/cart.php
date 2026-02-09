<?php
session_start();

// Handle updating quantity in the cart
if (isset($_POST['update_quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Update the quantity in the session
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] = $quantity;
    }

    header('Location: cart.php');
    exit();
}

// Handle removing product from the cart
if (isset($_POST['remove_product'])) {
    $product_id = $_POST['product_id'];

    // Remove the product from the session
    unset($_SESSION['cart'][$product_id]);

    header('Location: cart.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="my-4">Shopping Cart</h2>
    <?php if (!empty($_SESSION['cart'])): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total_amount = 0;
                foreach ($_SESSION['cart'] as $product_id => $product): 
                    $total = $product['price'] * $product['quantity'];
                    $total_amount += $total;
                ?>
                    <tr>
                        <td><img src="<?php echo "../../Inventory-Manager/admin/" . $product['image']; ?>" style="width: 50px; height: auto;"></td>
                        <td><?php echo $product['product_name']; ?></td>
                        <td>Ksh. <?php echo number_format($product['price'], 2); ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" min="1" class="form-control" style="width: 80px; display: inline-block;">
                                <button type="submit" name="update_quantity" class="btn btn-primary btn-sm">Update</button>
                            </form>
                        </td>
                        <td>Ksh. <?php echo number_format($total, 2); ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <button type="submit" name="remove_product" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right"><strong>Total Amount</strong></td>
                    <td colspan="2"><strong>Ksh. <?php echo number_format($total_amount, 2); ?></strong></td>
                </tr>
            </tfoot>
        </table>
        <div class="text-center">
            <a href="payment.php" class="btn btn-success">Proceed to Payment</a>
        </div>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
