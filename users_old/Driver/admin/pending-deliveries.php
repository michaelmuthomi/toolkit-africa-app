<?php


include 'includes/session.php'; // Start session if not already started
include 'includes/slugify.php';
include 'includes/header.php';

include 'includes/conn.php';
$driver = $_SESSION['admin'];
// Example of fetching data from dispatch_tasks table
$sql = "SELECT * FROM driver_tasks where driver ='$driver'"; // Fetch all dispatch tasks

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn)); // Handle the error as per your application's logic
}





// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && isset($_POST['id'])) {
    $action = $_POST['action'];
    $id = $_POST['id'];

    if ($action == 'start') {
        if (updateStatus($id, 1, $conn)) {
            $_SESSION['success'] = "Delivery work successfully!";
        } else {
            $_SESSION['error'] = "Error updating status.";
        }
    } elseif ($action == 'end') {
        if (updateStatus($id, 2, $conn)) {
            $_SESSION['success'] = "Delivery successfully!";
        } else {
            $_SESSION['error'] = "Error updating status.";
        }
    } else {
        $_SESSION['error'] = "Invalid action.";
    }

    // Redirect back to the same page to display the message
    header("Location: pending-deliveries.php");
    exit;
}



// Function to update task status
function updateStatus($id, $newStatus, $conn) {
    $query = "UPDATE driver_tasks SET status = ? WHERE No = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $newStatus, $id);

    if ($stmt->execute()) {
        return true;
    } else {
        // Log error
        error_log("Error updating status: " . $stmt->error);
        return false;
    }
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
                        <!--<th>Action</th>-->
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
                                echo "Delivered to customer.";
                                break;
                              default:
                                echo "Unknown";
                                break;
                            }
                            ?>
                          </td>
                          </td>
                          <?php
                          echo '<td>';
                                if ($row['status'] == 0) {
                                    echo '<form method="post">';
                                    echo '<input type="hidden" name="id" value="' . $row['No'] . '">';
                                    echo '<input type="hidden" name="action" value="start">';
                                    echo '<button type="submit" class="btn btn-primary">Start Delivery</button>';
                                    echo '</form>';
                                } elseif ($row['status'] == 1) {
                                    echo '<form method="post">';
                                    echo '<input type="hidden" name="id" value="' . $row['No'] . '">';
                                    echo '<input type="hidden" name="action" value="end">';
                                    echo '<button type="submit" class="btn btn-success">Delivery Completed</button>';
                                    echo '</form>';
                                } elseif ($row['status'] == 2) {
                                    // Disable the button if status is 2 (completed)
                                    echo '<button type="button" class="btn btn-success" disabled>Delivery Completed</button>';
                                } /*else {
                                    // Handle any other status if necessary
                                    echo '-';
                                }*/

                                echo '</td>';
                                ?>
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
