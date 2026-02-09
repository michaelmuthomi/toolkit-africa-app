<?php
// Include necessary PHP files
include 'includes/session.php'; // Handles session management
include 'includes/slugify.php'; // Functions for slugifying
include 'includes/header.php'; // HTML header
include 'includes/conn.php'; // Database connection

$query = "SELECT * FROM cleaner_tasks";
$stmt = $conn->prepare($query);
if ($stmt === false) {
    die('MySQL prepare error: ' . htmlspecialchars($conn->error));
}
if (!$stmt->execute()) {
    die('MySQL execute error: ' . htmlspecialchars($stmt->error));
}
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recyclers Panel</title>
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
                recyclers Panel
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Recyclers Panel</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <h3> Recyclers Tasks </h3>
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
                    
                    <div class="box box-info">
                        <div class="box-body table-responsive">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Service</th>
                                <th>Recycler</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($result !== false && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row['No'] . '</td>';
                                echo '<td>' . $row['fname'] . '</td>';
                                echo '<td>' . $row['lname'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['phone'] . '</td>';
                                echo '<td>' . $row['address'] . '</td>';
                                echo '<td>' . $row['service'] . '</td>';
                                echo '<td>' . $row['cleaner'] . '</td>';
                                echo '<td>';
                                switch ($row['status']) {
                                    case 0:
                                        echo 'Pending';
                                        break;
                                    case 1:
                                        echo 'Started work';
                                        break;
                                    case 2:
                                        echo 'Completed work';
                                        break;
                                    default:
                                        echo 'Unknown';
                                }
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="9">No tasks found.</td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

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
