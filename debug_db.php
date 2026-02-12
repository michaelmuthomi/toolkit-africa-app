<?php
include 'users/Service-Manager/admin/includes/conn.php';

$table = 'supervisor_tasks';
$query = "DESCRIBE $table";
$result = $conn->query($query);

if ($result) {
    echo "Table '$table' exists.\nColumns:\n";
    while ($row = $result->fetch_assoc()) {
        echo $row['Field'] . " - " . $row['Type'] . "\n";
    }
} else {
    echo "Error describing table '$table': " . $conn->error . "\n";
}

$conn->close();
?>
