<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','chemolex_db');
// Establish database connection.
try
{
$conn=new mysqli("localhost","root","","chemolex_db");
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>