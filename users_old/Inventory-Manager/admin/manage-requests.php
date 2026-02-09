<?php
ob_start(); // Start output buffering

include 'includes/session.php';
include 'includes/slugify.php';
include 'includes/header.php';

// Handle actions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'includes/conn.php'; // Ensure database connection is included

  $tenderId = $_POST['tender_id'];
  $action = $_POST['action'];

  if ($action == 'approve') {
    // Update supplier_status to 1
    $stmt = $conn->prepare("UPDATE product_tenders SET supplier_status = 1 WHERE id = ?");
    $stmt->bind_param('i', $tenderId);
    if ($stmt->execute()) {
      $_SESSION['success'] = "Product Request approved successfully.";
    } else {
      $_SESSION['error'] = "Failed to approve request: " . htmlspecialchars($stmt->error);
    }
    $stmt->close();
  } elseif ($action == 'confirm_supply') {
    // Update supplier_status to 3
    $stmt = $conn->prepare("UPDATE product_tenders SET supplier_status = 3 WHERE id = ?");
    $stmt->bind_param('i', $tenderId);

    if ($stmt->execute()) {
      // Fetch the tender details to insert into the supplies table and update stock
      $stmt = $conn->prepare("SELECT title, description, quantity, unit_price, Amount, fname, lname, phone, email FROM product_tenders WHERE id = ?");
      $stmt->bind_param('i', $tenderId);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        $tender = $result->fetch_assoc();

        // Insert into supplies table
        $stmt = $conn->prepare("INSERT INTO supplies (title, description, quantity, unit_price, amount, fname, lname, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
          'ssddsssss',
          $tender['title'],
          $tender['description'],
          $tender['quantity'],
          $tender['unit_price'],
          $tender['Amount'],
          $tender['fname'],
          $tender['lname'],
          $tender['phone'],
          $tender['email']
        );
        
        if ($stmt->execute()) {
          // Update stock in products table
          $updateStmt = $conn->prepare("UPDATE products SET stock = stock + ? WHERE product_name = ?");
          $updateStmt->bind_param('is', $tender['quantity'], $tender['title']);

          if ($updateStmt->execute()) {
            $_SESSION['success'] = "Supply confirmed and inventory updated successfully.";
          } else {
            $_SESSION['error'] = "Supply confirmed but failed to update inventory: " . htmlspecialchars($updateStmt->error);
          }
          $updateStmt->close();
        } else {
          $_SESSION['error'] = "Failed to insert supply details: " . htmlspecialchars($stmt->error);
        }
        $stmt->close();
      } else {
        $_SESSION['error'] = "Request details not found.";
      }
    } else {
      $_SESSION['error'] = "Failed to confirm production: " . htmlspecialchars($stmt->error);
    }

  }


  header("Location: manage-requests.php"); // Redirect to avoid resubmission
  exit();
}
?>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h4>Inventory Manager Panel</h4>
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
              " . htmlspecialchars($_SESSION['error']) . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . htmlspecialchars($_SESSION['success']) . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>

        <!-- Posted Product_tenders -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Product Requests Applications</h3>
          </div>
          <div class="box-body">
            <form action="" method="GET">
              <div class="form-group">
                <input type="text" class="form-control" id="search" name="search"
                  placeholder="Search by title, description, or quantity">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <?php
            include 'includes/conn.php'; // Include your database connection
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $search = $conn->real_escape_string($search);

            // SQL query with search functionality
            $sql = "SELECT * FROM product_tenders 
                    WHERE title LIKE '%$search%' 
                        OR description LIKE '%$search%' 
                        OR quantity LIKE '%$search%' 
                    ORDER BY deadline DESC";
            $result = $conn->query($sql);

            if ($result) {
              if ($result->num_rows > 0) {


                echo '<div class="table-responsive">';
                echo "<table class='table table-bordered'>";
                echo "<thead><tr><th>Title</th><th>Description</th><th>Quantity</th><th>Unit Price</th><th>Amount</th><th>Deadline</th><th>Production Manager Name</th><th>Production Manager Phone</th><th>Production Manager Email</th><th>Supply Status</th><th>Actions</th></tr></thead>";
                echo "<tbody>";

                while ($row = $result->fetch_assoc()) {

                  // Check if the deadline has passed
                  $currentDate = new DateTime();
                  $deadlineDate = new DateTime($row['deadline']);
                  $isPastDeadline = $currentDate > $deadlineDate;
                  $supplyStatus = $row['supplier_status'];
                  $supplierStatus = $row['supplier_status'];

                  // Determine button states based on supply_status and supplier_status
                  $approveButtonDisabled = $supplierStatus == 2 || $supplyStatus == 1 || $supplyStatus == 3 || $isPastDeadline ? "disabled" : "";
                  $confirmSupplyButtonDisabled = $supplyStatus == 3 || $supplyStatus == 0 ? "disabled" : "";

                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['unit_price']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Amount']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['deadline']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['fname'] . " " . $row['lname']) . "</td>";

                  echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                  echo "<td>";

                  switch ($supplyStatus) {
                    case 0:
                      echo "Unallocated";
                      break;
                    case 1:
                      echo "Pending Supply";
                      break;
                    case 2:
                      echo "Supplied";
                      break;
                    case 3:
                      echo "Confirmed Supplied";
                      break;
                  }

                  echo "</td>";

                  echo "<td>
                            <form action='manage-requests.php' method='POST' style='display:inline;'>
    <input type='hidden' name='tender_id' value='" . $row['id'] . "'>
    <input type='hidden' name='action' value='approve'>
    <input type='hidden' name='quantity' value='" . $row['quantity'] . "'>
    <input type='hidden' name='title' value='" . htmlspecialchars($row['title']) . "'>
    <button type='submit' class='btn btn-success btn-sm' $approveButtonDisabled>Approve</button>
</form>
<br>
                            <form action='' method='POST' style='display:inline;'>
                              <input type='hidden' name='tender_id' value='" . $row['id'] . "'>
                              <input type='hidden' name='action' value='confirm_supply'>
                              <button class='btn btn-warning btn-sm' $confirmSupplyButtonDisabled>Confirm Production</button>
                            </form>
                        </td>";
                  echo "</tr>";

                }

                echo "</tbody>";
                echo "</table>";
              } else {
                echo "<p>No product requests found.</p>";
              }
            } else {
              echo "<p>Error executing query: " . htmlspecialchars($conn->error) . "</p>";
            }

            $conn->close();
            ?>
          </div>
        </div>

      </section>
      <!-- right col -->
      <script>
        $(document).ready(function () {
          $('.approve-btn').on('click', function () {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var quantity = $(this).data('quantity');

            if (confirm(`Are you sure you want to approve this request and add ${quantity} to the stock for ${title}?`)) {
              $.ajax({
                url: 'update_stock.php',
                type: 'POST',
                data: { tender_id: id, title: title, quantity: quantity },
                success: function (response) {
                  alert(response.message);
                  if (response.success) {
                    location.reload();
                  }
                },
                error: function () {
                  alert('An error occurred while updating the stock.');
                }
              });
            }
          });
        });


      </script>

    </div>
    <?php include 'includes/footer.php'; ?>

  </div>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>

</body>

</html>

<!--<?php
ob_end_flush(); // Flush the output buffer and turn off output buffering
$stmt->close();
$conn->close();
?>-->
<?php
// Flush the output buffer and turn off output buffering
ob_end_flush();

// Close $stmt if it exists
if (isset($stmt) && $stmt instanceof mysqli_stmt) {
  $stmt->close();
}

// Close $conn if it exists
if (isset($conn) && $conn instanceof mysqli) {
  $conn->close();
}
?>