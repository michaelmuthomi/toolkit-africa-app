<?php
error_reporting(0);
include('include2/config.php');
include('includes/config1.php');
include('dbcon.php');
if(isset($_POST['submit'])) {
    $idnumber = $_POST['idnumber'];    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $Gender = $_POST['Gender']; 
    $email = $_POST['email'];
    $phone = $_POST["phone"]; 
    $address = $_POST['address']; 
    $dob = $_POST['dob']; 
    $answer = $_POST['answer']; 
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $status = 0;

    if ($dbh) {
        $sql = "INSERT INTO servicemanager (idnumber, fname, lname, gender, email, password, phone, address, status, created_on, DateofBirth, Answer) VALUES (:idnumber, :firstname, :lastname, :Gender, :email, :password, :phone, :address, :status, now(), :dob, :answer)";
        
        $query = $dbh->prepare($sql);
        $query->bindParam(':idnumber', $idnumber, PDO::PARAM_STR);
        $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindParam(':Gender', $Gender, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':dob', $dob, PDO::PARAM_STR);
        $query->bindParam(':answer', $answer, PDO::PARAM_STR);
        
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        
        if($lastInsertId) {
            $error = "Something went wrong. Please try again";
        } else {
            $msg = "Service Manager Registration Was Successfully";
        }
    } else {
        $error = "Database connection failed"; 
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Service Manager Registration </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->

            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h3 class="title text-center"><font color="maroon"><b>Service Manager Account Registration</b></font></h3>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="Service-Manager/admin/index.php"><i class="fa fa-home"></i> Back</a></li>
                                
                                        <li class="active"></li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
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
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Error !!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">


        <div class="form-group">
        <label for="default" class="col-sm-2 control-label">ID Number</label>
        <div class="col-sm-10">
        <input type="text" name="idnumber" class="form-control" id="idnumber" minlength="8" maxlength="8" required="required" placeholder="Enter your Id Number eg 12345678" autocomplete="off">
        </div>
        </div>
        <div class="form-group">
        <label for="default" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
        <input type="text" name="firstname" class="form-control" id="firstname" required="required" placeholder="Type Your First Name" autocomplete="off">
        </div>
        </div>

        <div class="form-group">
        <label for="default" class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-10">
        <input type="text" name="lastname" class="form-control" id="lastname" required="required" placeholder="Type Your Last Name" autocomplete="off">
        </div>
        </div>

        <div class="form-group">
        <label for="default" class="col-sm-2 control-label" for="dob">Date of Birth</label>
        <div class="col-sm-10">
        <input type="date" name="dob" class="form-control" id="dob" required="required" max="2009-01-01" autocomplete="off">
        </div>
        </div>


        <div class="form-group">
        <label for="default" class="col-sm-2 control-label">Gender</label>
        <div class="col-sm-10">
        <input type="radio" name="Gender" value="Male" required="required" >&nbsp;Male &nbsp;
        <input type="radio" name="Gender" value="Female" placeholder="Select Your Gender" required="required">&nbsp;Female 
        </div>
        </div>

<div class="form-group ">
<div class="col-sm-10">
                        <label class="form-control-label" class="col-sm-2 control-label">Location<span class="text-danger ml-2">*</span></label>
                      
                         <?php
                        $qry= "SELECT * FROM county";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="address" onchange="classArmDropdown(this.value)" class="form-control mb-1">';
                          echo'<option value="">--Select County--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['county_name'].'" >'.$rows['county_name'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  </div>
                        </div>


        <div class="form-group">
        <label for="default" class="col-sm-2 control-label">Email </label>
        <div class="col-sm-10">
        <input type="email" name="email" class="form-control" id="email" placeholder="Type Your Email Address" required="required" autocomplete="off">
        </div>
        </div>

        <div class="form-group">
        <label for="default" class="col-sm-2 control-label">Phone Number </label>
        <div class="col-sm-10">
        <input type="tel" name="phone" class="form-control" id="phone" minlength="10" maxlength="10" placeholder="07...." required="required" autocomplete="off">
        </div>
        </div>


                                                                                                                    
        <div class="form-group">
        <label for="default" class="col-sm-2 control-label">Security Question</label>
        <div class="col-sm-10">
        <input class="form-control"  value="Enter Your Secret Phrase "  readonly>
        <br>
        <input type="text" name="answer" class="form-control" id="answer" placeholder="Type Your Answer"  required="required" autocomplete="off">
        </div>
        </div>
                                                            
        <div class="form-group">
        <label for="default" class="col-sm-2 control-label">Password</label>
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
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js2/jquery/jquery-2.2.4.min.js"></script>
        <script src="js2/bootstrap/bootstrap.min.js"></script>
        <script src="js2/pace/pace.min.js"></script>
        <script src="js2/lobipanel/lobipanel.min.js"></script>
        <script src="js2/iscroll/iscroll.js"></script>
        <script src="js2/prism/prism.js"></script>
        <script src="js2/select2/select2.min.js"></script>
        <script src="js2/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?PHP  ?>
