<?php
// Include session management and database connection
include 'includes/session.php'; // Start session if not already started
include 'includes/slugify.php';
include 'includes/header.php';

include 'includes/conn.php';
$dispatch = $_SESSION['admin'];
// Example of fetching data from orders table joining with order_items table
$sql = "SELECT * From dispatch_tasks where status=1 and dispatch = '$dispatch'"; // Grouping by order_id to get all order items in one row per order

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn)); // Handle the error as per your application's logic
}
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h4>Customer Panel</h4>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
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
        <div class="row">
          <div class="col-xs-12">
            <h3>My Pending deliveries</h3>
            <div class="box">
              <div class="box-body">
                <div style="overflow-x: auto;">
                  <table id="ordersTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Delivery Status</th>
                        <th>Driver Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                          <td><?php echo isset($row['idnumber']) ? $row['idnumber'] : ''; ?></td>
                          <td><?php echo isset($row['fname']) ? $row['fname'] : ''; ?></td>
                          <td><?php echo isset($row['lname']) ? $row['lname'] : ''; ?></td>
                          <td><?php echo isset($row['email']) ? $row['email'] : ''; ?></td>
                          <td><?php echo isset($row['phone']) ? $row['phone'] : ''; ?></td>
                          <td><?php echo isset($row['address']) ? $row['address'] : ''; ?></td>
                          <td><?php echo isset($row['productname']) ? nl2br($row['productname']) : ''; ?></td>
                          <td><?php echo isset($row['quantity']) ? nl2br($row['quantity']) : ''; ?></td>
                          <td>
                            <?php
                            $status = isset($row['status']) ? $row['status'] : 0;
                            switch ($status) {
                              case 0:
                                echo "Pending delivery";
                                break;
                              case 1:
                                echo "Start Delivery Process";
                                break;
                              case 2:
                                echo "Delivered to customer, waiting for confirmation";
                                break;
                              case 3:
                                echo "Customer Confirmed. Delivery Completed";
                                break;
                              default:
                                echo "Unknown";
                                break;
                            }
                            ?>
                          </td>
                          <td>
                            <?php
                            if (isset($row['driver_status'])) {
                              if ($row['driver_status'] == 0) {
                                echo 'Unallocated';
                              } elseif ($row['driver_status'] == 1) {
                                echo 'Allocated';
                              }
                            } else {
                              echo 'Unknown'; // Handle if dispatch_status is not retrieved
                            }
                            ?>
                          </td>
                          <td>
                            <?php if ($row['driver_status'] == 0) : ?>
                              <form action='set_order_session.php' method='post' style='display:inline;'>
                                <input type='hidden' name='no' value='<?php echo isset($row['No']) ? $row['No'] : ''; ?>'>
                                <button type='submit' class='btn btn-primary'>Allocate Driver</button>
                              </form>
                            <?php elseif ($row['driver_status'] == 1) : ?>
                              <button type='button' class='btn btn-primary' disabled>Driver Allocated</button>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal for allocating Driver -->
        <div class="modal fade" id="allocateModal" tabindex="-1" role="dialog" aria-labelledby="allocateModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="allocateModalLabel">Allocate Driver</h4>
              </div>
              <div class="modal-body">
                <!-- Form to select supervisor -->
                <form id="allocateForm" action="allocate_drivers.php" method="post">
                  <div class="form-group">
                    <label for="supervisor">Select Driver:</label>
                    <select class="form-control" id="supervisor" name="supervisor" required>
                      <option value="">Select Driver</option>
                      <?php
                      // Fetch supervisors from supervisor table
                      $query = "SELECT fname FROM driver WHERE status=1";
                      $result = mysqli_query($conn, $query);
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['fname']}'>{$row['fname']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <input type='hidden' id='no' name='no' value='<?php echo isset($_SESSION['order_no']) ? $_SESSION['order_no'] : ''; ?>'>
                  <button type="submit" class="btn btn-primary">Allocate</button>
                </form>
              </div>
            </div>
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
      $('#ordersTable').DataTable();
    });

    $(document).ready(function() {
        <?php if(isset($_GET['openmodal']) && $_GET['openmodal'] == 'true'): ?>
            $('#allocateModal').modal('show');
        <?php endif; ?>
    });
  </script>

</body>
</html>
