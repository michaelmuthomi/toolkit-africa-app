<?php
session_start();
$total_amount = 0;

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        $total_amount += $product['price'] * $product['quantity'];
    }
}

// Generate receipt link (assuming you have a receipt.php file for generating receipt)
$receipt_link = "receipt.php?transactioncode=" . urlencode($mpesa_code); // Pass the transaction code to receipt page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="my-4">Thank You for Your Payment!</h2>
    <p>Your payment was successful. A receipt has been sent to your email.</p>
    <p>Total Amount: <strong>Ksh. <?php echo number_format($total_amount, 2); ?></strong></p>
    <a href="<?php echo $receipt_link; ?>" class="btn btn-primary">Print Receipt</a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
