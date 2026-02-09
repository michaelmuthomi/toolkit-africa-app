<?php
include 'includes/session.php';
include 'includes/conn.php';

if(isset($_POST['adjust'])){
    $id = $_POST['id'];
    $action = $_POST['action'];
    $quantity = $_POST['quantity'];
    $reason = $_POST['reason'];
    
    // Get current stock
    $stmt = $conn->prepare("SELECT stock_quantity FROM materials WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows < 1){
        $_SESSION['error'] = 'Material not found';
    }
    else{
        $row = $result->fetch_assoc();
        $current_stock = $row['stock_quantity'];
        $new_stock = 0;
        
        if($action == 'add'){
            $new_stock = $current_stock + $quantity;
        }
        else if($action == 'subtract'){
            if($quantity > $current_stock){
                $_SESSION['error'] = 'Insufficient stock available';
                header('location: materials.php');
                exit();
            }
            $new_stock = $current_stock - $quantity;
        }
        
        $stmt = $conn->prepare("UPDATE materials SET stock_quantity = ? WHERE id = ?");
        $stmt->bind_param('di', $new_stock, $id);
        
        if($stmt->execute()){
            // Log this as a transaction if we have a transaction table
            if ($conn->query("SHOW TABLES LIKE 'material_transactions'")->num_rows > 0) {
                $transaction_type = ($action == 'add') ? 'add' : 'subtract';
                $transaction_quantity = ($action == 'add') ? $quantity : -$quantity;
                
                $stmt = $conn->prepare("INSERT INTO material_transactions (material_id, quantity, transaction_type, performed_by, notes, transaction_date) 
                                      VALUES (?, ?, ?, ?, ?, NOW())");
                $stmt->bind_param('idsss', $id, $transaction_quantity, $transaction_type, $_SESSION['admin'], $reason);
                $stmt->execute();
            }
            
            $_SESSION['success'] = 'Stock adjusted successfully';
        }
        else{
            $_SESSION['error'] = $stmt->error;
        }
    }
}
else{
    $_SESSION['error'] = 'Fill up the form first';
}

header('location: materials.php');
?>