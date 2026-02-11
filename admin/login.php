<?php 
 ob_start();
 session_start();
 include('database/connection.php'); 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Toolkit Africa Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body style="background-color:#1E90FF">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-7 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Toolkit Africa Admin!</h1>
                                        <center><img src="img/Logo.jpg" ></center>
                                        <h1 class="h4 text-gray-900 mb-4">Login Panel</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user"
                                                name="username" placeholder="Enter Username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-actions center">
                                         <center><button type="submit" class="btn  btn-large btn-info" title="Log In" name="login" value="Admin Login"> Login</button></center>
                                       </div>
                                        <hr>
                                    </form>
                                    <hr>
                                    <?php
                                        if (isset($_POST['login'])) {
                                            $username = mysqli_real_escape_string($con, $_POST['username']);
                                            $password = mysqli_real_escape_string($con, $_POST['password']);

                                            $password = ($password);
                                            
                                            $query     = mysqli_query($con, "SELECT * FROM admin WHERE  username='$username' and  password='$password'");
                                            $row        = mysqli_fetch_array($query);
                                            $num_row    = mysqli_num_rows($query);
                                            
                                            if ($num_row > 0) {          
                                                $_SESSION['admin_id']=$row['admin_id'];
                                                $_SESSION['admin_logged_in'] = true;
                                                header('location:index.php');
                                            } else {
                                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                                Invalid Username and Password
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                                </div>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
