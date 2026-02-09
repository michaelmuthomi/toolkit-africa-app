<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
		
    	
  	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page"  >
<div class="login-box" >
  	<div class="login-box-body" >
	  <div class="">
  		<center><b><h3 class="text-8xl text-white tracking-tighter text-balance">Customer Login</h3></b></center>
  	</div>
	  <center><img src="../../img/logo2.jpg" alt="user" style="width:70%;height:30%;"></center>
	   	    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback"><label>Email</label>
        		<input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback"><label>Password</label>
            <input type="password" class="form-control" name="password" placeholder=" Enter Your Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div >
          		<button type="submit" class="bg-green-600 py-6 w-full rounded-full" name="login">Sign In</button>
      		</div>
			  
    	</form>
		<div ><br><button class="bg-blue-600 py-6 w-full rounded-full"><a href="../../add-customer.php" ><font color="white"><i class="fa fa-user"></i> Sign Up</font></a></button>
			  <p><b>Forgot Your Password ??<a href="forgotpass.php"> Reset Here</a> </b></p>

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