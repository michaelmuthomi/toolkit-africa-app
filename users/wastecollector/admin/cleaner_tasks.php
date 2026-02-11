<?php
// Include necessary PHP files
include 'includes/session.php'; // Handles session management
include 'includes/slugify.php'; // Functions for slugifying
include 'includes/header.php'; // HTML header
include 'includes/conn.php'; // Database connection

function updateStatus($id, $newStatus, $conn)
{
    if ($newStatus !== null) {
        $query = "UPDATE cleaner_tasks SET status = ? WHERE No = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $newStatus, $id);
    }

    if ($stmt->execute()) {
        return true;
    } else {
        error_log("Error updating status: " . $stmt->error);
        return false;
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $taskId = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $taskSTATUS = filter_input(INPUT_POST, 'tool_status', FILTER_VALIDATE_INT);
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

    if (!$taskId || !$action) {
        $_SESSION['error'] = "Invalid input.";
        header("Location: cleaner_tasks.php");
        exit();
    }

    if ($action === 'start') {
        if (updateStatus($taskId, 1, $conn)) {
            $_SESSION['success'] = "Started work successfully!";
        } else {
            $_SESSION['error'] = "Error starting work.";
        }
        header("Location: cleaner_tasks.php");
        exit();
    } elseif ($action === 'collect_material') {
        // Insert into materials_collected
        $material_id = filter_input(INPUT_POST, 'material_id', FILTER_VALIDATE_INT);
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
        if (!$material_id || !$quantity) {
            $_SESSION['error'] = "Please select a material and enter quantity.";
            header("Location: cleaner_tasks.php");
            exit();
        }
        $stmt = $conn->prepare("INSERT INTO materials_collected (task_id, material_id, quantity, collected_at, approved) VALUES (?, ?, ?, NOW(), 0)");
        $stmt->bind_param("iii", $taskId, $material_id, $quantity);
        if ($stmt->execute()) {
            // Now end work
            if (updateStatus($taskId, 2, $conn)) {
                $_SESSION['success'] = "Material collected and work completed successfully!";
                header("Location: completed-tasks.php");
                exit();
            } else {
                $_SESSION['error'] = "Material collected, but error completing work.";
            }
        } else {
            $_SESSION['error'] = "Error collecting material.";
        }
        header("Location: cleaner_tasks.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid action.";
        header("Location: cleaner_tasks.php");
        exit();
    }
}


// Get the logged-in user from session
$loggedInUser = $_SESSION['admin'];

// Fetch data from dutiestable table for the logged-in user
$query = "
    SELECT cleaner_tasks.*, requests.status AS request_status
    FROM cleaner_tasks
    LEFT JOIN requests ON cleaner_tasks.No = requests.id
    WHERE cleaner = ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $loggedInUser);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Work To Be Done Panel</title>
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
                <h1>Work To Be Done Panel</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Work To Be Done Panel</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <h3> Work To Be Done </h3>
                <div class="box">
                    <div class="box-body">
                        <?php
                        // Display success or error messages from session
                        if (isset($_SESSION['error'])) {
                            echo "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-warning'></i> Error!</h4>" . $_SESSION['error'] . "</div>";
                            unset($_SESSION['error']);
                        }
                        if (isset($_SESSION['success'])) {
                            echo "<div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-check'></i> Success!</h4>" . $_SESSION['success'] . "</div>";
                            unset($_SESSION['success']);
                        }
                        ?>

                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Allocation Date</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Course</th>
                                        <th>Supervisor</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo "<td>" . date('D jS Y : H:i', strtotime($row['date_allocated'])) . "</td>";
                                            echo "<td>{$row['fname']} {$row['lname']}</td>";
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>' . $row['phone'] . '</td>';
                                            echo '<td>' . $row['address'] . '</td>';
                                            echo '<td>' . $row['service'] . '</td>';
                                            echo '<td>' . $row['supervisor'] . '</td>';
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
                                            echo '<td>';
                                            if ($row['status'] == 0) {
                                                // Assuming $row['No'] is the task ID
                                                if ($row['tool_status'] == 0) {
                                                    $No = $row['No'];
                                                    echo '<form method="POST" action="work.php?No=' . $No . '" style="margin-top: 10px;">';
                                                    echo '<input type="hidden" name="id" value="' . $row['No'] . '" readonly>';  // Task ID
                                                    echo '<input type="hidden" name="action" value="tool_status">';       // Action type
                                                    echo '<input type="hidden" name="tool_status" value="1">';            // Tool status to be updated
                                                    echo '<button type="submit" class="btn btn-warning">Request Tool</button>';
                                                    echo '</form>';
                                                }
                                                if ($row['status'] == 0 && $row['tool_status'] == 1 && $row['status'] == 0) {
                                                    echo '<button type="submit" class="btn btn-success" disabled>Tool Requested</button>';
                                                }
                                                // Request Tool button (redirects to work.php)
                                                if ($row['tool_status'] == 2) {
                                                    // Start Work button
                                                    echo '<form method="post">';
                                                    echo '<input type="hidden" name="id" value="' . $row['No'] . '">';
                                                    echo '<input type="hidden" name="action" value="start">';
                                                    echo '<button type="submit" class="btn btn-primary">Start Work</button>';
                                                    echo '</form>';
                                                }

                                            } elseif ($row['status'] == 1 && $row['tool_status'] == 2) {
                                                // End Work button triggers modal
                                                echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#collectMaterialModal" data-taskid="' . $row['No'] . '">End Work</button>';

                                            }elseif ($row['status'] == 2) {
                                                // Work Completed - Disable the button
                                                echo '<button type="button" class="btn btn-success" disabled>Work Completed</button>';
                                            } else {
                                                // Handle any other status if necessary
                                                echo '-';
                                            }
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="11">No tasks found.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include 'includes/footer.php'; ?>
    </div>
    <!-- ./wrapper -->

    <?php include 'includes/scripts.php'; ?>
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#example').DataTable();

            // Pass task id to modal
            $('#collectMaterialModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var taskId = button.data('taskid');
                $('#modal_task_id').val(taskId);
            });
        });
    </script>
</body>


<!-- Material Collection Modal -->
<div class="modal fade" id="collectMaterialModal" tabindex="-1" role="dialog" aria-labelledby="collectMaterialModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" id="collectMaterialForm">
        <div class="modal-header">
          <h5 class="modal-title" id="collectMaterialModalLabel">Collect Material</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="modal_task_id">
          <input type="hidden" name="action" value="collect_material">
          <div class="form-group">
            <label for="material_id">Material</label>
            <select class="form-control" name="material_id" id="material_id" required>
              <option value="">Select Material</option>
              <?php
                            $mquery = $conn->query("SELECT id, name FROM materials ORDER BY name");
                            while ($mat = $mquery->fetch_assoc()) {
                                echo '<option value="' . $mat['id'] . '">' . htmlspecialchars($mat['name']) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" min="1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit & End Work</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>

<?php
$conn->close();
?>