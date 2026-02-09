<?php
    include 'database/connection.php';
    include 'includes/conn.php';
    error_reporting(0);


        if (isset($_POST['approveBtn'])) {
            $idnumber = $_POST['identity'];
            if (mysqli_query($con, "update servicemanager set status=1 where idnumber = '$idnumber '")) {
                echo "<script>alert('Approved')</script>";
                echo "<script>location.href='approved_servicemanager.php' </script>";
            } else {
                die("Connection failed: " . $con->connect_error);
            }
        }

        if (isset($_POST['disableBtn'])) {
            $idnumber = $_POST['identity'];

            if (mysqli_query($con, "update servicemanager set status=2 where idnumber = '$idnumber '")) {
                echo "<script>alert('Disabled')</script>";
                echo "<script>location.href='approved_servicemanager.php' </script>";
            } else {
                die("Connection failed: " . $con->connect_error);
            }
        }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Chemolex Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

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
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
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
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                    <img class="img-profile rounded-circle"
                                        src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
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

                    <!-- Begin Page Content -->
<div class="container-fluid">
    <h2>SERVICES</h2>
    <br>
    <h1 class="h3 mb-4 text-gray-800">Services Details</h1>
    <div class="row">
        
                <!-- Print Button -->
                <button id="printTable" class="btn btn-primary mb-3">Print Table</button>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Number</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Service</th>
                                    <th>Supervisor</th>
                                    <th>Status</th>
                                    <th>Date Allocated</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
// Database query
$sql = "SELECT * FROM supervisor_tasks"; // Removed WHERE status = 3
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 1; // For numbering rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$counter}</td>";
        echo "<td>{$row['idnumber']}</td>";
        echo "<td>{$row['fname']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['phone']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td>{$row['service']}</td>";
        echo "<td>{$row['supervisor']}</td>";
        // Status conversion
        switch ($row['status']) {
            case 0:
                $status = 'Pending';
                break;
            case 1:
                $status = 'Work Started';
                break;
            case 2:
                $status = 'Completed - Waiting for Confirmation';
                break;
            case 3:
                $status = 'Customer Confirmed Work Completed';
                break;
            default:
                $status = 'Unknown';
        }
        echo "<td>{$status}</td>";
        echo "<td>{$row['date_allocated']}</td>";
        echo "</tr>"; 
        $counter++; // Increment row counter
    }
} else {
    echo "<tr><td colspan='10'>No tasks found.</td></tr>";
}
?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<script>
    // JavaScript function to print the table
    document.getElementById("printTable").addEventListener("click", function () {
        // Extract the table's content
        var tableContent = document.querySelector("#dataTables-example").outerHTML;
        
        // Create a new window for printing
        var printWindow = window.open("", "_blank");
        printWindow.document.open();
        printWindow.document.write(`
            <html>
            <head>
                <title>Print Table</title>
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
            </head>
            <body>
                <h1>Reports Table</h1>
                ${tableContent}
            </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.print();
    });
</script>


                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Chemolex <?php echo date('Y'); ?></span>
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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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