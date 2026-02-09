<?php
// index.php

// Include database connection
include 'includes/conn.php';

// SQL query to fetch orders and their details
$sql = "SELECT 
            o.idnumber, 
            o.fname, 
            o.lname, 
            o.email, 
            o.phone, 
            o.address, 
            GROUP_CONCAT(oi.product_name ORDER BY oi.order_item_id SEPARATOR '<br>') as product_names,
            GROUP_CONCAT(CASE WHEN oi.product_name = 'Total Price' THEN NULL ELSE oi.price END ORDER BY oi.order_item_id SEPARATOR '<br>') as prices,
            GROUP_CONCAT(CASE WHEN oi.product_name = 'Total Price' THEN NULL ELSE oi.quantity END ORDER BY oi.order_item_id SEPARATOR '<br>') as quantities,
            GROUP_CONCAT(oi.total ORDER BY oi.order_item_id SEPARATOR '<br>') as totals,
            o.totalamount, 
            o.transactioncode, 
            o.payment_status, 
            o.date_paid,
            o.order_id
        FROM orders o
        INNER JOIN order_items oi ON o.order_id = oi.order_id
        GROUP BY o.order_id";

// Execute query
$result = mysqli_query($conn, $sql);

// Handle database query errors
if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

// Process form submission to approve payment
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approve_btn'])) {
    $orderId = $_POST['order_id'];

    // Update payment_status to 1 for the selected order
    $updateSql = "UPDATE orders SET payment_status = 1 WHERE order_id = $orderId";

    // Execute update query
    $updateResult = mysqli_query($conn, $updateSql);

    // Check if update was successful
    if ($updateResult) {
      $_SESSION['success']="Paid Approved Successfully";
        
    } else {
      $_SESSION['error']= "Failed to approve payment.";
    }
}

// Include session management, slugify, and header
include 'includes/session.php';
include 'includes/slugify.php';
include 'includes/header.php';
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php
    // Include navbar and menu bar
    include 'includes/navbar.php';
    include 'includes/menubar.php';
    ?>

    <div class="content-wrapper">
      <section class="content-header">
        <!--<h4>Finance Panel</h4>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>-->
      </section>

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
        <div class="row">
          <div class="col-xs-12">
            <h3>Pending Payments</h3>
            
    <div class="box box-info">
          <div class="box-body table-responsive">
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
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Total Amount</th>
                        <th>Transaction Code</th>
                        <th>Payment Status</th>
                        <th>Date Paid</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      // Convert result to array and sort by date_paid
                      $orders = [];
                      while ($row = mysqli_fetch_assoc($result)) {
                      $orders[] = $row;
                      }
                      
                      // Sort by date_paid in descending order (newest first)
                      usort($orders, function($a, $b) {
                      return strtotime($b['date_paid']) - strtotime($a['date_paid']);
                      });
                      
                      foreach ($orders as $row) : ?>
                      <tr>
                        <td><?php echo $row['idnumber']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo nl2br($row['product_names']); ?></td>
                        <td><?php echo nl2br($row['prices']); ?></td>
                        <td><?php echo nl2br($row['quantities']); ?></td>
                        <td><?php echo nl2br($row['totals']); ?></td>
                        <td><?php echo $row['totalamount']; ?></td>
                        <td><?php echo $row['transactioncode']; ?></td>
                        <td>
                        <?php 
                          if ($row['payment_status'] == 0) {
                          echo "Paid and Not Approved";
                          } elseif ($row['payment_status'] == 1) {
                          echo "Paid and Approved";
                          } 
                        ?>
                        </td>
                        <td><?php echo $row['date_paid']; ?></td>
                        <td>
                        <?php if ($row['payment_status'] == 0) : ?>
                          <form method="post">
                          <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                          <button type="submit" name="approve_btn" class="btn btn-success">Approve Payment</button>
                          </form>
                        <?php elseif ($row['payment_status'] == 1) : ?>
                          <button class="btn btn-success" disabled>Approved</button>
                        <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php
    // Include footer and scripts
    include 'includes/footer.php';
    include 'includes/scripts.php';
    ?>
  
    <script>
      $(document).ready(function() {
        // Initialize DataTables
        $('#ordersTable').DataTable({
          "scrollX": true, // Enable horizontal scrolling if needed
          "scrollY": "400px", // Set a fixed vertical scroll height, adjust as needed
          "scrollCollapse": true,
          "paging": false, // Disable pagination (optional)
          "autoWidth": false, // Disable automatic column width calculation
          "columnDefs": [
            { "width": "100px", "targets": [0, 1, 2, 3, 4, 5] } // Set fixed width for specific columns if needed
          ]
        });

      });
    </script>

  </div>
</body>
</html>
