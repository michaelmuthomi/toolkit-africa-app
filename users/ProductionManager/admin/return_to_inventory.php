<?php
include 'includes/session.php';
include 'includes/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_id = $_POST['task_id'];
    $tender_id = $_POST['tender_id'];
    
    // Start transaction
    $conn->begin_transaction();
    
    try {
        // Get task and tender details
        $stmt = $conn->prepare("SELECT t.title, t.description, pt.quantity 
                                FROM product_tasks pt 
                                JOIN product_tenders t ON pt.idnumber = t.id
                                WHERE pt.idnumber = ?");
        $stmt->bind_param('i', $task_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $task = $result->fetch_assoc();
        
        if (!$task) {
            throw new Exception("Task details not found");
        }
        
        // Update product_tenders table to mark as processed (supplier_status = 2)
        $stmt = $conn->prepare("UPDATE product_tenders SET supplier_status = 2 WHERE id = ?");
        $stmt->bind_param('i', $tender_id);
        $stmt->execute();
        
        // // Update the product quantity in the inventory
        // $stmt = $conn->prepare("UPDATE products SET stock = stock + ? WHERE product_name = ?");
        // $stmt->bind_param('ds', $task['quantity'], $task['title']);
        // $result = $stmt->execute();
        
        // if ($stmt->affected_rows == 0) {
        //     // Product doesn't exist, create it
        //     $stmt = $conn->prepare("INSERT INTO products (product_name, description, stock) VALUES (?, ?, ?)");
        //     $stmt->bind_param('ssd', $task['title'], $task['description'], $task['quantity']);
        //     $stmt->execute();
        // }
        
        // Update the product_tasks table to mark as fully processed (status = 3)
        $stmt = $conn->prepare("UPDATE product_tasks SET status = 3 WHERE idnumber = ?");
        $stmt->bind_param('i', $task_id);
        $stmt->execute();
        
        
        // Log the inventory update in a transaction history table (if exists)
        if ($conn->query("SHOW TABLES LIKE 'inventory_transactions'")->num_rows > 0) {
            $stmt = $conn->prepare("INSERT INTO inventory_transactions 
                                  (product_name, quantity, transaction_type, performed_by, reference_id, notes, transaction_date) 
                                  VALUES (?, ?, 'production', ?, ?, 'Production completion', NOW())");
            $notes = "Task ID: " . $task_id . ", Tender ID: " . $tender_id;
            $stmt->bind_param('sdss', $task['title'], $task['quantity'], $_SESSION['admin'], $notes);
            $stmt->execute();
        }
        
        $conn->commit();
        $_SESSION['success'] = 'Product has been processed and inventory has been updated. ' . 
                              $task['quantity'] . ' units of ' . $task['title'] . ' added to inventory.';
    } catch (Exception $e) {
        $conn->rollback();
        $_SESSION['error'] = 'Error: ' . $e->getMessage();
    }
    
    header('Location: completed_tasks.php');
    exit();
} else {
    $_SESSION['error'] = 'Invalid request method.';
    header('Location: completed_tasks.php');
    exit();
}
?>