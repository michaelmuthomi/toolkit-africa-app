<?php
session_start();
include 'includes/connection.php';

// Check if admin session exists
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Ensure that the orderId is provided
if (isset($_POST['orderId']) && !empty($_POST['orderId'])) {
    $orderId = $_POST['orderId'];

    // Prepare SQL query to fetch order details
    $order_query = "
        SELECT 
            o.idnumber, 
            o.fname, 
            o.lname, 
            o.email, 
            o.phone, 
            o.address,
            o.order_id, 
            GROUP_CONCAT(oi.product_name ORDER BY oi.order_item_id SEPARATOR '<br>') as product_names,
            GROUP_CONCAT(CASE WHEN oi.product_name = 'Total Price' THEN NULL ELSE oi.price END ORDER BY oi.order_item_id SEPARATOR '<br>') as prices,
            GROUP_CONCAT(CASE WHEN oi.product_name = 'Total Price' THEN NULL ELSE oi.quantity END ORDER BY oi.order_item_id SEPARATOR '<br>') as quantities,
            GROUP_CONCAT(oi.total ORDER BY oi.order_item_id SEPARATOR '<br>') as totals,
            o.totalamount, 
            o.transactioncode, 
            o.payment_status, 
            o.date_paid
        FROM 
            orders o
        INNER JOIN 
            order_items oi ON o.order_id = oi.order_id
        WHERE 
            o.order_id = ?
        GROUP BY 
            o.order_id
    ";

    if ($stmt = mysqli_prepare($conn, $order_query)) {
        mysqli_stmt_bind_param($stmt, "s", $orderId); // Use "s" for strings
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $order = mysqli_fetch_assoc($result);

            // Company Information
            $company_name = "Toolkit Africa.";
            $company_logo = "img/logo.jpg"; // Update with the path to your logo image
            $company_address = "Ngong Road, Nairobi, Kenya";
            $company_phone = "+2547 87379737"; // Update with your company's phone number
            
            // Start Receipt HTML
            $output = "<div style='width: 80%; margin: auto; font-family: Arial, sans-serif;'>
                        <div style='text-align: center;'>
                            <h1>" . htmlspecialchars($company_name) . "</h1>
                            <img src='" . htmlspecialchars($company_logo) . "' alt='Company Logo' style='width: 150px; height: auto;'><br>
                            <p>" . htmlspecialchars($company_address) . "<br>Phone: " . htmlspecialchars($company_phone) . "</p>
                            <hr style='border: 1px solid #000;'>
                            <h2>Order Receipt</h2>
                        </div>
                        <div style='margin: 20px 0; display: flex; justify-content: space-between;'>
                            <div style='width: 45%;'>
                                <p><strong>Full Name:</strong> " . htmlspecialchars($order['fname']) . " " . htmlspecialchars($order['lname']) . "</p>
                                <p><strong>Email:</strong> " . htmlspecialchars($order['email']) . "</p>
                                <p><strong>Phone:</strong> " . htmlspecialchars($order['phone']) . "</p>
                                <p><strong>Address:</strong> " . htmlspecialchars($order['address']) . "</p>
                            </div>
                            <div style='width: 45%; text-align: right;'>
                                <p><strong>Payment Type:</strong> M-pesa</p>
                                <p><strong>Transaction Code:</strong> " . htmlspecialchars($order['transactioncode']) . "</p>
                                <p><strong>Date:</strong> " . htmlspecialchars($order['date_paid']) . "</p>
                            </div>
                        </div>
                        <hr style='border: 1px solid #000;'>
                        <h3>Order Details</h3>
                        <table border='1' cellpadding='8' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                            <thead>
                                <tr>
                                    <th style='border: 1px solid #000;'>Product Name</th>
                                    <th style='border: 1px solid #000;'>Price</th>
                                    <th style='border: 1px solid #000;'>Quantity</th>
                                    <th style='border: 1px solid #000;'>Total</th>
                                </tr>
                            </thead>
                            <tbody>";

            // Split product details
            $product_names = explode('<br>', $order['product_names']);
            $prices = explode('<br>', $order['prices']);
            $quantities = explode('<br>', $order['quantities']);
            $totals = explode('<br>', $order['totals']);

            // Ensure that the counts match
            $total_items = count($product_names);

            for ($i = 0; $i < $total_items; $i++) {
                $output .= "<tr>
                                <td style='border: 1px solid #000;'>" . htmlspecialchars(trim($product_names[$i])) . "</td>
                                <td style='border: 1px solid #000;'>KSh " . htmlspecialchars(trim($prices[$i])) . "</td>
                                <td style='border: 1px solid #000;'>" . htmlspecialchars(trim($quantities[$i])) . "</td>
                                <td style='border: 1px solid #000;'>KSh " . htmlspecialchars(trim($totals[$i])) . "</td>
                            </tr>";
            }

            $output .= "<tr>
                            <td colspan='3' style='border: 1px solid #000; text-align: right;'><strong>Total Amount:</strong></td>
                            <td style='border: 1px solid #000;'>KSh " . number_format($order['totalamount'], 2) . "</td>
                        </tr>
                        <tr>
                            <td colspan='3' style='border: 1px solid #000; text-align: right;'><strong>Amount Paid:</strong></td>
                            <td style='border: 1px solid #000;'>KSh " . number_format($order['totalamount'], 2) . "</td>
                        </tr>
                        <tr>
                            <td colspan='3' style='border: 1px solid #000; text-align: right;'><strong>Change Amount</strong></td>
                            <td style='border: 1px solid #000;'>KSh 0.00</td>
                        </tr>";

            $output .= "</tbody></table>
                        <hr style='border: 1px solid #000;'>
                        <p style='text-align: center;'>Thank you for your purchase!</p>
                        </div>";

            echo $output;
        } else {
            echo "<p>No records found for order ID: " . htmlspecialchars($orderId) . "</p>";
        }

        mysqli_stmt_close($stmt);
    } else {
        die("Query preparation error: " . mysqli_error($conn));
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "<p>Invalid order ID provided.</p>";
}
?>
