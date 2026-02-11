<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Toolkit Africa</title> 

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Inter', sans-serif;
    }
    .bg-img {
      background: url('imgs/homeimg.jpg') no-repeat center center fixed;
      background-size: cover;
      position: fixed;
      top: 0; left: 0; width: 100vw; height: 100vh;
      z-index: 0;
    }
    .overlay {
      position: fixed;
      top: 0; left: 0; width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.45);
      z-index: 1;
    }
    .main-content {
      position: relative;
      z-index: 2;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: #fff;
      text-align: left;
      padding: 0 2rem;
    }
    .subtitle {
      font-size: 1rem;
      font-weight: 400;
      margin-bottom: 1.2rem;
      opacity: 0.9;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .subtitle i {
      font-size: 1rem;
    }
    .headline {
      font-size: 2rem;
      font-weight: 600;
      margin-bottom: 2.2rem;
      line-height: 1.2;
      max-width: 350px;
    }
    .get-started-btn {
      width: 100%;
      max-width: 350px;
      border-radius: 2rem;
      background: #111;
      color: #fff;
      font-size: 1.1rem;
      font-weight: 600;
      padding: 0.9rem 0;
      border: none;
      margin-bottom: 1.2rem;
      transition: background 0.2s;
    }
    .get-started-btn:hover {
      background: #222;
      color: #fff;
      text-decoration: none;
    }
    .login-link {
      color: #fff;
      opacity: 0.8;
      font-size: 0.98rem;
      text-align: center;
    }
    .login-link a {
      color: #b3e0ff;
      text-decoration: underline;
      margin-left: 0.2rem;
    }
    @media (max-width: 500px) {
      .headline {
        font-size: 1.3rem;
        max-width: 90vw;
      }
      .main-content {
        padding: 0 1rem;
      }
      .get-started-btn {
        max-width: 100vw;
      }
    }
  </style>
</head>

<body>
    <div class="bg-img"></div>
    <div class="overlay"></div>
    <div style="position: relative; z-index: 999;">
      <?php include('main_top.php'); ?>
    </div>
    <div class="main-content">
      <div class="subtitle"><i class="fas fa-star"></i> Skilled - Confident - Productive</div>
      <div class="headline">A leader in powering Africa with skilled, confident, and productive youth.</div>
      <div style="width:100%;display:flex;justify-content:center;">
        <a class="get-started-btn text-center" href="users/login.php">Get Started</a>
      </div>
      <div class="login-link">Already have an account? <a href="users/Customer/admin/index.php">Log In</a></div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Initialize Carousel -->
  <script>
    $(document).ready(function(){
      $('#myCarousel').carousel();
    });
  </script>
  </body>
</html>
