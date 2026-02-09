<?php
include 'includes/session.php';
include 'includes/conn.php';

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate task_id and new_supervisor values
    $task_id = $_POST['task_id'];
    $new_supervisor = $_POST['new_supervisor'];
    
    if (empty($task_id) || empty($new_supervisor)) {
        $_SESSION['error'] = "Task ID or New Supervisor is missing.";
        header("Location: manage-booked_services.php");
        exit();
    }
    
    // Sanitize inputs to prevent SQL injection
    $task_id = mysqli_real_escape_string($conn, $task_id);
    $new_supervisor = mysqli_real_escape_string($conn, $new_supervisor);
    
    // Get current supervisor for the task
    $sql_current_supervisor = "SELECT supervisor FROM supervisor_tasks WHERE No = '$task_id'";
    $result_current_supervisor = $conn->query($sql_current_supervisor);
    
    if ($result_current_supervisor->num_rows == 1) {
        $row_current_supervisor = $result_current_supervisor->fetch_assoc();
        $current_supervisor_id = $row_current_supervisor['supervisor'];
        
        // Update supervisor for the task in supervisor_tasks table
        $sql_update = "UPDATE supervisor_tasks SET supervisor = (
            SELECT fname FROM supervisor WHERE fname = '$new_supervisor'
        ) WHERE No = '$task_id'";
        
        if ($conn->query($sql_update) === TRUE) {
            $_SESSION['success'] = "Supervisor updated successfully.";
        } else {
            $_SESSION['error'] = "Error updating supervisor: " . $conn->error;
        }
        
        // Redirect back to the page where the change was initiated
        header("Location: manage-booked_services.php");
        exit();
        
    } else {
        $_SESSION['error'] = "Error: Task not found.";
        header("Location: manage-booked_services.php");
        exit();
    }
    
} else {
    // Redirect if accessed directly without POST data
    header("Location: manage-booked_services.php");
    exit();
}

// Close database connection
$conn->close();
?>
