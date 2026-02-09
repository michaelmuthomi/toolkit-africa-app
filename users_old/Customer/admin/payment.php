<?php
session_start();
// Check if customer session data is available and is an array
if (!isset($_SESSION['admin']) || !is_array($_SESSION['admin'])) {
    die('Customer session data is missing or not properly initialized.');
}

$total_amount = 0;

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        $total_amount += $product['price'] * $product['quantity'];
    }
}

// Handle payment submission
if (isset($_POST['pay'])) {
    $mpesa_code = $_POST['mpesa_code'];

    // Validate M-Pesa code length
    if (strlen($mpesa_code) != 10) {
        $error = "M-Pesa code must be exactly 10 characters.";
    } else {
        // Include database connection
        require 'includes/dbcon.php'; // Ensure this file sets up $dbh

        // Retrieve customer information from session
        $customer = $_SESSION['admin']; // Assuming session contains an array with customer data
        $customer_id = $customer['idnumber'];
        $fname = $customer['fname'];
        $lname = $customer['lname'];
        $email = $customer['email'];
        $address = $customer['address'];

        // Prepare the products information
        $products_info = [];
        foreach ($_SESSION['cart'] as $product) {
            $products_info[] = $product['product_name'] . " (x" . $product['quantity'] . ")";
        }
        $products_list = implode(', ', $products_info);

        // Insert order details into the `ordering` table
        $query = "INSERT INTO ordering (idnumber, fname, lname, email, address, products, price, transactioncode, payment_status, date)
                  VALUES (:idnumber, :fname, :lname, :email, :address, :products, :price, :transactioncode, :payment_status, NOW())";
        $stmt = $dbh->prepare($query);
        $stmt->execute([
            ':idnumber' => $customer_id,
            ':fname' => $fname,
            ':lname' => $lname,
            ':email' => $email,
            ':address' => $address,
            ':products' => $products_list,
            ':price' => $total_amount,
            ':transactioncode' => $mpesa_code,
            ':payment_status' => 0 // Initial status: Paid awaiting confirmation
        ]);

        // Clear the cart after payment
        $_SESSION['cart'] = [];

        // Redirect to thank you page or receipt page
        header('Location: thank_you.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="my-4">Payment</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <p>Total Amount: <strong>Ksh. <?php echo number_format($total_amount, 2); ?></strong></p>
    <form method="post">
        <div class="form-group">
            <label for="mpesa_code">M-Pesa Code:</label>
            <input type="text" name="mpesa_code" id="mpesa_code" class="form-control" required maxlength="10">
        </div>
        <button type="submit" name="pay" class="btn btn-success">Pay Now</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
