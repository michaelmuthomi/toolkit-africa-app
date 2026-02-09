<?php
// Include necessary PHP files
include 'includes/session.php'; // Handles session management
include 'includes/slugify.php'; // Functions for slugifying
include 'includes/header.php'; // HTML header
include 'includes/conn.php'; // Database connection

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cleaner Panel</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Cleaner Panel
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cleaner Panel</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <h3> REQUEST TOOLS AVAILABLE </h3>
            <div class="box">
                <div class="box-body">
                    <?php
                    // Display success or error messages from session
                    if(isset($_SESSION['error'])){
                        echo "
                          <div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-warning'></i> Error!</h4>
                            ".$_SESSION['error']."
                          </div>
                        ";
                        unset($_SESSION['error']);
                    }
                    if(isset($_SESSION['success'])){
                        echo "
                          <div class='alert alert-success alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check'></i> Success!</h4>
                            ".$_SESSION['success']."
                          </div>
                        ";
                        unset($_SESSION['success']);
                    }
                    ?>
                    <div class="box box-success">

                    <!-- tool List -->
                <div class="container-fluid">
                    

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tools List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tool Name</th>
                                                    <th>Description</th>
                                                
                                                    <th>Quantity</th>
                                                    <th>Last Updated</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Fetch tool data
                                                $toolQuery = "SELECT id, tool_name, description, quantity, last_update FROM tools";
                                                $result = $conn->query($toolQuery);

                                                if ($result->num_rows > 0) {
                                                    $counter = 1;
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>
                                                            <td>{$counter}</td>
                                                            <td>{$row['tool_name']}</td>
                                                            <td>{$row['description']}</td>
                                                        
                                                            <td>{$row['quantity']}</td>
                                                            <td>{$row['last_update']}</td>
                                                            
                                                        </tr>";
                                                        $counter++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='8'>No tools found.</td></tr>";
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
            </section>


    <?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->
<?php include 'includes/scripts.php'; ?>
<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#example').DataTable();

});
</script>
</body>
</html>

<?php
$conn->close();
?>
