<?php
include 'includes/session.php';
include 'includes/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['task_id'])) {
        $task_id = $_POST['task_id'];
        
        // Update the task status to in-progress (1)
        $stmt = $conn->prepare("UPDATE product_tasks SET status = 1 WHERE idnumber = ?");
        $stmt->bind_param('i', $task_id);
        
        if ($stmt->execute()) {
            // Get task details for notification
            $stmt = $conn->prepare("SELECT supervisor FROM product_tasks WHERE idnumber = ?");
            $stmt->bind_param('i', $task_id);
            $stmt->execute();
            
            $_SESSION['success'] = 'Material request approved successfully.';
        } else {
            $_SESSION['error'] = 'Failed to approve material request: ' . $stmt->error;
        }
        
    } else {
        $_SESSION['error'] = 'Missing task ID.';
    }
} else {
    $_SESSION['error'] = 'Invalid request method.';
}

header('Location: working_materials.php');
exit();
?>
            $result = $stmt->get_result();
            $task = $result->fetch_assoc();
            
            // Insert notification for the Production Manager
            if ($task) {
                $stmt = $conn->prepare("INSERT INTO notifications (recipient, sender, message, created_at, is_read) 
                                      VALUES (?, ?, ?, NOW(), 0)");
                $message = "Material request for task ID " . $task_id . " has been approved and production has started.";
                $stmt->bind_param('sss', $task['supervisor'], $_SESSION['admin'], $message);
                $stmt->execute();
            }
            
            $_SESSION['success'] = 'Material request approved successfully.';
        } else {
            $_SESSION['error'] = 'Failed to approve material request: ' . $stmt->error;
        }
        
    } else {
        $_SESSION['error'] = 'Missing task ID.';
    }
} else {
    $_SESSION['error'] = 'Invalid request method.';
}

header('Location: working_materials.php');
exit();
?>