<?php
include 'includes/session.php';
include 'includes/conn.php';

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $unit = $_POST['unit'];
    $stock_quantity = $_POST['stock_quantity'];
    
    // Check if material already exists
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM materials WHERE name = ?");
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if($row['count'] > 0){
        $_SESSION['error'] = 'Material already exists';
    }
    else{
        $stmt = $conn->prepare("INSERT INTO materials (name, category, description, unit, stock_quantity) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssd', $name, $category, $description, $unit, $stock_quantity);
        
        if($stmt->execute()){
            $_SESSION['success'] = 'Material added successfully';
            
            // Log this as a transaction if we have a transaction table
            if ($conn->query("SHOW TABLES LIKE 'material_transactions'")->num_rows > 0) {
                $material_id = $conn->insert_id;
                $stmt = $conn->prepare("INSERT INTO material_transactions (material_id, quantity, transaction_type, performed_by, notes, transaction_date) 
                                      VALUES (?, ?, 'initial', ?, 'Initial inventory', NOW())");
                $stmt->bind_param('ids', $material_id, $stock_quantity, $_SESSION['admin']);
                $stmt->execute();
            }
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