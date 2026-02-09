<?php
include 'includes/session.php'; 
include 'includes/slugify.php';
include 'includes/header.php'; 
include 'includes/conn.php'; 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT st.*, s.fname  
        FROM sks st
        LEFT JOIN supervisor s ON st.supervisor = s.idnumber
        WHERE st.status = 3";

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
           <h4>Service Manager Panel</h4>
            <!--<ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>-->
        </section>

        <section class="content">
            <h4>Completed Tasks</h4>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Service</th>
                                <th>Supervisor</th>
                                <th>Status</th>
                                <th>Date Completed</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['No'] . "</td>";
                                echo "<td>" . $row['idnumber'] . "</td>";
                                echo "<td>" . $row['fname'] ."</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['address'] . "</td>";
                                echo "<td>" . $row['service'] . "</td>";
                                echo "<td>" . $row['supervisor'] . "</td>"; // Display supervisor fname
                                $status = '';
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
                                        break;
                                }
                                
                                echo "<td>" . $status . "</td>";
                                echo "<td>" . $row['date_allocated'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
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
