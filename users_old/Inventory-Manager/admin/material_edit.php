<?php
include 'includes/session.php';
include 'includes/conn.php';

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $unit = $_POST['unit'];
    
    // Check if the name already exists for another material
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM materials WHERE name = ? AND id != ?");
    $stmt->bind_param('si', $name, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if($row['count'] > 0){
        $_SESSION['error'] = 'Material name already exists';
    }
    else{
        $stmt = $conn->prepare("UPDATE materials SET name = ?, category = ?, description = ?, unit = ? WHERE id = ?");
        $stmt->bind_param('ssssi', $name, $category, $description, $unit, $id);
        
        if($stmt->execute()){
            $_SESSION['success'] = 'Material updated successfully';
        }
        else{
            $_SESSION['error'] = $stmt->error;
        }
    }
}
else{
    $_SESSION['error'] = 'Fill up edit form first';
}

header('location: materials.php');
?>