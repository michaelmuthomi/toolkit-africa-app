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
          Supplier Panel
        </h4>
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
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>

        <?php
        include 'includes/conn.php'; // Include your database connection
        
        // Handle action requests
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (isset($_POST['action']) && $_POST['action'] == 'provide_details') {
            $supplyId = $_POST['supply_id'];
            $bankAccount = $_POST['bank_account'];
            $bankType = $_POST['bank_type'];

            // Prepare the SQL statement
            $stmt = $conn->prepare("UPDATE supplies SET bankaccount = ?, banktype = ?, payment_status = 2 WHERE id = ?");
            if ($stmt === false) {
              $_SESSION['error'] = "Failed to prepare statement: " . htmlspecialchars($conn->error);
              header("Location: tenderspayments.php");
              exit();
            }

            // Bind parameters
            $stmt->bind_param('ssi', $bankAccount, $bankType, $supplyId);
            if ($stmt->execute()) {
              $_SESSION['success'] = "Bank details provided successfully.";
            } else {
              $_SESSION['error'] = "Failed to provide bank details: " . htmlspecialchars($stmt->error);
            }
            $stmt->close();

            $conn->close();
            header("Location: tenderspayments.php"); // Redirect to avoid resubmission
            exit();
          }

            if (isset($_POST['action']) && $_POST['action'] == 'confirm_payment') {
              $supplyId = $_POST['supply_id'];

              // First, get the supply details to update the tool quantity
              $stmt = $conn->prepare("SELECT title, quantity FROM supplies WHERE id = ?");
              if ($stmt === false) {
                $_SESSION['error'] = "Failed to prepare statement: " . htmlspecialchars($conn->error);
                header("Location: tenderspayments.php");
                exit();
              }
              $stmt->bind_param('i', $supplyId);
              $stmt->execute();
              $result = $stmt->get_result();
              $supply = $result->fetch_assoc();
              $stmt->close();

              if ($supply) {
                // Update the tool quantity in the tools table using title
                $stmt = $conn->prepare("UPDATE tools SET quantity = quantity + ? WHERE tool_name = ?");
                if ($stmt === false) {
                $_SESSION['error'] = "Failed to prepare tool update statement: " . htmlspecialchars($conn->error);
                header("Location: tenderspayments.php");
                exit();
                }
                $stmt->bind_param('is', $supply['quantity'], $supply['title']);
                if (!$stmt->execute()) {
                $_SESSION['error'] = "Failed to update tool quantity: " . htmlspecialchars($stmt->error);
                $stmt->close();
                header("Location: tenderspayments.php");
                exit();
                }
                $stmt->close();

                // Update the payment status
                $stmt = $conn->prepare("UPDATE supplies SET payment_status = 4 WHERE id = ? AND payment_status = 3");
                if ($stmt === false) {
                $_SESSION['error'] = "Failed to prepare statement: " . htmlspecialchars($conn->error);
                header("Location: tenderspayments.php");
                exit();
                }

                // Bind parameters
                $stmt->bind_param('i', $supplyId);
                if ($stmt->execute()) {
                $_SESSION['success'] = "Payment confirmed successfully and tool quantity updated.";
                } else {
                $_SESSION['error'] = "Failed to confirm payment: " . htmlspecialchars($stmt->error);
                }
                $stmt->close();
              } else {
                $_SESSION['error'] = "Supply not found.";
              }

              $conn->close();
              header("Location: tenderspayments.php"); // Redirect to avoid resubmission
              exit();
            }

          if (isset($_POST['action']) && $_POST['action'] == 'generate_receipt') {
            $supplyId = $_POST['supply_id'];

            // Retrieve supply details for the receipt
            $stmt = $conn->prepare("SELECT * FROM supplies WHERE id = ?");
            if ($stmt === false) {
              $_SESSION['error'] = "Failed to prepare statement: " . htmlspecialchars($conn->error);
              header("Location: tenderspayments.php");
              exit();
            }
            $stmt->bind_param('i', $supplyId);
            $stmt->execute();
            $result = $stmt->get_result();
            $supply = $result->fetch_assoc();
            $stmt->close();
            $conn->close();

            // Check if the supply exists and payment status is 4
            if ($supply && $supply['payment_status'] == 4) {
              // Generate receipt
              // For example, using PDF libraries like FPDF or TCPDF
              require('fpdf/fpdf.php'); // Make sure you have FPDF or a similar library
        
              $pdf = new FPDF();
              $pdf->AddPage();
              $pdf->SetFont('Arial', 'B', 16);
              $pdf->Cell(0, 10, 'Receipt', 0, 1, 'C');
              $pdf->Ln(10);

              $pdf->SetFont('Arial', '', 12);
              $pdf->Cell(0, 10, 'Title: ' . $supply['title'], 0, 1);
              $pdf->Cell(0, 10, 'Description: ' . $supply['description'], 0, 1);
              $pdf->Cell(0, 10, 'Quantity: ' . $supply['quantity'], 0, 1);
              $pdf->Cell(0, 10, 'Unit Price: ' . $supply['unit_price'], 0, 1);
              $pdf->Cell(0, 10, 'Amount: ' . $supply['amount'], 0, 1);
              $pdf->Cell(0, 10, 'Supplier: ' . $supply['fname'] . ' ' . $supply['lname'], 0, 1);
              $pdf->Cell(0, 10, 'Date: ' . date('Y-m-d'), 0, 1);

              $pdf->Output('I', 'Receipt_' . $supplyId . '.pdf'); // Output the PDF file
              exit();
            } else {
              $_SESSION['error'] = "Receipt cannot be generated for this supply.";
              header("Location: tenderspayments.php");
              exit();
            }
          }
        }
        ?>

        <!-- Display Supplies -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Supplies</h3>
          </div>
          <div class="box-body">
            <?php
            $sql = "SELECT * FROM supplies ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result) {
              if ($result->num_rows > 0) {
                echo '<div class="table-responsive">';
                echo "<table class='table table-bordered'>";
                echo "<thead><tr><th>Title</th><th>Description</th><th>Quantity</th><th>Unit Price</th><th>Amount</th><th>Supplier Name</th><th>Supplier Phone</th><th>Supplier Email</th><th>Payment Status</th><th>Actions</th></tr></thead>";
                echo "<tbody>";

                while ($row = $result->fetch_assoc()) {
                  $paymentStatus = $row['payment_status'];

                  // Determine button states based on payment_status
                  $provideDetailsButtonDisabled = $paymentStatus != 1 ? "disabled" : "";
                  $confirmPaymentButtonDisabled = $paymentStatus != 3 ? "disabled" : "";
                  $generateReceiptButtonDisabled = $paymentStatus != 4 ? "disabled" : "";

                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['unit_price']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['amount']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['email']) . "</td>";
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
                            <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#provideDetailsModal' data-id='" . $row['id'] . "' $provideDetailsButtonDisabled>Provide Bank Details</button>
                            <form method='POST' style='display:inline;' action=''>
                                <input type='hidden' name='supply_id' value='" . $row['id'] . "'>
                                <button class='btn btn-success btn-sm' name='action' value='confirm_payment' $confirmPaymentButtonDisabled>Confirm Payment</button>
                            </form>
                            <button class='btn btn-warning btn-sm' onclick='printReceipt(" . $row['id'] . ")' $generateReceiptButtonDisabled>Print Receipt</button>
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

    <!-- Modal for Providing Bank Details -->
    <div class="modal fade" id="provideDetailsModal" tabindex="-1" role="dialog"
      aria-labelledby="provideDetailsModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="provideDetailsModalLabel">Provide Bank Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="provideDetailsForm" method="POST" action="">
            <div class="modal-body">
              <input type="hidden" id="supply_id" name="supply_id">
              <div class="form-group">
                <label for="bank_type">Account Type</label>
                <!-- Select field with mpesa and bank atm as options -->
                <select class="form-control" id="bank_type" name="bank_type" required>
                  <option value="" disabled selected>Select Bank Type</option>
                  <option value="mpesa">Mpesa</option>
                  <option value="bank_atm">Bank ATM</option>
                </select>
              </div>
              <div class="form-group">
                <label for="bank_account">Account no</label>
                <input type="text" class="form-control" id="bank_account" name="bank_account" required maxlength="10"
                  pattern="[0-9]{10,20}" title="Account number must be between 0 to 9 digits">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
              <input type="hidden" name="action" value="provide_details">
            </div>
                  </form>
        </div>
      </div>
    </div>

      <?php include 'includes/footer.php'; ?>

  </div>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>

  <!-- Script to handle modal data population -->
  <script>
    $('#provideDetailsModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var supplyId = button.data('id'); // Extract info from data-* attributes

      var modal = $(this);
      modal.find('#supply_id').val(supplyId);
    });
  </script>
  <script>
    function printReceipt(supplyId) {
      // Open the receipt page in a new window or tab
      var receiptWindow = window.open("generate_receipt.php?supply_id=" + supplyId, "_blank");

      // Wait for the content to load and then print
      receiptWindow.onload = function () {
        receiptWindow.print();
      };
    }
  </script>

</body>
</html>

<?php
ob_end_flush(); // Flush the output buffer and turn off output buffering
?>