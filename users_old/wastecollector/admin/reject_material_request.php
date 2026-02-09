<?php
include 'includes/session.php';
include 'includes/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['task_id']) && isset($_POST['reason'])) {
        $task_id = $_POST['task_id'];
        $reason = $_POST['reason'];
        
        // Update the task status to rejected (3)
        $stmt = $conn->prepare("UPDATE product_tasks SET status = 3, rejection_reason = ? WHERE idnumber = ?");
        $stmt->bind_param('si', $reason, $task_id);
        
        if ($stmt->execute()) {
            // Get task details for notification
            $stmt = $conn->prepare("SELECT supervisor, title FROM product_tasks WHERE idnumber = ?");
            $stmt->bind_param('i', $task_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $task = $result->fetch_assoc();
            
            // Insert notification for the Production Manager
            if ($task) {
                $stmt = $conn->prepare("INSERT INTO notifications (recipient, sender, message, created_at, is_read) 
                                      VALUES (?, ?, ?, NOW(), 0)");
                $message = "Material request for " . ($task['title'] ?? 'Product') . " has been rejected. Reason: " . $reason;
                $stmt->bind_param('sss', $task['supervisor'], $_SESSION['admin'], $message);
                $stmt->execute();
            }
            
            $_SESSION['success'] = 'Material request rejected successfully.';
        } else {
            $_SESSION['error'] = 'Failed to reject material request: ' . $stmt->error;
        }
        
    } else {
        $_SESSION['error'] = 'Missing task ID or reason.';
    }
} else {
    $_SESSION['error'] = 'Invalid request method.';
}

header('Location: working_materials.php');
exit();
?>