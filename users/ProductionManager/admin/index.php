<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	//header('location:home.php');
  	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	
  
  	<div class="login-box-body">
	  <div class="login-logo">
	  <center><b><h3>Production Manager Login</h3></b></center>
  	</div>
	  <center><img src="../../img/logo2.jpg" alt="user" style="width:70%;height:30%;"></center>
    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback"><label>Email</label>
        		<input type="text" class="form-control" name="email" placeholder="Email" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback"><label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4 ">
          			<button type="submit" class="btn btn-success btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>

    	</form>
    	
			  <p><b>Reset Password <a href="forgotpass.php">Here</a> </p>
             </div>
             <div class="col-xs-8 ">

        		</div>
  	</div><br>
	  <button class="btn btn-default"><a href="../../login.php">Back</a></button>
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