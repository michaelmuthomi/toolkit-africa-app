<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM servicemanager WHERE email = '$email'and status= 1";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Sorry !! Account Not Approved ';
		}
		else{
			$row = $query->fetch_assoc();
			
			$hashed_password = $row['password'];
			
			if(md5($password) == $hashed_password)
			{
				$_SESSION['admin']=$row['fname'];//save idnumber
				
				header("Location: home.php");
				exit();
					
				
			}
			else{
				$_SESSION['error'] = 'Sorry !! Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input Login Credentials first';
	}
	   header('location: index.php');	//redirect if login fails	
	   exit()
	
?>