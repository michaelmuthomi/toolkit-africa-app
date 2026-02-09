<?php


include 'includes/session.php'; // Start session if not already started
include 'includes/slugify.php';
include 'includes/header.php';

include 'includes/conn.php';
$dispatch = $_SESSION['admin'];
// Example of fetching data from dispatch_tasks table
$sql = "SELECT * FROM dispatch_tasks where status=0 and dispatch= '$dispatch'"; // Fetch all dispatch tasks

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
        <!--<h4>Customer Panel</h4>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>-->
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']); // Clear error message after displaying
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']); // Clear success message after displaying
        }
        ?>
        <div class="row">
          <div class="col-xs-12">
            <h3>Pending deliveries</h3>
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
                          </td>
                          <td>
                            <?php if ($row['status'] == 0) : ?>
                              <form action='update_status.php' method='post' style='display:inline;'>
                                <input type='hidden' name='order_id' value='<?php echo isset($row['No']) ? $row['No'] : ''; ?>'>
                                <input type='hidden' name='new_status' value='1'>
                                <button type='submit' class='btn btn-primary allocate-btn'>Check In</button>
                              </form>
                            <?php elseif ($row['status'] == 1) : ?>
                              <button type='button' class='btn btn-primary allocate-btn' disabled>Checked In</button>
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
        </section>
        </div>
        <?php include 'includes/footer.php'; ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- ./wrapper -->
<?php include 'includes/scripts.php'; ?>

  <script>
    $(function () {
      // Initialize DataTables
      $('#ordersTable').DataTable();
    });
  </script>

</body>
</html>
