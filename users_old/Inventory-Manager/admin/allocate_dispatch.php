<?php
include 'includes/session.php';
include 'includes/conn.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve POST data
    $order_id = $_POST['order_id'];
    $supervisor = $_POST['supervisor'];

    // Fetch order details from the database
    $query = "SELECT o.order_id, o.idnumber, o.fname, o.lname, o.email, o.phone, o.address, 
                    GROUP_CONCAT(oi.product_name ORDER BY oi.order_item_id SEPARATOR '<br>') as product_names,
                    GROUP_CONCAT(CASE WHEN oi.product_name = 'Total Price' THEN NULL ELSE oi.price END ORDER BY oi.order_item_id SEPARATOR '<br>') as prices,
                    GROUP_CONCAT(CASE WHEN oi.product_name = 'Total Price' THEN NULL ELSE oi.quantity END ORDER BY oi.order_item_id SEPARATOR '<br>') as quantities,
                    GROUP_CONCAT(oi.total ORDER BY oi.order_item_id SEPARATOR '<br>') as totals,
                    o.totalamount, 
                    o.transactioncode, 
                    o.payment_status, 
                    o.date_paid,
                    o.dispatch_status
            FROM orders o
            INNER JOIN order_items oi ON o.order_id = oi.order_id
            WHERE o.order_id = ?
            GROUP BY o.order_id";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    if ($order) {
        // Update orders table to mark dispatch allocation
        $updateQuery = "UPDATE orders SET dispatch_status = 1 WHERE order_id = ?";
        $stmtUpdate = $conn->prepare($updateQuery);
        $stmtUpdate->bind_param('i', $order_id);
        $stmtUpdate->execute();

        // Check if the dispatch_status was successfully updated to 1
        if ($stmtUpdate->affected_rows > 0) {
            // Insert into dispatch_tasks table
            $insertQuery = "INSERT INTO dispatch_tasks (idnumber, fname, lname, email, phone, address, productname, quantity, dispatch, status, date_allocated, driver_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 0, NOW(), 0)";
            $stmtInsert = $conn->prepare($insertQuery);
            $stmtInsert->bind_param('sssssssss', $order['idnumber'], $order['fname'], $order['lname'], $order['email'], $order['phone'], $order['address'], $order['product_names'], $order['quantities'], $supervisor);
            $stmtInsert->execute();

            if ($stmtInsert->affected_rows > 0) {
                // Set success message in session
                $_SESSION['success'] = 'Dispatch manager allocated and task created successfully.';
            } else {
                // Set error message in session if insert failed
                $_SESSION['error'] = 'Failed to create dispatch task.';
            }
        } else {
            // Set error message in session if update failed
            $_SESSION['error'] = 'Failed to update order dispatch status.';
        }
    } else {
        // Set error message in session if order not found
        $_SESSION['error'] = 'Order not found.';
    }

    // Redirect to allocate-dispatch.php after processing
    header('Location: allocate-dispatch.php');
    exit;
} else {
    // Redirect to allocate-dispatch.php with an error message if not a POST request
    $_SESSION['error'] = 'Invalid request.';
    header('Location: allocate-dispatch.php');
    exit;
}
?>
