<?php
	$conn = new mysqli('localhost', 'root', '', 'optimum');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>