<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM customer WHERE idnumber = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
if ($query->num_rows > 0) {
	$user = $query->fetch_assoc();
} else {
	// Fallback or handle invalid session state if needed
	$user = null;
}
	
?>