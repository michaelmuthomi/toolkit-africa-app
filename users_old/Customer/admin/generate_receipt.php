<?php
require_once 'includes/conn.php';

if (!isset($_GET['orderId'])) {
    die("Order ID is required.");
}

$orderId = $_GET['orderId'];

// Fetch order details from the database
$sql = "SELECT o.idnumber, o.fname, o.lname, o.email, o.phone, o.address, 
               GROUP_CONCAT(oi.product_name ORDER BY oi.order_item_id SEPARATOR '<br>') as product_names,
               GROUP_CONCAT(oi.price ORDER BY oi.order_item_id SEPARATOR '<br>') as prices,
               GROUP_CONCAT(oi.quantity ORDER BY oi.order_item_id SEPARATOR '<br>') as quantities,
               GROUP_CONCAT(oi.total ORDER BY oi.order_item_id SEPARATOR '<br>') as totals,
               o.totalamount, 
               o.transactioncode, 
               o.payment_status, 
               o.date_paid
        FROM orders o
        INNER JOIN order_items oi ON o.order_id = oi.order_id
        WHERE o.order_id = ?
        GROUP BY o.order_id";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $orderId);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();

if (!$order) {
    die("Order not found.");
}

// Start output buffering to generate the receipt
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .receipt-container { width: 80%; margin: 0 auto; }
        .company-details { text-align: center; margin-bottom: 20px; }
        .logo { max-width: 150px; height: auto; }
        .receipt-header { text-align: center; margin-bottom: 20px; }
        .receipt-details { margin-bottom: 20px; }
        .receipt-details table { width: 100%; border-collapse: collapse; }
        .receipt-details th, .receipt-details td { padding: 8px; border: 1px solid #ccc; text-align: center; }
        .receipt-total { margin-top: 20px; text-align: right; }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="company-details">
            <img src="../../img/logo2.jpg" alt="Company Logo" class="logo">
            <p>Chemolex</p>
            <p>Ngong Road, Nairobi, Kenya</p>
            <p>Contact: +254787379737</p>
        </div>

        <div class="receipt-header">
            <h2>Order Receipt</h2>
        </div>

        <div class="receipt-details">
            <p><strong>Customer Name:</strong> <?php echo htmlspecialchars($order['fname'] . ' ' . $order['lname']); ?></p>
            <p><strong>Email Address:</strong> <?php echo htmlspecialchars($order['email']); ?></p>
            <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($order['phone']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($order['address']); ?></p>
            <p><strong>Date Paid:</strong> <?php echo htmlspecialchars($order['date_paid']); ?></p>
        </div>

        <div class="receipt-details">
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo nl2br(htmlspecialchars($order['product_names'])); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($order['prices'])); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($order['quantities'])); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($order['totals'])); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="receipt-total">
            <p><strong>Total Amount:</strong> <?php echo htmlspecialchars($order['totalamount']); ?></p>
            <p><strong>Transaction Code:</strong> <?php echo htmlspecialchars($order['transactioncode']); ?></p>
            <p><strong>Payment Status:</strong> <?php echo $order['payment_status'] == 1 ? 'Paid and Approved' : 'Paid and Not Approved'; ?></p>
        </div>
    </div>
</body>
</html>

<?php
$content = ob_get_clean();

// Set headers to download the receipt as a file
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="order_receipt_' . $orderId . '.html"');
header('Content-Length: ' . strlen($content));
echo $content;
exit;
?>
