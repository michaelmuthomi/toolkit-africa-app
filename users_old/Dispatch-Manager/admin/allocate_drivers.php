<?php
// Include necessary files
include 'includes/session.php';
include 'includes/conn.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and validate POST data
    $order_id = $_POST['no'];
    if (isset($_POST['supervisor'])) {
        $supervisor = $_POST['supervisor'];
    } else {
        $_SESSION['error'] = 'Supervisor not specified.';
        header('Location: allocate_driver.php');
        exit;
    }

    // Fetch order details from the database - CHANGED: using id instead of fname
    $query = "SELECT idnumber, fname, lname, email, phone, address, productname, quantity, dispatch FROM dispatch_tasks WHERE No = ?";
    
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        $_SESSION['error'] = 'Error preparing query: ' . $conn->error;
        header('Location: allocate_driver.php');
        exit;
    }

    $stmt->bind_param('i', $order_id); // Changed to use order_id
    if (!$stmt->execute()) {
        $_SESSION['error'] = 'Error executing query: ' . $stmt->error;
        header('Location: allocate_driver.php');
        exit;
    }

    $result = $stmt->get_result();
    if (!$result) {
        $_SESSION['error'] = 'Error getting result: ' . $stmt->error;
        header('Location: allocate_driver.php');
        exit;
    }

    $order = $result->fetch_assoc();
    if (!$order) {
        $_SESSION['error'] = 'Order not found for the specified order ID.';
        header('Location: allocate_driver.php');
        exit;
    }

    // Update dispatch_tasks table to mark driver_status as 1 (allocated)
    $updateQuery = "UPDATE dispatch_tasks SET driver_status = 1 WHERE No = ?"; // Changed to use id
    $stmtUpdate = $conn->prepare($updateQuery);
    if (!$stmtUpdate) {
        $_SESSION['error'] = 'Error preparing update query: ' . $conn->error;
        header('Location: allocate_driver.php');
        exit;
    }

    $stmtUpdate->bind_param('i', $order_id); // Changed to use order_id
    if (!$stmtUpdate->execute()) {
        $_SESSION['error'] = 'Error updating driver status: ' . $stmtUpdate->error;
        header('Location: allocate_driver.php');
        exit;
    }

    if ($stmtUpdate->affected_rows > 0) {
        // Insert into driver_tasks table
        $insertQuery = "INSERT INTO driver_tasks (idnumber, fname, lname, email, phone, address, productname, quantity, dispatch, driver, status, date_allocated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, NOW())";
        $stmtInsert = $conn->prepare($insertQuery);
        if (!$stmtInsert) {
            $_SESSION['error'] = 'Error preparing insert query: ' . $conn->error;
            header('Location: allocate_driver.php');
            exit;
        }

        $stmtInsert->bind_param('ssssssssss', $order['idnumber'], $order['fname'], $order['lname'], $order['email'], $order['phone'], $order['address'], $order['productname'], $order['quantity'], $order['dispatch'], $supervisor);
        if (!$stmtInsert->execute()) {
            $_SESSION['error'] = 'Failed to create Driver task: ' . $stmtInsert->error;
        } else {
            $_SESSION['success'] = 'Driver allocated and task created successfully.';
        }

        // Close insert statement
        $stmtInsert->close();
    } else {
        $_SESSION['error'] = 'Failed to update order driver status.';
    }

    // Close update statement
    $stmtUpdate->close();

    // Close fetch statement
    $stmt->close();

    // Close database connection
    $conn->close();

    // Redirect after processing
    header('Location: allocate_driver.php');
    exit;
} else {
    // Redirect to allocate_driver.php with an error message if not a POST request
    $_SESSION['error'] = 'Invalid request.';
    header('Location: allocate_driver.php');
    exit;
}
?>