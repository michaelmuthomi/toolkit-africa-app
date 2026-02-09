<?php
session_start();
require 'includes/conn.php'; // Adjust this to your database connection file

// Enable exception mode for mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $requestId = filter_input(INPUT_POST, 'request_id', FILTER_VALIDATE_INT);
    $toolName = filter_input(INPUT_POST, 'tool_name', FILTER_SANITIZE_STRING);
    $quantityRequested = (int) $_POST['quantity'];
    $No = filter_input(INPUT_POST, 'No', FILTER_VALIDATE_INT);

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Update the request status
        $updateRequestQuery = "UPDATE requests SET status = 1 WHERE id = ?";
        $stmtRequest = $conn->prepare($updateRequestQuery);
        $stmtRequest->bind_param("i", $requestId);
        $stmtRequest->execute();

        // Deduct the quantity from the tools table
        $updateToolQuery = "UPDATE tools SET quantity = quantity - ? WHERE tool_name = ?";
        $stmtTool = $conn->prepare($updateToolQuery);
        $stmtTool->bind_param("is", $quantityRequested, $toolName);
        $stmtTool->execute();

        // Update tool_status in the cleaner_tasks table
        if ($No) {
            $updateDutyStatusQuery = "UPDATE cleaner_tasks SET tool_status = 2 WHERE No = ?";
            $stmtDuty = $conn->prepare($updateDutyStatusQuery);
            $stmtDuty->bind_param("i", $No);
            $stmtDuty->execute();
            if ($stmtDuty->affected_rows === 0) {
                throw new Exception("Failed to update tool_status for task No: $No");
            }
        } else {
            throw new Exception("Task No is missing or invalid.");
        }

        // Commit the transaction
        $conn->commit();
        $_SESSION['success'] = "Request approved successfully!";
    } catch (Exception $e) {
        // Rollback transaction if something goes wrong
        $conn->rollback();
        $_SESSION['error'] = "Failed to approve request: " . $e->getMessage();
    }

    // Redirect back to the tools list page
    header("Location: work.php");
    exit();
}
?>