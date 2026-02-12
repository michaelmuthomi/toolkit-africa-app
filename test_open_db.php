<?php
$conn = new mysqli('localhost', 'root', '', 'open');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to 'open' database.\n";

$result = $conn->query("SELECT count(*) as count FROM teacher");
if ($result) {
    $row = $result->fetch_assoc();
    echo "Teacher count: " . $row['count'] . "\n";
} else {
    echo "Error querying teacher table: " . $conn->error . "\n";
}

$conn->close();
?>
