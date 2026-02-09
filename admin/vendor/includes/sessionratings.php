<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['admin'])){
		$sql = "SELECT * FROM tbstudent WHERE id = '".$_SESSION['admin']."'";
		$query = $conn->query($sql);
		$voter = $query->fetch_assoc();
	}
	else{
		header('location: index.php');
		exit();
	}

?>