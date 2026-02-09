<?php
// Start session and include necessary files
include 'includes/session.php';
include 'includes/slugify.php';
include 'includes/header.php';
include 'includes/conn.php';

// Get the currently logged-in cleaner's name or ID from the session
$cleaner = $_SESSION['admin'];
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <div class="content-wrapper">
            <section class="content-header">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Material Requests</li>
                </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Material Requests</h2>

                        <!-- Display success/error messages -->
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo "<div class='alert alert-danger alert-dismissible'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <h4><i class='icon fa fa-warning'></i> Error!</h4>{$_SESSION['error']}
                                  </div>";
                            unset($_SESSION['error']);
                        }
                        if (isset($_SESSION['success'])) {
                            echo "<div class='alert alert-success alert-dismissible'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <h4><i class='icon fa fa-check'></i> Success!</h4>{$_SESSION['success']}
                                  </div>";
                            unset($_SESSION['success']);
                        }
                        ?>

                <!-- Pending Material Requests -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pending Material Requests</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="pendingTable">
                                <thead>
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Materials Required</th>
                                        <th>Requested By</th>
                                        <th>Date Requested</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Fetch pending material requests assigned to this recycler
                                    $query = "SELECT * FROM product_tasks 
                                              WHERE cleaner = ? AND status = 0 
                                              ORDER BY date_allocated DESC";
                                    $stmt = $conn->prepare($query);
                                    $stmt->bind_param('s', $cleaner);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    while ($row = $result->fetch_assoc()): 
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['idnumber']); ?></td>
                                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                                        <td><?php echo htmlspecialchars($row['materials_needed']); ?></td>
                                        <td><?php echo htmlspecialchars($row['supervisor']); ?></td>
                                        <td><?php echo htmlspecialchars($row['date_allocated']); ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success approve-btn" 
                                                        data-toggle="modal" 
                                                        data-target="#approveModal" 
                                                        data-id="<?php echo $row['idnumber']; ?>"
                                                        data-title="<?php echo htmlspecialchars($row['title'] ?? 'Material Request'); ?>">
                                                    Approve
                                                </button>
                                                <button type="button" class="btn btn-danger reject-btn"
                                                        data-toggle="modal"
                                                        data-target="#rejectModal"
                                                        data-id="<?php echo $row['idnumber']; ?>"
                                                        data-title="<?php echo htmlspecialchars($row['title'] ?? 'Material Request'); ?>">
                                                    Reject
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- In-Progress Material Requests -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">In-Progress Material Requests</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="progressTable">
                            <thead>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Materials Required</th>
                                    <th>Requested By</th>
                                    <th>Date Requested</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch in-progress material requests assigned to this recycler
                                $query = "SELECT * FROM product_tasks 
                                          WHERE cleaner = ? AND status = 1 
                                          ORDER BY date_allocated DESC";
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param('s', $cleaner);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                while ($row = $result->fetch_assoc()): 
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['idnumber']); ?></td>
                                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                                    <td><?php echo htmlspecialchars($row['materials_needed']); ?></td>
                                    <td><?php echo htmlspecialchars($row['supervisor']); ?></td>
                                    <td><?php echo htmlspecialchars($row['date_allocated']); ?></td>
                                    <td>
                                        <form action="complete_production.php" method="POST">
                                            <input type="hidden" name="task_id" value="<?php echo $row['idnumber']; ?>">
                                            <button type="submit" class="btn btn-success">
                                                Mark as Complete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                <!-- Approve Modal -->
                <div class="modal fade" id="approveModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Approve Material Request</h4>
                            </div>
                            <form action="approve_material_request.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="task_id" id="approve_task_id">
                                    <p>Are you sure you want to approve this material request: <span id="approve_title"></span>?</p>
                                    <p>By approving, you confirm that you have all the necessary materials to fulfill this request.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Reject Modal -->
                <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Reject Material Request</h4>
                            </div>
                            <form action="reject_material_request.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="task_id" id="reject_task_id">
                                    <p>Are you sure you want to reject this material request: <span id="reject_title"></span>?</p>
                                    <div class="form-group">
                                        <label for="reject_reason">Reason for rejection:</label>
                                        <textarea class="form-control" id="reject_reason" name="reason" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
    </div>

    <?php include 'includes/scripts.php'; ?>
    <script>
        $(function() {
            $('#pendingTable').DataTable();
            $('#progressTable').DataTable();
            
            // Pass data to approve modal
            $('.approve-btn').on('click', function() {
                var id = $(this).data('id');
                var title = $(this).data('title');
                $('#approve_task_id').val(id);
                $('#approve_title').text(title);
            });
            
            // Pass data to reject modal
            $('.reject-btn').on('click', function() {
                var id = $(this).data('id');
                var title = $(this).data('title');
                $('#reject_task_id').val(id);
                $('#reject_title').text(title);
            });
        });
    </script>
</body>
</html>