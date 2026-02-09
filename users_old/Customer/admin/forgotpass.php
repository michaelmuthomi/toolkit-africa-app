<?php
include 'includes/config.php';
include 'includes/header.php';
if (isset($_POST['login'])) {
$email = $_POST['email'];
$password = md5($_POST['password']);
$cadm_password = md5($_POST['conpassword']);
$year = date("Y");
if ($cadm_password!= $password) {
    echo "<script>alert('Passwords not Matching')</script>";
} else {
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * from customer where email='$email'"))>0){
        if(mysqli_query($conn,"UPDATE customer set password='$password' where email='$email'")){
            echo "<script>alert('Pasword Reset successfully')</script>";
            echo "<script>location.href='index.php'</script>";
        }else{
            echo "<script>alert('failed to reset password')</script>";
        }
    }else{
        echo "<script>alert('Your account was not found')</script>";
    }
}
}
?>
<body class="hold-transition login-page">
<div class="login-box">
  	
  
  	<div class="login-box-body">
	  <div class="login-logo">
	  <center><b><h3>Reset Password</h3></b></center>
  	</div>
	  <center><img src="../../img/logo2.jpg" alt="user" style="width:70%;height:30%;"></center>
    	<form  method="POST">
      		<div class="form-group has-feedback"><label>Email</label>
        		<input type="text" class="form-control" name="email" placeholder="Email" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback"><label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback"><label>Password</label>
            <input type="password" class="form-control" name="conpassword" placeholder="confirm Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4 ">
          		<button type="submit" class="btn btn-success btn-block btn-flat" name="login"></i>Reset</button>
        		</div>
      		</div>
    	</form>
  	</div><br>
	  <button class="btn btn-default"><a href="index.php">Back</a></button>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>

</html>