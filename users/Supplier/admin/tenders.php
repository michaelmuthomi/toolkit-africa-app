<?php 
include 'includes/session.php'; 
include 'includes/slugify.php'; 
include 'includes/header.php'; 
include 'includes/conn.php'; // Ensure database connection is included

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'apply') {
    $tenderId = $_POST['tender_id'];
    $supplierFname = $_POST['supplier_fname'];
    $supplierLname = $_POST['supplier_lname'];
    $supplierPhone = $_POST['supplier_phone'];
    $supplierEmail = $_POST['supplier_email'];
  $unitPrice = $_POST['unit_price'];
  $amount = $_POST['amount'];

    // Basic validation
  if (empty($supplierFname) || empty($supplierLname) || empty($supplierPhone) || empty($supplierEmail) || empty($unitPrice) || empty($amount)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: tenders.php"); // Redirect to avoid resubmission
        exit();
    }

  // Validate that unit_price and amount are numeric
  if (!is_numeric($unitPrice) || !is_numeric($amount)) {
    $_SESSION['error'] = "Unit price and amount must be numeric values.";
    header("Location: tenders.php");
    exit();
  }

  // Check if the supplier has already applied for this tender
    $stmt = $conn->prepare("SELECT COUNT(*) AS applied FROM tenders WHERE id = ? AND fname = ? AND lname = ? AND phone = ? AND email = ?");
    $userFname = $_SESSION['fname']; // Assuming these details are stored in session
    $userLname = $_SESSION['lname'];
    $userPhone = $_SESSION['phone'];
    $userEmail = $_SESSION['email'];
    $stmt->bind_param('issss', $tenderId, $userFname, $userLname, $userPhone, $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['applied'] > 0) {
        $_SESSION['error'] = "You have already applied for this tender.";
        header("Location: tenders.php");
        exit();
    }

  // Update the tenders table to mark that this supplier has applied and update unit_price and amount
  $stmt = $conn->prepare("UPDATE tenders SET fname = ?, lname = ?, phone = ?, email = ?, unit_price = ?, Amount = ?, applied = 1 WHERE id = ?");
    if (!$stmt) {
        $_SESSION['error'] = "Prepare failed: " . htmlspecialchars($conn->error);
        header("Location: tenders.php");
        exit();
    }

  $stmt->bind_param('ssssddi', $supplierFname, $supplierLname, $supplierPhone, $supplierEmail, $unitPrice, $amount, $tenderId);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $_SESSION['success'] = "Application submitted successfully.";
        } else {
            $_SESSION['error'] = "No changes were made to the application.";
        }
    } else {
        $_SESSION['error'] = "Failed to submit application: " . htmlspecialchars($stmt->error);
    }
    $stmt->close();

    header("Location: tenders.php");
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
      <h4>Supplier Panel</h4>
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

        // Fetch current user details from session
        $user_id = $_SESSION['admin']; // user fname is stored in session

        $sql = "SELECT * FROM supplier WHERE fname = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $user_result = $stmt->get_result();
        $user = $user_result->fetch_assoc();
        $stmt->close();

        // Fetch tenders
        $sql = "SELECT * FROM tenders where supplier_status=0 ORDER BY deadline DESC";
        $result = $conn->query($sql);

        // Render Search Bar and Card
        echo "
        <div class='card' style='background-color: white;'>
          <div class='card-header'>
            <h3 class='card-title'>Tenders</h3>
            <div class='card-tools'>
              <input type='text' id='search-bar' class='form-control' placeholder='Search Tenders'>
            </div>
          </div>
          <div class='card-body'>
        ";

        if ($result->num_rows > 0) {
          
          echo '<div class="table-responsive">';
          echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>Title</th><th>Description</th><th>Quantity</th><th>Posted At</th><th>Deadline</th><th>Actions</th></tr></thead>";
          echo "<tbody>";

          while ($row = $result->fetch_assoc()) {
            // Check if the deadline has passed
            $currentDate = new DateTime();
            $deadlineDate = new DateTime($row['deadline']);
            $isPastDeadline = $currentDate > $deadlineDate;

            // Check if the supplier has already applied
            $stmt = $conn->prepare("SELECT COUNT(*) AS applied FROM tenders WHERE id = ? AND fname = ? AND lname = ? AND phone = ? AND email = ?");
            $stmt->bind_param('issss', $row['id'], $user['fname'], $user['lname'], $user['phone'], $user['email']);
            $stmt->execute();
            $result = $stmt->get_result();
            $applicationStatus = $result->fetch_assoc();
            $stmt->close();
            $hasApplied = $applicationStatus['applied'] > 0;

            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['title']) . "</td>";
            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
            echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
            // echo "<td>" . htmlspecialchars($row['unit_price']) . "</td>";
            // echo "<td>" . htmlspecialchars($row['Amount']) . "</td>";
            echo "<td>" . htmlspecialchars($row['posted_at']) . "</td>";
            echo "<td>" . htmlspecialchars($row['deadline']) . "</td>";
            echo "<td>
                <button class='btn btn-primary apply-btn'" . ($isPastDeadline || $hasApplied ? " disabled" : "") . " data-id='" . $row['id'] . "' data-title='" . htmlspecialchars($row['title']) . "' data-description='" . htmlspecialchars($row['description']) . "' data-quantity='" . htmlspecialchars($row['quantity']) . "' data-unit_price='" . htmlspecialchars($row['unit_price']) . "' data-amount='" . htmlspecialchars($row['Amount']) . "' data-deadline='" . htmlspecialchars($row['deadline']) . "'>Apply</button>
            </td>";
            echo "</tr>";
          }

          echo "</tbody>";
          echo "</table>";
        } else {
          echo "<p>No tenders available.</p>";
        }

        $conn->close();
      ?>
    </section>
    <!-- right col -->
  </div>
  <?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<!-- Bootstrap Modal HTML -->
<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="applyModalLabel">Tender Application</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="apply-form" action="" method="POST">
          <input type="hidden" name="tender_id" id="tender_id">
          <div class="form-group">
            <label for="modal-title">Title</label>
            <input type="text" class="form-control" id="modal-title" disabled>
          </div>
          <div class="form-group">
            <label for="modal-description">Description</label>
            <textarea class="form-control" id="modal-description" rows="3" disabled></textarea>
          </div>
          <div class="form-group">
            <label for="modal-quantity">Quantity </label>
            <input type="text" class="form-control" id="modal-quantity" disabled>
          </div>
          <div class="form-group">
            <label for="modal-unit_price">Unit Price</label>
            <input type="number" step="0.01" class="form-control" name="unit_price" id="modal-unit_price" required min="50" max="500" oninput="if(this.value > 500) { alert('Maximum unit price allowed is 500'); this.focus(); }" required>
          </div>
          <div class="form-group">
            <label for="modal-amount">Amount</label>
            <input type="number" step="0.01" class="form-control" name="amount" id="modal-amount" required>
          </div>
          <div class="form-group">
            <label for="modal-deadline">Deadline</label>
            <input type="text" class="form-control" id="modal-deadline" disabled>
          </div>
          <div class="form-group">
            <label for="supplier_fname">First Name</label>
            <input type="text" class="form-control" name="supplier_fname" id="supplier_fname" value="<?php echo htmlspecialchars($user['fname']); ?>" readonly>
          </div>
          <div class="form-group">
            <label for="supplier_lname">Last Name</label>
            <input type="text" class="form-control" name="supplier_lname" id="supplier_lname" value="<?php echo htmlspecialchars($user['lname']); ?>" readonly>
          </div>
          <div class="form-group">
            <label for="supplier_phone">Phone</label>
            <input type="text" class="form-control" name="supplier_phone" id="supplier_phone" value="<?php echo htmlspecialchars($user['phone']); ?>" readonly>
          </div>
          <div class="form-group">
            <label for="supplier_email">Email</label>
            <input type="email" class="form-control" name="supplier_email" id="supplier_email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
          </div>
          <input type="hidden" name="action" value="apply">
          <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Script to handle tender applications and search functionality -->
<script>
$(document).ready(function() {
  // Handle form submission for tender applications
  $('.apply-btn').on('click', function() {
    var button = $(this);
    var tenderId = button.data('id');
    var title = button.data('title');
    var description = button.data('description');
    var quantity = button.data('quantity');
    var unitPrice = button.data('unit_price');
    var amount = button.data('amount');
    var deadline = button.data('deadline');

    // Set the modal fields
    $('#applyModal #tender_id').val(tenderId);
    $('#applyModal #modal-title').val(title);
    $('#applyModal #modal-description').val(description);
    $('#applyModal #modal-quantity').val(quantity);
    $('#applyModal #modal-unit_price').val(unitPrice);
    $('#applyModal #modal-amount').val(amount);
    $('#applyModal #modal-deadline').val(deadline);

    // Show the modal
    $('#applyModal').modal('show');
  });

  // Auto-calculate amount when unit price changes
  $('#modal-unit_price').on('input', function() {
    var unitPrice = parseFloat($(this).val()) || 0;
    var quantity = parseFloat($('#modal-quantity').val()) || 0;
    var amount = unitPrice * quantity;
    $('#modal-amount').val(amount.toFixed(2));
  });

  // Allow manual amount entry but validate it
  $('#modal-amount').on('input', function() {
    var amount = parseFloat($(this).val()) || 0;
    var unitPrice = parseFloat($('#modal-unit_price').val()) || 0;
    var quantity = parseFloat($('#modal-quantity').val()) || 0;
    
    // Optional: You can add validation here if needed
    // For example, warn if amount doesn't match unit_price * quantity
  });

  // Search functionality
  $('#search-bar').on('input', function() {
    var searchValue = $(this).val().toLowerCase();
    $('.table tbody tr').each(function() {
      var rowText = $(this).text().toLowerCase();
      $(this).toggle(rowText.indexOf(searchValue) !== -1);
    });
  });
});
</script>

</body>
</html>
