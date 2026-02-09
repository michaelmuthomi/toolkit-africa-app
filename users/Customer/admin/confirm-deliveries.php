<?php


include 'includes/session.php'; // Start session if not already started
include 'includes/slugify.php';
include 'includes/header.php';

include 'includes/conn.php';
$dispatch = $_SESSION['admin'];
// Example of fetching data from dispatch_tasks table
$sql = "SELECT * FROM dispatch_tasks where fname= '$dispatch'"; // Fetch all dispatch tasks

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn)); // Handle the error as per your application's logic
}




// Process update if 'id' parameter is set in URL (from update_status.php)
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $task_id = $_GET['id'];

    // Update task status to 2 (Work Completed. Waiting for Customer Approval)
    $query = "UPDATE dispatch_tasks SET status = 3 WHERE No = $task_id";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Delivery Completed";
    } else {
        $_SESSION['error'] = "Error updating task status: " . mysqli_error($conn);
    }

    // Redirect to prevent form resubmission on refresh
    header("Location: confirm-deliveries.php");
    exit();
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
          <li class="active">Dashboard</li>
        </ol>-->
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
            <h3>My orders and Deliveries</h3>
            <div class="box">
              <div class="box-body">

    <div class="table-responsive">
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
                          
                            <?php
                            $status = isset($row['status']) ? $row['status'] : 0;
                            switch ($status) {
                              case 0:
                                $status="Pending delivery";
                                $buttonDisabled = 'disabled';
                                break;
                              case 1:
                                $status= "Start Delivery Process";
                                $buttonDisabled = 'disabled';
                                break;
                              case 2:
                                $status="Delivered to customer, waiting for confirmation";
                                $buttonDisabled = '';
                                break;
                              case 3:
                                $status="Customer Confirmed. Delivery Completed";
                                $buttonDisabled = 'disabled';
                                break;
                              default:
                                $status ="Unknown";
                                $buttonDisabled = 'disabled';
                                break;
                            }
                            echo "<td>{$status}</td>";
                            ?>
                         
                        
                          <?php 

                  echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#confirmModal{$row['No']}' {$buttonDisabled}>Confirm Delivery Received</button></td>";
                       ?>
                            <?php // Modal for each task
                                            echo "<div class='modal fade' id='confirmModal{$row['No']}' tabindex='-1' role='dialog' aria-labelledby='confirmModalLabel{$row['No']}'>";
                                            echo "<div class='modal-dialog' role='document'>";
                                            echo "<div class='modal-content'>";
                                            echo "<div class='modal-header'>";
                                            echo "<h4 class='modal-title' id='confirmModalLabel{$row['No']}'>Confirm Delivery Received</h4>";
                                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                            echo "<span aria-hidden='true'>&times;</span>";
                                            echo "</button>";
                                            echo "</div>";
                                            echo "<div class='modal-body'>";
                                            echo "Are you sure you want to mark this delivery as completed?";
                                            echo "</div>";
                                            echo "<div class='modal-footer'>";
                                            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                            echo "<a href='confirm-deliveries.php?id={$row['No']}' class='btn btn-primary'>Confirm</a>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";?>
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
  </div>
  <?php include 'includes/scripts.php'; ?>

  <script>
    $(function () {
      // Initialize DataTables
      $('#ordersTable').DataTable();
    });
  </script>

</body>
</html>
