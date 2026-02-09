<?php
include 'includes/conn.php';

// Example of fetching data from orders table joining with order_items table
$sql = "SELECT o.order_id, o.idnumber, o.fname, o.lname, o.email, o.phone, o.address, 
               GROUP_CONCAT(oi.product_name ORDER BY oi.order_item_id SEPARATOR '<br>') as product_names,
               GROUP_CONCAT(CASE WHEN oi.product_name = 'Total Price' THEN NULL ELSE oi.price END ORDER BY oi.order_item_id SEPARATOR '<br>') as prices,
               GROUP_CONCAT(CASE WHEN oi.product_name = 'Total Price' THEN NULL ELSE oi.quantity END ORDER BY oi.order_item_id SEPARATOR '<br>') as quantities,
               GROUP_CONCAT(oi.total ORDER BY oi.order_item_id SEPARATOR '<br>') as totals,
               o.totalamount, 
               o.transactioncode, 
               o.payment_status, 
               o.date_paid,
               o.dispatch_status
        FROM orders o
        INNER JOIN order_items oi ON o.order_id = oi.order_id
        GROUP BY o.order_id"; // Grouping by order_id to get all order items in one row per order

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn)); // Handle the error as per your application's logic
}

include 'includes/session.php'; // Start session if not already started
include 'includes/slugify.php';
include 'includes/header.php';
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

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <h3>Customer Orders</h3>
            
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
                        <th>Quantity</th>
                        <th>Dispatcher</th>
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
                        <td><?php echo isset($row['product_names']) ? nl2br($row['product_names']) : ''; ?></td>
                        <td><?php echo isset($row['quantities']) ? nl2br($row['quantities']) : ''; ?></td>
                        <td>
                        <?php
                        if (isset($row['dispatch_status'])) {
                          if ($row['dispatch_status'] == 0) {
                          echo 'Unallocated';
                          } elseif ($row['dispatch_status'] == 1) {
                          echo 'Allocated';
                          }
                        } else {
                          echo 'Unknown'; // Handle if dispatch_status is not retrieved
                        }
                        ?>
                        </td>
                        <td>
                        <?php if ($row['dispatch_status'] == 0) : ?>
                          <form action='' method='post' style='display:inline;'>
                            <input type='hidden' name='order_id' value='<?php echo isset($row['order_id']) ? $row['order_id'] : ''; ?>'>
                            <button type='button' class='btn btn-primary allocate-btn' data-toggle='modal' data-target='#allocateModal'>Allocate Dispatch Manager</button>
                          </form>
                        <?php elseif ($row['dispatch_status'] == 1) : ?>
                          <form action='' method='post' style='display:inline;'>
                            <input type='hidden' name='order_id' value='<?php echo isset($row['order_id']) ? $row['order_id'] : ''; ?>'>
                            <button type='button' class='btn btn-primary allocate-btn' data-toggle='modal' data-target='#allocateModal' disabled>Allocate Dispatch Manager</button>
                          </form>
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

        <!-- Modal for allocating supervisor -->
        <div class="modal fade" id="allocateModal" tabindex="-1" role="dialog" aria-labelledby="allocateModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="allocateModalLabel">Allocate Dispatch Manager</h4>
              </div>
              <div class="modal-body">
                <!-- Form to select supervisor -->
                <form id="allocateForm" action="allocate_dispatch.php" method="post">
                  <div class="form-group">
                    <label for="supervisor">Select Dispatch Manager:</label>
                    <select class="form-control" id="supervisor" name="supervisor" required>
                      <option value="">Select Dispatch Manager</option>
                      <?php
                        // Fetch supervisors from supervisor table
                        include 'includes/conn.php';
                        $query = "SELECT fname FROM dispatchmanager WHERE status=1";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result)) {
                          echo "<option value='{$row['fname']}'>{$row['fname']}</option>";
                        }
                        mysqli_close($conn);
                      ?>
                    </select>
                  </div>
                  <input type="hidden" id="order_id" name="order_id">
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

      // Handle allocation button click
      $('.allocate-btn').on('click', function() {
        var order_id = $(this).closest('form').find('input[name="order_id"]').val();
        $('#allocateForm').find('input[name="order_id"]').val(order_id);
      });
    });
  </script>

</body>
</html>
