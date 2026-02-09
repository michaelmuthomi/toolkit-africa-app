<?php
include 'includes/session.php';
include 'includes/conn.php';

if (!isset($_GET['id']) || !isset($_GET['status'])) {
    $_SESSION['error'] = 'Invalid request';
    header('Location: working_materials.php');
    exit();
}

$work_item_id = $_GET['id'];
$status = $_GET['status'];

// Update work item status
$stmt = $conn->prepare("UPDATE work_items SET status = ? WHERE id = ?");
$stmt->bind_param('ii', $status, $work_item_id);

if ($stmt->execute()) {
    // Check if all work items for the task are completed
    if ($status == 2) {
        // Get the task_id for this work_item
        $stmt = $conn->prepare("SELECT task_id FROM work_items WHERE id = ?");
        $stmt->bind_param('i', $work_item_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $task_id = $row['task_id'];
        
        // Check if all work items for this task are completed
        $stmt = $conn->prepare("SELECT COUNT(*) as total, SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as completed 
                              FROM work_items WHERE task_id = ?");
        $stmt->bind_param('i', $task_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $counts = $result->fetch_assoc();
        
        // If all work items are completed, update the task status
        if ($counts['total'] == $counts['completed']) {
            $stmt = $conn->prepare("UPDATE product_tasks SET status = 1 WHERE id = ?");
            $stmt->bind_param('i', $task_id);
            $stmt->execute();
            $_SESSION['success'] = 'All materials processed. Task marked as in progress.';
        } else {
            $_SESSION['success'] = 'Material status updated successfully.';
        }
    } else {
        $_SESSION['success'] = 'Material status updated successfully.';
    }
} else {
    $_SESSION['error'] = 'Failed to update status: ' . $conn->error;
}

header('Location: working_materials.php');
exit();
?>