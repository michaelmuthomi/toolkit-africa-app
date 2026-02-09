<?php
// Database credentials
$dbHost = 'localhost';  
$dbName = 'chemolex_db'; 
$dbUser = 'root';
$dbPass = ''; 

// PDO connection string
$dsn = "mysql:host={$dbHost};dbname={$dbName}";

// PDO options (optional but recommended)
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Enable exceptions for errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // Fetch associative arrays by default
    PDO::ATTR_EMULATE_PREPARES => false,  // Disable prepared statement emulation
];

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $dbUser, $dbPass, $options);
} catch (PDOException $e) {
    // If connection fails, show error message
    die("Connection failed: " . $e->getMessage());
}
?>
