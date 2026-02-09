<?php
// Include necessary PHP files
include 'includes/session.php';
include 'includes/slugify.php';
include 'includes/header.php';
include 'includes/dbcon.php'; // Assuming this file initializes $pdo
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Work Item Requests</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h4>Work Item Requests</h4>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="col-md-12">
                        <h4>Work Item Requests</h4>
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo "
                                <div class='alert alert-danger alert-dismissible'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <h4><i class='icon fa fa-warning'></i> Error!</h4>
                                    ".$_SESSION['error']."
                                </div>
                            ";
                            unset($_SESSION['error']);
                        }
                        if (isset($_SESSION['success'])) {
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

                        <!-- Work Item Table -->
                        <div class="box box-info">
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>Service</th>
                                            <th>Product Details</th>
                                            <th>Quantity Requested</th>
                                            <th>Cleaner</th>
                                            <th> </th>
                                            <th>Approve Request</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        // Query to fetch work item data, grouping by ord_id
                                        $statement = $pdo->prepare("SELECT * FROM work_items WHERE status = 0 ORDER BY ord_id");
                                        $statement->execute();
                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

                                        // Group items by ord_id
                                        $groupedItems = [];
                                        foreach ($result as $row) {
                                            $groupedItems[$row['ord_id']][] = $row;
                                        }

                                        // Loop through grouped items and display them
                                        foreach ($groupedItems as $ord_id => $items) {
                                            $i++;
                                            // Fetch the first item for order details (service, cleaner, status)
                                            $firstItem = $items[0];
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $firstItem['ord_id']; ?></td>
                                                <td><?php echo $firstItem['service']; ?></td>
                                                <td>
                                                    <ul>
                                                        <?php
                                                        // Display product details in a list for the same ord_id
                                                        $products = [];
                                                        $quantities = [];
                                                        foreach ($items as $item) {
                                                            $products[] = "{$item['prod_name']} - {$item['description']}";
                                                            $quantities[] = $item['quantity'];
                                                        }
                                                        echo implode("<br>", $products);
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <?php
                                                    // Display quantities in a linear format, comma-separated
                                                    echo implode(", ", $quantities);
                                                    ?>
                                                </td>
                                                <td><?php echo $firstItem['cleaner']; ?></td> <!-- Cleaner name -->
                                                <td>
                                                    <?php
                                                    if ($firstItem['status'] == 0) {
                                                        echo "";
                                                    } elseif ($firstItem['status'] == 1) {
                                                        echo "";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($firstItem['status'] == 0): ?>
                                                        <button class="btn btn-warning approve-btn" data-ord-id="<?php echo htmlspecialchars($firstItem['ord_id']); ?>">Approve</button>
                                                    <?php else: ?>
                                                        <button class="btn btn-success" disabled>Approved</button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include 'includes/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
  <?php include 'includes/scripts.php'; ?>


  <script>
    $(document).ready(function() {
        // Event delegation to handle approve button click
        $(document).on('click', '.approve-btn', function() {
            var ordId = $(this).data('ord-id');
            var button = $(this);

            // Confirm before approval
            if (confirm('Are you sure you want to approve this request?')) {
                $.ajax({
                    type: 'POST',
                    url: 'approve_request.php',
                    data: { ord_id: ordId },
                    success: function(response) {
                        if (response == 'success') {
                            // Change button text and style
                            button.removeClass('btn-warning').addClass('btn-success').text('Approved');
                            // Optionally, disable the button after approval
                            button.attr('disabled', true);
                            alert('Request approved successfully!');
                        } else {
                            alert('Error approving the request. Please try again.');
                        }
                    }
                });
            }
        });
    });
  </script>

</body>
</html>
