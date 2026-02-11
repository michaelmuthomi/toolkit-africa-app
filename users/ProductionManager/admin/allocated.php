<?php
include 'includes/session.php'; 
include 'includes/slugify.php';
include 'includes/header.php'; 
include 'includes/conn.php'; 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ct.*, s.fname AS supervisor_fname  
        FROM cleaner_tasks ct
        LEFT JOIN supervisor s ON ct.supervisor = s.idnumber";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error); // Output SQL error if query fails
}

?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h4>Course Manager Panel</h4>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">
            <h4>Booked Courses</h4>
            <?php
            if (isset($_SESSION['error'])) {
                echo "
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-warning'></i> Error!</h4>
                        " . $_SESSION['error'] . "
                    </div>
                ";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo "
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-check'></i> Success!</h4>
                        " . $_SESSION['success'] . "
                    </div>
                ";
                unset($_SESSION['success']);
            }
            ?>
  
  <div class="box box-info">
                        <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Number</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Course</th>
                                <th>Supervisor</th>
                                <th>Cleaner</th>
                                <th>Status</th>
                                <th>Date Allocated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['No'] . "</td>";
                                echo "<td>" . $row['idnumber'] . "</td>";
                                echo "<td>" . $row['fname'] . "</td>";
                                echo "<td>" . $row['lname'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['address'] . "</td>";
                                echo "<td>" . $row['service'] . "</td>";
                                echo "<td>" . $row['supervisor_fname'] . "</td>";
                                echo "<td>" . $row['cleaner'] . "</td>"; // Display cleaner
                                $status = '';
                                switch ($row['status']) {
                                    case 0:
                                        $status = 'Pending';
                                        break;
                                    case 1:
                                        $status = 'Work Started';
                                        break;
                                    case 2:
                                        $status = 'Completed - Waiting for Confirmation from Customer';
                                        break;
                                    case 3:
                                        $status = 'Customer Confirmed, Work Completed';
                                        break;
                                    default:
                                        $status = 'Unknown';
                                        break;
                                }
                                
                                echo "<td>" . $status . "</td>";
                                echo "<td>" . $row['date_allocated'] . "</td>";
                                
                                // Check status to determine if button should be disabled
                                if ($row['status'] == 0 || $row['status'] == 1) {
                                    $disabled = ''; // Button enabled
                                } else {
                                    $disabled = 'disabled'; // Button disabled
                                }
                                
                                // Output the button with conditional disable
                                echo "<td><button class='btn btn-primary btn-xs' data-toggle='modal' data-target='#modal-change-supervisor' data-id='" . $row['No'] . "' $disabled>Change Supervisor</button></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal for changing supervisor -->
    <div class="modal fade" id="modal-change-supervisor">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Change Supervisor</h4>
                </div>
                <div class="modal-body">
                    <form id="form-change-supervisor">
                        <div class="form-group">
                            <label for="select-supervisor">Select New Supervisor:</label>
                            <select class="form-control" id="select-supervisor" name="new_supervisor">
                                <option value="">Select Supervisor</option>
                                <?php
                                // Fetch supervisors from database
                                $sql_supervisors = "SELECT * FROM supervisor";
                                $result_supervisors = $conn->query($sql_supervisors);
                                if ($result_supervisors->num_rows > 0) {
                                    while ($row_supervisor = $result_supervisors->fetch_assoc()) {
                                        echo "<option value='" . $row_supervisor['idnumber'] . "'>" . $row_supervisor['fname'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" id="task_id" name="task_id">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
    $(function () {
        // Initialize DataTables
        $('#example1').DataTable();

        // Handle click on "Change Supervisor" button to fill modal with task ID
        $('#example1').on('click', 'button[data-target="#modal-change-supervisor"]', function () {
            var task_id = $(this).data('id');
            $('#task_id').val(task_id);
        });

        // Handle form submission for changing supervisor
        $('#form-change-supervisor').submit(function (event) {
            event.preventDefault();
            var formData = $(this).serialize();
            
            $.ajax({
                url: 'change_supervisor.php',
                method: 'POST',
                data: formData,
                success: function (response) {
                    console.log(response); // Log response to console
                    location.reload(); // Refresh page after successful change
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText); // Log error message
                    alert('An error occurred while updating supervisor.'); // Alert user about error
                }
            });
        });
    });
</script>
</body>
</html>
