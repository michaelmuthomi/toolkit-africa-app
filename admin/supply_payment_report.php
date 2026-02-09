<?php
include 'database/connection.php';
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

    <title>East Africa Data Handlers Dashboard</title>

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
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
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


                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Supply Payment Reports</h1>
                <!-- Search Filter -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" id="supplyPaymentSearch" class="form-control"
                            placeholder="Type to search supply payments...">
                    </div>
                </div>
                <div class="row">
                    <!-- Print Button -->
                    <button id="printTable" class="btn btn-primary mb-3">Print Table</button>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                        id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Amount</th>
                                                <th>Posted At</th>
                                                <th>Deadline</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM tenders ORDER BY deadline DESC";
                                            $result = mysqli_query($con, $sql);
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $supplyStatus = $row['supplier_status'];
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['unit_price']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['Amount']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['posted_at']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['deadline']) . "</td>";
                                                    echo "<td>";
                                                    switch ($supplyStatus) {
                                                        case 0:
                                                            echo "Unallocated";
                                                            break;
                                                        case 1:
                                                            echo "Pending Supply";
                                                            break;
                                                        case 2:
                                                            echo "Supplied";
                                                            break;
                                                        case 3:
                                                            echo "Confirmed Supplied";
                                                            break;
                                                        default:
                                                            echo "Unknown";
                                                    }
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='8' class='text-center'>No supply records found.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

                    // Simple client-side table filter
                    document.addEventListener('DOMContentLoaded', function () {
                        const searchInput = document.getElementById('supplyPaymentSearch');
                        if (searchInput) {
                            searchInput.addEventListener('keyup', function () {
                                const filter = searchInput.value.toLowerCase();
                                const table = document.getElementById('dataTables-example');
                                const trs = table.getElementsByTagName('tr');
                                for (let i = 1; i < trs.length; i++) { // skip header row
                                    let rowText = trs[i].textContent.toLowerCase();
                                    trs[i].style.display = rowText.indexOf(filter) > -1 ? '' : 'none';
                                }
                            });
                        }
                    });
                </script>
                <!-- End of Main Content -->

                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; East Africa Data Handlers <?php echo date('Y'); ?></span>
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