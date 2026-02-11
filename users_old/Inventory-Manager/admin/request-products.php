<?php include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
// Handle new tender posting
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'post') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    // $unit_price = $_POST['unit_price'];
    $deadline = $_POST['deadline'];

    // Basic validation
    if (empty($title) || empty($description) || empty($quantity) || empty($deadline)) {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: product_tenders.php'); // Redirect to the form page
        exit();
    }

    // Calculate amount
    $amount = $quantity * $unit_price;

    // Prepare and execute SQL query
    $stmt = $conn->prepare("INSERT INTO product_tenders (title, description, quantity, deadline) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssis', $title, $description, $quantity, $deadline);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Request posted successfully.';
    } else {
        $_SESSION['error'] = 'Failed to post request.';
    }

    $stmt->close();
    $conn->close();

    header('Location: product_tenders.php'); // Redirect to the form page
    exit();
}

// Handle delete tender
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];

    // Prepare and execute SQL query
    $stmt = $conn->prepare("DELETE FROM product_tenders WHERE id=?");
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Request deleted successfully.';
    } else {
        $_SESSION['error'] = 'Failed to delete request.';
    }
    
    $stmt->close();
    $conn->close();
    
    header('Location: product_tenders.php'); // Redirect to the list page
    exit();
}

// Handle update tender
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    $amount = $quantity * $unit_price; // Calculate amount
    $deadline = $_POST['deadline'];

    // Basic validation
    if (empty($title) || empty($description) || empty($quantity) || empty($unit_price) || empty($deadline)) {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: your_dashboard_page.php'); // Redirect to the form page
        exit();
    }

    // Prepare and execute SQL query
    $stmt = $conn->prepare("UPDATE product_tenders SET title=?, description=?, quantity=?, unit_price=?, deadline=?, amount=? WHERE id=?");
    $stmt->bind_param('ssidsii', $title, $description, $quantity, $unit_price, $deadline, $amount, $id);

if ($stmt->execute()) {
        $_SESSION['success'] = 'Request updated successfully.';
    } else {
        $_SESSION['error'] = 'Failed to update request.';
    }
    
    $stmt->close();
    $conn->close();
    
    header('Location: product_tenders.php'); // Redirect to the list page
    exit();
}

// Handle new product request submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'post') {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $quantity = $_POST['quantity'];
  $deadline = $_POST['deadline'];

  // Basic validation
  if (empty($title) || empty($description) || empty($quantity) || empty($deadline)) {
    $_SESSION['error'] = 'All fields are required.';
    header('Location: request-products.php');
    exit();
  }

  // Prepare and execute SQL query
  $stmt = $conn->prepare("INSERT INTO product_tenders (title, description, quantity, deadline, posted_at) VALUES (?, ?, ?, ?, NOW())");
  $stmt->bind_param('ssis', $title, $description, $quantity, $deadline);

  if ($stmt->execute()) {
    $_SESSION['success'] = 'Product request created successfully.';
  } else {
    $_SESSION['error'] = 'Failed to create product request.';
  }

  $stmt->close();
  $conn->close();

  header('Location: request-products.php');
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

      <!-- Add Tender Form -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Request for Products</h3>
        </div>
        <div class="box-body">
        <form id="tenderForm" action="" method="POST">
    <input type="hidden" name="action" value="post"> 

        <!-- Add this to your form in request-products.php -->
    <div class="form-group">
        <a href="manage-requests.php" class="btn btn-info">View Request Status</a>
    </div>
    <!-- Dropdown to select product as Tender Title -->
    <div class="form-group row mb-3">
        <div class="col-xl-6">
            <label class="form-control-label">Select Product<span class="text-danger ml-2">*</span></label>
            <?php
            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'toolkit africa_db');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch product names
            $qry = "SELECT product_name FROM products";
            $result = $conn->query($qry);

            // Create dropdown for product selection
            if ($result && $result->num_rows > 0) {
                echo '<select required name="title" id="productSelect" class="form-control mb-1">';
                echo '<option value="">--Select Product--</option>';
                while ($rows = $result->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($rows['product_name']) . '">' . htmlspecialchars($rows['product_name']) . '</option>';
                }
                echo '</select>';
            } else {
                echo '<p>No products available. Please add products first.</p>';
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Remaining Tender Form Fields -->
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity </label>
        <input type="number" class="form-control" id="quantity" name="quantity" required min="0" max="999" oninput="if(this.value.length > 3) this.value = this.value.slice(0, 3);">
    </div>
    <!-- <div class="form-group">
        <label for="unit_price">Unit Price</label>
        <input type="number" step="0.01" class="form-control" id="unit_price" name="unit_price" required min="0" max="5000" oninput="if(this.value > 5000) { alert('Maximum unit price allowed is 5,000'); this.focus(); }">
    </div>
    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="text" class="form-control" id="amount" name="amount" readonly>
    </div> -->
    <div class="form-group">
    <label for="deadline">Submission Deadline</label>
    <input 
        type="date" 
        class="form-control" 
        id="deadline" 
        name="deadline" 
        min="<?= date('Y-m-d'); ?>" 
        required>
</div>


    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Request for Products</button>
</form>

      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Posted Requests</h3>
        </div>
        <div class="box-body">
          <form action="" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" id="search" name="search" placeholder="Search by title, description, or quantity">
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

            if ($result->num_rows > 0) {
              
    echo '<div class="table-responsive">';
              echo "<table class='table table-bordered'>";
            echo "<thead><tr><th>Title</th><th>Description</th><th>Quantity</th><th>Unit Price</th><th>Amount</th><th>Deadline</th><th>Posted At</th><th>Actions</th></tr></thead>";
              echo "<tbody>";

              while ($row = $result->fetch_assoc()) {

                // Check if the deadline has passed
                $currentDate = new DateTime();
                $deadlineDate = new DateTime($row['deadline']);
                $isPastDeadline = $currentDate > $deadlineDate;
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td>" . htmlspecialchars($row['unit_price']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Amount']) . "</td>";
                echo "<td>" . htmlspecialchars($row['deadline']) . "</td>";
                echo "<td>" . htmlspecialchars($row['posted_at']) . "</td>";
                echo "<td>
                    <button class='btn btn-success btn-sm edit-btn' data-id='" . $row['id'] . "' data-title='" . htmlspecialchars($row['title']) . "' data-description='" . htmlspecialchars($row['description']) . "' data-quantity='" . htmlspecialchars($row['quantity']) . "' data-unit-price='" . htmlspecialchars($row['unit_price']) . "' data-deadline='" . htmlspecialchars($row['deadline']) . "'" . ($isPastDeadline ? " disabled" : "") . "><i class='fas fa-edit'></i></button>
                    <button class='btn btn-danger btn-sm delete-btn' data-id='" . $row['id'] . "'><i class='fas fa-trash'></i></button>
                </td>";
                echo "</tr>";
              }

              echo "</tbody>";
              echo "</table>";
            } else {
              echo "<p>No product_tenders found.</p>";
            }

            $conn->close();
          ?>
        </div>
      </div>

    </section>
    <!-- right col -->

    <!-- Edit Tender Modal -->
    <div id="editTenderModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Request</h4>
          </div>
          <div class="modal-body">
            <form id="editTenderForm" action="" method="POST">
              <input type="hidden" name="action" value="update">
              <input type="hidden" id="edit_tender_id" name="id">
              <div class="form-group">
                <label for="edit_title">Request Title</label>
                <input type="text" class="form-control" id="edit_title" name="title" required>
              </div>
              <div class="form-group">
                <label for="edit_description">Description</label>
                <textarea class="form-control" id="edit_description" name="description" rows="4" required></textarea>
              </div>
              <div class="form-group">
                <label for="edit_quantity">Quantity</label>
                <input type="number" class="form-control" id="edit_quantity" name="quantity" required min="0" maxlength="3">
              </div>
              <!-- <div class="form-group">
                <label for="edit_unit_price">Unit Price</label>
                <input type="number" step="0.01" class="form-control" id="edit_unit_price" name="unit_price" required min="0">
              </div> -->
              <div class="form-group">
                <label for="edit_deadline">Submission Deadline</label>
                <input type="date" class="form-control" id="edit_deadline" name="deadline" required>
              </div>
              <button type="submit" class="btn btn-primary">Update Request</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Tender Modal -->
    <div id="deleteTenderModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Request</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete this request?</p>
            <form id="deleteTenderForm" action="" method="POST">
              <input type="hidden" name="action" value="delete">
              <input type="hidden" id="delete_tender_id" name="id">
              <button type="submit" class="btn btn-danger">Delete</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

<script>
$(document).ready(function() {
  // Handle Edit Button Click
  $('.edit-btn').on('click', function() {
    var id = $(this).data('id');
    var title = $(this).data('title');
    var description = $(this).data('description');
    var quantity = $(this).data('quantity');
    var unitPrice = $(this).data('unit-price');
    var deadline = $(this).data('deadline');

    $('#editTenderModal').modal('show');
    $('#edit_tender_id').val(id);
    $('#edit_title').val(title);
    $('#edit_description').val(description);
    $('#edit_quantity').val(quantity);
    $('#edit_unit_price').val(unitPrice);
    $('#edit_deadline').val(deadline);
  });

  // Handle Delete Button Click
  $('.delete-btn').on('click', function() {
    var id = $(this).data('id');

    $('#deleteTenderModal').modal('show');
    $('#delete_tender_id').val(id);
  });

  // Calculate and update amount on input changes
  $('#quantity, #unit_price').on('input', function() {
    var quantity = parseFloat($('#quantity').val()) || 0;
    var unitPrice = parseFloat($('#unit_price').val()) || 0;
    var amount = quantity * unitPrice;

    $('#amount').val(amount.toFixed(2)); // Update amount field
  });

  $('#edit_quantity, #edit_unit_price').on('input', function() {
    var quantity = parseFloat($('#edit_quantity').val()) || 0;
    var unitPrice = parseFloat($('#edit_unit_price').val()) || 0;
    var amount = quantity * unitPrice;

    $('#edit_amount').val(amount.toFixed(2)); // Update amount field in edit modal
  });
});
</script>

</body>
</html>
