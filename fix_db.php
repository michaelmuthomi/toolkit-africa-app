<?php
include 'users/Service-Manager/admin/includes/conn.php';

$sql = "ALTER TABLE supervisor_tasks MODIFY service VARCHAR(255)";
if ($conn->query($sql) === TRUE) {
    echo "Table supervisor_tasks altered successfully.";
} else {
    echo "Error altering table: " . $conn->error;
}

$conn->close();
?>
