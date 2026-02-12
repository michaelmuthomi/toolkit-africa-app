<?php
include 'includes/session.php';
include 'includes/slugify.php';
include 'includes/header.php';
include 'includes/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the completed services with supervisor names
$sql = "SELECT st.*, s.fname AS supervisor_name
        FROM supervisor_tasks st
        LEFT JOIN supervisor s ON st.supervisor = s.idnumber
        WHERE st.status = 3";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
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
            <h4>Completed Booked Services</h4>
            <?php
            if (isset($_SESSION['error'])) {
                echo "
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-warning'></i> Error!</h4>
                        {$_SESSION['error']}
                    </div>
                ";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo "
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-check'></i> Success!</h4>
                        {$_SESSION['success']}
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Course</th>
                                <th>Supervisor</th>
                                <th>Status</th>
                                <th>Date Allocated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                $counter = 1; // For numbering rows
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>{$counter}</td>";
                                    echo "<td>{$row['service']}</td>"; // Service name
                                    echo "<td>N/A</td>"; // Description placeholder
                                    echo "<td>N/A</td>"; // Price placeholder
                                    echo "<td>{$row['supervisor_name']}</td>"; // Trainer name (using alias from query)
                                    echo "<td>{$row['date_allocated']}</td>"; // Date completed
                                    echo "<td>{$row['cleaner_status']}</td>"; // Comments placeholder (assuming cleaner_status is used for comments)
                                    echo "<td>N/A</td>"; // Rating placeholder
                                    echo "<td>
                                            <button class='btn btn-warning btn-sm' data-toggle='modal' data-target='#modal-change-trainer' data-id='{$row['id']}'>Change Trainer</button>
                                          </td>";
                                    echo "</tr>";
                                    $counter++;
                                }
                            } else {
                                echo "<tr><td colspan='9'>No completed services found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
</body>


    <!-- Modal for changing trainer -->
    <div class="modal fade" id="modal-change-trainer">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Change Trainer</h4>
                </div>
                <div class="modal-body">
                    <form id="form-change-trainer">
                        <input type="hidden" name="task_id" id="task-id">
                        <div class="form-group">
                            <label for="select-trainer">Select New Trainer:</label>
                            <select class="form-control" id="select-trainer" name="new_trainer">
                                <option value="">Select Trainer</option>
                                <?php
                                // Fetch supervisors from database
                                $sql_supervisors = "SELECT * FROM supervisor";
                                $result_supervisors = $conn->query($sql_supervisors);
                                if ($result_supervisors->num_rows > 0) {
                                    while ($row_supervisor = $result_supervisors->fetch_assoc()) {
                                        echo "<option value='" . $row_supervisor['fname'] . "'>" . $row_supervisor['fname'] . "</option>";
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
