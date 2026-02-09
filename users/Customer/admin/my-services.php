<?php
// Start session and include necessary files
include 'includes/session.php';
include 'includes/slugify.php';
include 'includes/header.php';
include 'includes/conn.php'; // Assuming this includes your database connection

// Process update if 'id' parameter is set in URL (from update_status.php)
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $task_id = $_GET['id'];

    // Update task status to 2 (Work Completed. Waiting for Customer Approval)
    $query = "UPDATE supervisor_tasks SET status = 3 WHERE No = $task_id";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Task status updated successfully.";
    } else {
        $_SESSION['error'] = "Error updating task status: " . mysqli_error($conn);
    }

    // Redirect to prevent form resubmission on refresh
    header("Location: my-services.php");
    exit();
}

// Fetch tasks for the current supervisor (assuming $_SESSION['admin'] is the supervisor's fname)
$supervisor = $_SESSION['admin'];
$query = "SELECT * FROM supervisor_tasks WHERE fname = '$supervisor'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <ol class="breadcrumb">
                    <!--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>-->
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <h2>My Services</h2>

                        <?php
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
                                <table id="tasksTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>idnumber</th>
                                            <th>fname</th>
                                            <th>lname</th>
                                            <th>email</th>
                                            <th>phone</th>
                                            <th>address</th>
                                            <th>service</th>
                                            <th>supervisor</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Determine task status
                                            switch ($row['status']) {
                                                case 0:
                                                    $status = 'Pending';
                                                    $buttonDisabled = ''; // Button is active
                                                    break;
                                                case 1:
                                                    $status = 'Work Started';
                                                    $buttonDisabled = ''; // Button is disabled
                                                    break;
                                                case 2:
                                                    $status = 'Work Completed. Waiting for Customer Approval';
                                                    $buttonDisabled = ''; // Button is disabled
                                                    break;
                                                case 3:
                                                    $status = 'Customer Confirmed. Work Completed';
                                                    $buttonDisabled = 'disabled'; // Button is disabled
                                                    break;
                                                default:
                                                    $status = 'Unknown';
                                                    $buttonDisabled = 'disabled'; // Button is disabled
                                                    break;
                                            }

                                            echo "<tr>";
                                            echo "<td>{$row['No']}</td>";
                                            echo "<td>{$row['idnumber']}</td>";
                                            echo "<td>{$row['fname']}</td>";
                                            echo "<td>{$row['lname']}</td>";
                                            echo "<td>{$row['email']}</td>";
                                            echo "<td>{$row['phone']}</td>";
                                            echo "<td>{$row['address']}</td>";
                                            echo "<td>{$row['service']}</td>";
                                            echo "<td>{$row['supervisor']}</td>";
                                            echo "<td>{$status}</td>";
                                            echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#confirmModal{$row['No']}' {$buttonDisabled}>Mark Completed</button></td>";
                                            echo "</tr>";

                                            // Modal for each task
                                            echo "<div class='modal fade' id='confirmModal{$row['No']}' tabindex='-1' role='dialog' aria-labelledby='confirmModalLabel{$row['No']}'>";
                                            echo "<div class='modal-dialog' role='document'>";
                                            echo "<div class='modal-content'>";
                                            echo "<div class='modal-header'>";
                                            echo "<h4 class='modal-title' id='confirmModalLabel{$row['No']}'>Confirm Mark Completed</h4>";
                                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                            echo "<span aria-hidden='true'>&times;</span>";
                                            echo "</button>";
                                            echo "</div>";
                                            echo "<div class='modal-body'>";
                                            echo "Are you sure you want to mark this task as completed?";
                                            echo "</div>";
                                            echo "<div class='modal-footer'>";
                                            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                            echo "<a href='my-services.php?id={$row['No']}' class='btn btn-primary'>Confirm</a>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include 'includes/footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <?php include 'includes/scripts.php'; ?>
    <script>
        $(function () {
            // Initialize DataTables
            $('#tasksTable').DataTable();
        });
    </script>
</body>
</html>
