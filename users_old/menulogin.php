<?php
session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Toolkit Africa</title>


    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/flexslider.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />

</head>

<body>



    </div>
    </div>
    <div class="home-sec" id="home">

        <div class="">
            <div class="row text-center ">




                <h2>
                    <font color="white">
                        <h3><b>Toolkit Africa</b></h3></a>
                    </font>
                </h2>
                <center><img src="img/logo2.jpg" alt="user" style="width:20%;height:25%;"></center>

                <hr>
                <ul class="dropdown user-dropdown" style="padding-left:2%">



                    <br>
                    <center> <a class="btn btn-lg btn-success  " href="Customer/admin/index.php" data-toggle="modal"
                            data-target=""><b>
                                <font color="white">Customer Login</font>
                            </b></a></center>
                    <br>
                    <center> <a class="btn btn-lg btn-success  " href="" data-toggle="modal" data-target="#lo"><b>
                                <font color="white">Staff Login</font>
                            </b></a></center>

                </ul>


                </br>

                </br>
                <hr>
                <!--  <button class="btn btn-default"><a href="index.php"> <font color="black"><i class="fa fa-arrow-left"></i>&nbsp;Back</font></a></button>-->

            </div>


            <div class="modal fade" id="lo" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
                <div class="modal-dialog modal-sm">
                    <div style="color:white;background-color:light-white" class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h3></h3><b>
                                    <font color="blue">Welcome To Toolkit Africa</font>
                                </b></h3>
                            </center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <center>
                                <h4 class="modal-title" id="myModalLabel"> <b>
                                        <font color="red">Login As</font>
                                    </b></h4>
                            </center>
                        </div>
                        <div class="modal-body">

                            <form role="form" method="post" action="menulogin.php">
                                <fieldset>


                                    <div class="form-group">
                                        <a class="btn btn-default  btn-block"
                                            href="Inventory-Manager/admin/index.php"><b>Inventory Manager</b></a>

                                        </a>
                                    </div>

                                    <div class="form-group">
                                        <a class="btn btn-default  btn-block"
                                            href="Service-Manager/admin/index.php"><b>Service Manager</b></a>
                                        </a>
                                    </div>

                                    <div class="form-group">
                                        <a class="btn btn-default  btn-block"
                                            href="Supplier/admin/index.php"><b>Supplier</b></a>

                                        </a>
                                    </div>

                                    <div class="form-group">
                                        <a class="btn btn-default  btn-block"
                                            href="Supervisor/admin/index.php"><b>Supervisor</b></a>

                                    </div>
                                    <div class="form-group">
                                        <a class="btn btn-default  btn-block"
                                            href="Dispatch-Manager/admin/index.php"><b>Dispatch Manager</b></a>

                                        </a>
                                    </div>

                                    <div class="form-group">

                                        <a class="btn btn-default  btn-block"
                                            href="Finance/admin/index.php"><b>Finance</b></a>

                                        </a>

                                    </div>

                                    <div class="form-group">
                                        <a class="btn btn-default  btn-block"
                                            href="Banknote-Cleaner/admin/index.php"><b>Recycler</b></a>
                                        </a>
                                    </div>

                                    <div class="form-group">
                                        <a class="btn btn-default  btn-block"
                                            href="Driver/admin/index.php"><b>Driver</b></a>
                                        </a>
                                    </div>

                                    <div class="form-group">
                                        <a class="btn btn-default  btn-block"
                                            href="../elearning/faculty/login.php"><b>Trainer</b></a>
                                        </a>
                                    </div>

                                    <div class="form-group">
                                        <a class="btn btn-default  btn-block"
                                            href="../elearning/student/login.php"><b>Trainee</b></a>
                                        </a>
                                    </div>


                                </fieldset>


                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <button class="btn btn-default"><a href="../index.php">Back</a></button>
            </div>



        </div>
        <!-- FOOTER SECTION END-->

        <!--  Jquery Core Script -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!--  Core Bootstrap Script -->
        <script src="assets/js/bootstrap.js"></script>
        <!--  Flexslider Scripts -->
        <script src="assets/js/jquery.flexslider.js"></script>
        <!--  Scrolling Reveal Script -->
        <script src="assets/js/scrollReveal.js"></script>
        <!--  Scroll Scripts -->
        <script src="assets/js/jquery.easing.min.js"></script>
        <!--  Custom Scripts -->
        <script src="assets/js/custom.js"></script>



</body>

</html>