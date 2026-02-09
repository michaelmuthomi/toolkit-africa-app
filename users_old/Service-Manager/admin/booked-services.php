<?php
  // Include necessary files
  include 'includes/session.php';
  include 'includes/slugify.php';
  include 'includes/header.php';

  // Include database connection
  include 'includes/conn.php';
  $total_services = 0;
  $result = false;

  // Fetch data from booking table
  $query = "SELECT booking_id, idnumber, fname, lname, email, phone, address, service, supervisor_status FROM booking WHERE payment_status=1 AND supervisor_status=0";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // Fetch total count of booked services
    $total_services = mysqli_num_rows($result);
  } else {
    // Query execution failed, handle the error
    echo "Error: " . mysqli_error($conn);
  }
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php 
      // Include navigation components
      include 'includes/navbar.php'; 
      include 'includes/menubar.php'; 
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
        <h4>
          Service Manager Panel
        </h4>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <h4>Booked Services</h4>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <form action="" method="GET" class="form-inline"></form>
          </div>
          <div class="col-md-6">
            <p>Total Pending Booked Services: <?php echo $total_services; ?></p>
          </div>
        </div>
        <!-- /. Search Bar -->

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

          if(mysqli_num_rows($result) > 0) {

    echo '<div class="table-responsive">';
            echo "<table id='bookingTable' class='table table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID Number</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Email</th>";
            echo "<th>Phone</th>";
            echo "<th>Address</th>";
            echo "<th>Services</th>";
            echo "<th>Supervisor</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>{$row['idnumber']}</td>";
              echo "<td>{$row['fname']}</td>";
              echo "<td>{$row['lname']}</td>";
              echo "<td>{$row['email']}</td>";
              echo "<td>{$row['phone']}</td>";
              echo "<td>{$row['address']}</td>";
              echo "<td>{$row['service']}</td>";
              echo '<td>';
                    if($row['supervisor_status'] == 0){
                    echo 'Unallocated';
                    } elseif($row['supervisor_status'] == 1){
                      echo 'Allocated';
                    }
              echo '</td>';
              echo "<td>
                      <form action='' method='post' style='display:inline;'>
                        <input type='hidden' name='booking_id' value='{$row['booking_id']}'>
                        <button type='button' class='btn btn-primary allocate-btn' data-toggle='modal' data-target='#allocateModal'>Allocate Supervisor</button>
                      </form>
                    </td>";
              echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
          } else {
            echo "<p>No services found.</p>";
          }
          
          // Close database connection
          mysqli_close($conn);
        ?>
        
        <!-- Modal for allocating supervisor -->
        <div class="modal fade" id="allocateModal" tabindex="-1" role="dialog" aria-labelledby="allocateModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="allocateModalLabel">Allocate Supervisor</h4>
              </div>
              <div class="modal-body">
                <!-- Form to select supervisor -->
                <form id="allocateForm" action="allocate_supervisor.php" method="post">
                  <div class="form-group">
                    <label for="supervisor">Select Supervisor:</label>
                    <select class="form-control" id="supervisor" name="supervisor" required>
                      <option value="">Select Supervisor</option>
                      <?php
                        // Fetch supervisors from supervisor table
                        include 'includes/conn.php';
                        $query = "SELECT fname FROM supervisor";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result)) {
                          echo "<option value='{$row['fname']}'>{$row['fname']}</option>";
                        }
                        mysqli_close($conn);
                      ?>
                    </select>
                  </div>
                  <input type="hidden" id="booking_id" name="booking_id">
                  <button type="submit" class="btn btn-primary">Allocate</button>
                </form>
              </div>
            </div>
          </div>
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
    $(document).ready(function() {
      $('#bookingTable').DataTable();

      $('#allocateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var booking_id = button.closest('form').find('input[name="booking_id"]').val(); // Extract info from data-* attributes
        var modal = $(this);
        modal.find('#booking_id').val(booking_id);
      });
    });
  </script>
</body>
</html>
