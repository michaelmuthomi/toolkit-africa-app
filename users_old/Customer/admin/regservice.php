

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dance Centre Kenya</title>

    <!-- Bootstrap Core CSS -->
    <link href="includes/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="includes/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="includes/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">


</head>

<body>

    <div id="wrapper">


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header"><a href="manage_timetable.php">Back</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MESSAGE BOX
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="#" method="post">

<?php

				include 'dbconnect.php';
                $trainee_id = $_POST["trainee_id"]; 
                $id = $_POST["id"];     
				$fullname = $_POST["fullname"];
				$phone = $_POST["phone"];
				$email = $_POST["email"];
				$payment_method = $_POST["payment_method"];
				$transactioncode = $_POST["transactioncode"];
                $serviceid = $_POST["serviceid"];
                $servicename = $_POST["servicename"];
                $pricing = $_POST["pricing"];
				//update query
				$qry = "insert into trainee (trainee_id='$trainee_id',id='$id', fullname='$fullname', phone='$phone', email='$email', payment_method='$payment_method', transactioncode='$transactioncode',serviceid='$serviceid',servicename='$servicename',pricing='$pricing')";
				$result = mysqli_query($conn,$qry); //query executes

				if(!$result){
					echo"ERROR". mysqli_error();
				}else {
					echo"TIMTABLE LESSON UPDATE SUCCESSFULLY MADE";
				}


?>

                                  </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="includes/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="includes/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="includes/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

<footer>Dance Centre Kenya</p>
    </footer>
	
	<style>
	footer{
   background-color: #424558;
    bottom: 0;
    left: 0;
    right: 0;
    height: 35px;
    text-align: center;
    color: #CCC;
}

footer p {
    padding: 10.5px;
    margin: 0px;
    line-height: 100%;
}
	</style>

</html>
