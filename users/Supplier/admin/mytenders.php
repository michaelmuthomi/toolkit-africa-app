<?php
ob_start(); // Start output buffering

include 'includes/session.php'; 
include 'includes/slugify.php'; 
include 'includes/header.php'; 

// Handle supply action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'supply') {
    $tenderId = $_POST['tender_id'];
    $adminName = $_SESSION['admin'];

    include 'includes/conn.php'; // database connection is included

    // Check if the current user is allowed to supply
    $stmt = $conn->prepare("UPDATE tenders SET supplier_status = 2 WHERE id = ? AND fname = ? ");
    $stmt->bind_param('is', $tenderId, $adminName);
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $_SESSION['success'] = "Tender supplied successfully.";
        } else {
            $_SESSION['error'] = "Tender cannot be supplied or already supplied.";
        }
    } else {
        $_SESSION['error'] = "Failed to supply tender: " . htmlspecialchars($stmt->error);
    }
    $stmt->close();
    $conn->close();

    header("Location: mytenders.php"); // Redirect to avoid resubmission
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
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".htmlspecialchars($_SESSION['error'])."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".htmlspecialchars($_SESSION['success'])."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>

      <!-- Posted Tenders -->
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">My Tenders</h3>
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
            $sql = "SELECT * FROM tenders 
            WHERE (title LIKE '%$search%' 
                OR description LIKE '%$search%' 
                OR quantity LIKE '%$search%') 
            
            ORDER BY deadline DESC";
            $result = $conn->query($sql);

            if ($result) {
            if ($result->num_rows > 0) {

    echo '<div class="table-responsive">';
              echo "<table class='table table-bordered'>";
              echo "<thead><tr><th>Title</th><th>Description</th><th>Quantity (kg)</th><th>Unit Price</th><th>Amount</th><th>Posted At</th><th>Deadline</th><th>Status</th><th>Actions</th></tr></thead>";
              echo "<tbody>";

              while ($row = $result->fetch_assoc()) {

                // Check if the deadline has passed
                $currentDate = new DateTime();
                $deadlineDate = new DateTime($row['deadline']);
                $isPastDeadline = $currentDate > $deadlineDate;
                $isApproved = $row['supplier_status'] == 2;
                $issupplied = $row['supplier_status'] == 3;
                $supplyStatus = $row['supplier_status'];

                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td>" . htmlspecialchars($row['unit_price']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Amount']) . "</td>";
                echo "<td>" . htmlspecialchars($row['posted_at']) . "</td>";
                echo "<td>" . htmlspecialchars($row['deadline']) . "</td>";
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
                    <form action='' method='POST' style='display:inline;'>
                      <input type='hidden' name='tender_id' value='" . $row['id'] . "'>
                      <input type='hidden' name='action' value='supply'>
                      <button class='btn btn-success btn-sm'" . ($isApproved || $issupplied|| $isPastDeadline ? " disabled" : "") . ">Supply</button>
                    </form>
                </td>";
                echo "</tr>";
              }

              echo "</tbody>";
              echo "</table>";
            } else {
              echo "<p>No tenders found.</p>";
            }
        }

            $conn->close();
          ?>
        </div>
      </div>

    </section>
    <!-- right col -->

  </div>
  <?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

</body>
</html>

<?php
ob_end_flush(); // Flush the output buffer and turn off output buffering
?>
