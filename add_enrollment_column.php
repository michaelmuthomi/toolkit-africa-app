<?php
$conn = new mysqli('localhost', 'root', '', 'chemolex_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if column exists
$check = $conn->query("SHOW COLUMNS FROM booking LIKE 'enrollment_status'");
if ($check->num_rows == 0) {
    $sql = "ALTER TABLE booking ADD COLUMN enrollment_status INT(11) DEFAULT 0";
    if ($conn->query($sql) === TRUE) {
        echo "Column 'enrollment_status' added successfully.";
    } else {
        echo "Error adding column: " . $conn->error;
    }
} else {
    echo "Column 'enrollment_status' already exists.";
}

$conn->close();
?>
