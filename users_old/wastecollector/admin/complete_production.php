<?php
include 'includes/session.php';
include 'includes/conn.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        if (isset($_POST['task_id'])) {
            $task_id = $_POST['task_id'];
            
            // Update the tnotificatiask status to completed (2)
            $stmt = $conn->prepare("UPDATE product_tasks SET status = 2 WHERE idnumber = ?");
            $stmt->bind_param('i', $task_id);
            
            if ($stmt->execute()) {
                $_SESSION['success'] = 'Production marked as complete successfully.';
            } else {
                $_SESSION['error'] = 'Failed to complete production: ' . $stmt->error;
            }
            $stmt->bind_param('i', $task_id);
            
            if ($stmt->execute()) {
                // Get task details for notification
                $stmt = $conn->prepare("SELECT supervisor, quantity FROM product_tasks WHERE idnumber = ?");
                $stmt->bind_param('i', $task_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $task = $result->fetch_assoc();
                
                $_SESSION['success'] = 'Production marked as complete successfully.';
            } else {
                $_SESSION['error'] = 'Failed to complete production: ' . $stmt->error;
            }
        } else {
            $_SESSION['error'] = 'Missing task ID.';
        }
        break;
    default:
        $_SESSION['error'] = 'Invalid request method.';
        break;
}

header('Location: working_materials.php');
exit();
?>