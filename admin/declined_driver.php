
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('include2/config.php');
include('dbcon.php');

$msg = '';
$error = '';

if (isset($_POST['submit'])) {
    $idnumber = htmlspecialchars($_POST['idnumber']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $Gender = htmlspecialchars($_POST['Gender']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $dob = htmlspecialchars($_POST['dob']);
    $answer = htmlspecialchars($_POST['answer']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $status = 0;

    if ($dbh) {
        try {
            // Check if idnumber already exists
            $stmt = $dbh->prepare("SELECT COUNT(*) FROM dispatcher WHERE idnumber = :idnumber");
            $stmt->bindParam(':idnumber', $idnumber, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->fetchColumn() > 0) {
                $error = "ID number already exists.";
            } else {
                $sql = "INSERT INTO dispatcher (idnumber, fname, lname, gender, email, password, phone, address, status, created_on, DateofBirth, answer) 
                        VALUES (:idnumber, :firstname, :lastname, :Gender, :email, :password, :phone, :address, :status, now(), :dob, :answer)";
                
                $query = $dbh->prepare($sql);
                $query->bindParam(':idnumber', $idnumber, PDO::PARAM_STR);
                $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
                $query->bindParam(':Gender', $Gender, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':password', $password, PDO::PARAM_STR);
                $query->bindParam(':phone', $phone, PDO::PARAM_STR);
                $query->bindParam(':address', $address, PDO::PARAM_STR);
                $query->bindParam(':status', $status, PDO::PARAM_INT);
                $query->bindParam(':dob', $dob, PDO::PARAM_STR);
                $query->bindParam(':answer', $answer, PDO::PARAM_STR);

                if ($query->execute()) {
                    $msg = "Dispatch Manager Registration Was Successful";
                } else {
                    $error = "Something went wrong. Please try again.";
                }
            }
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    } else {
        $error = "Database connection failed.";
    }
}
?><!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Flip-Edge Entertainment Ltd Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>
        <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column ">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>


                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->
                    <body class="top-navbar-fixed">
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">
                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h3 class="title text-center"><font color="red"><b>Dispatch Manager Account Registration</b></font></h3>
                                </div>
                            </div>
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="DiapatchManager/admin/index.php"><i class="fa fa-home"></i> Back</a></li>
                                        <li class="active"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h4>Fill in the information</h4>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <?php if($msg){ ?>
                                                <div class="alert alert-success left-icon-alert" role="alert">
                                                    <?php echo htmlentities($msg); ?>
                                                </div>
                                            <?php } else if($error){ ?>
                                                <div class="alert alert-danger left-icon-alert" role="alert">
                                                    <strong>Error !!</strong> <?php echo htmlentities($error); ?>
                                                </div>
                                            <?php } ?>
                                            <form class="form-horizontal" method="post">
                                                <div class="form-group">
                                                    <label for="idnumber" class="col-sm-2 control-label">ID Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="idnumber" class="form-control" id="idnumber" minlength="8" maxlength="8" required="required" placeholder="Enter your Id Number eg 12345678" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="firstname" class="col-sm-2 control-label">First Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="firstname" class="form-control" id="firstname" required="required" placeholder="Type Your First Name" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastname" class="col-sm-2 control-label">Last Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="lastname" class="form-control" id="lastname" required="required" placeholder="Type Your Last Name" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" name="dob" class="form-control" id="dob" required="required" max="2009-01-01" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Gender" class="col-sm-2 control-label">Gender</label>
                                                    <div class="col-sm-10">
                                                        <input type="radio" name="Gender" value="Male" required="required">&nbsp;Male &nbsp;
                                                        <input type="radio" name="Gender" value="Female" required="required">&nbsp;Female
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <label for="address" class="form-control-label">Location<span class="text-danger ml-2">*</span></label>
                                                        <?php
                                                        $qry = "SELECT * FROM county";
                                                        $result = $conn->query($qry);
                                                        $num = $result->num_rows;
                                                        if ($num > 0) {
                                                            echo '<select required name="address" onchange="classArmDropdown(this.value)" class="form-control mb-1">';
                                                            echo '<option value="">--Select County--</option>';
                                                            while ($rows = $result->fetch_assoc()) {
                                                                echo '<option value="' . $rows['county_name'] . '">' . $rows['county_name'] . '</option>';
                                                            }
                                                            echo '</select>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" class="form-control" id="email" placeholder="Type Your Email Address" required="required" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone" class="col-sm-2 control-label">Phone Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="tel" name="phone" class="form-control" id="phone" minlength="10" maxlength="10" placeholder="07...." required="required" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <input type="hidden" name="dob" class="form-control" id="date">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="answer" class="col-sm-2 control-label">Security Question</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" value="Enter Your Secret Word" readonly>
                                                        <br>
                                                        <input type="text" name="answer" class="form-control" id="answer" placeholder="Type Your Answer" required="required" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" class="col-sm-2 control-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="password" class="form-control" id="password" minlength="4" placeholder="Enter Your Password" required="required" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" name="submit" class="btn btn-primary">Register</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Flip-Edge Entertainment Ltd <?php echo date('Y'); ?></span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script src="assets/js/jquery-1.10.2.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script src="assets/js/custom.js"></script>

    </body>

    </html>
