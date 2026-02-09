<?php 
ob_start(); // Start output buffering
include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
        Finance Panel
      </h4>
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

      <?php
      include 'includes/conn.php'; // Include your database connection

      // Handle action requests
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $supplyId = $_POST['supply_id'];
          $action = $_POST['action'];

          if ($action == 'request_details') {
              // Update payment_status to 1
              $stmt = $conn->prepare("UPDATE supplies SET payment_status = 1 WHERE id = ?");
              $stmt->bind_param('i', $supplyId);
              if ($stmt->execute()) {
                  $_SESSION['success'] = "Bank details request sent successfully.";
              } else {
                  $_SESSION['error'] = "Failed to request bank details: " . htmlspecialchars($stmt->error);
              }
              $stmt->close();
          } elseif ($action == 'pay') {
              // Update payment_status to 2
              $stmt = $conn->prepare("UPDATE supplies SET payment_status = 3 WHERE id = ?");
              $stmt->bind_param('i', $supplyId);
              if ($stmt->execute()) {
                  $_SESSION['success'] = "Payment processed successfully.";
              } else {
                  $_SESSION['error'] = "Failed to process payment: " . htmlspecialchars($stmt->error);
              }
              $stmt->close();
          }

          $conn->close();
          header("Location: paytenders.php"); // Redirect to avoid resubmission
          exit();
      }
      ?>

      <!-- Display Supplies -->
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Manage Supplies</h3>
        </div>
        
          <?php
            $sql = "SELECT * FROM supplies ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result) {
                if ($result->num_rows > 0) {

    echo '<div class="table-responsive">';
                    echo "<table class='table table-bordered'>";
                    echo "<thead><tr><th>Title</th><th>Description</th><th>Quantity</th><th>Unit Price</th><th>Amount</th><th>Supplier Name</th><th>Supplier Phone</th><th>Supplier Email</th><th>Payment Status</th><th>Supplier Bank Account</th><th>Bank Type</th><th>Actions</th></tr></thead>";
                    echo "<tbody>";

                    while ($row = $result->fetch_assoc()) {
                        $paymentStatus = $row['payment_status'];

                        // Determine button states based on payment_status
                        $requestDetailsButtonDisabled = $paymentStatus == 1 || $paymentStatus == 2 ||$paymentStatus == 3||$paymentStatus == 4? "disabled" : "";
                        $payButtonDisabled = $paymentStatus != 2 ? "disabled" : "";

                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['unit_price']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['amount']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['bankaccount']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['banktype']) . "</td>";
                        echo "<td>";

                        
                            switch ($paymentStatus) {
                                case 0:
                                    echo "Pending";
                                    break;
                                case 1:
                                    echo "Bank Details Requested";
                                    break;
                                case 2:
                                    echo "Pending Payment";
                                    break;
                                case 3:
                                        echo "Paid and Not Confirmed";
                                        break;  
                                case 4:
                                        echo "Paid and Confirmed";
                                            break;            
                            }
                        

                        echo "</td>";
                        
                        echo "<td>
                            <form action='' method='POST' style='display:inline;'>
                              <input type='hidden' name='supply_id' value='" . $row['id'] . "'>
                              <input type='hidden' name='action' value='request_details'>
                              <button class='btn btn-primary btn-sm' $requestDetailsButtonDisabled>Request Bank Details</button>
                            </form><br><br>
                            <form action='' method='POST' style='display:inline;'>
                              <input type='hidden' name='supply_id' value='" . $row['id'] . "'>
                              <input type='hidden' name='action' value='pay'>
                              <button class='btn btn-success btn-sm' $payButtonDisabled>Pay</button>
                            </form>
                        </td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p>No supplies found.</p>";
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

