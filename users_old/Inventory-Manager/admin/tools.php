<?php
include 'includes/session.php';
include 'includes/conn.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

?>

<?php include 'includes/header.php'; ?>

<bo class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h4>Inventory Manager</h4>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

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

                <!-- tool List -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="h3 mb-4 text-gray-800">
                                <i class="fas fa-boxes"></i> Manage Tools
                                <hr>
                            </h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tools List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tool Name</th>
                                                    <th>Description</th>
                                                
                                                    <th>Quantity</th>
                                                    <th>Last Updated</th>
                                                    <
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Fetch tool data
                                                $toolQuery = "SELECT id, tool_name, description, quantity, last_update FROM tools";
                                                $result = $conn->query($toolQuery);

                                                if ($result->num_rows > 0) {
                                                    $counter = 1;
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>
                                                            <td>{$counter}</td>
                                                            <td>{$row['tool_name']}</td>
                                                            <td>{$row['description']}</td>
                                                        
                                                            <td>{$row['quantity']}</td>
                                                            <td>{$row['last_update']}</td>
                                                            <td>
                                                                <button class='btn btn-success btn-sm edit'
                                                                    data-id='{$row['id']}'
                                                                    data-name='{$row['tool_name']}'
                                                                    data-description='{$row['description']}'
                                                                    
                                                                    data-quantity='{$row['quantity']}'
                                                                    <i class='fas fa-edit'></i> Edit
                                                                </button>
                                                                <form action='delete_tool.php' method='post' style='display:inline-block;'>
                                                                    <input type='hidden' name='id' value='{$row['id']}'>
                                                                    <button type='submit' class='btn btn-danger btn-sm delete' onclick='return confirm(\"Are you sure you want to delete this tool?\");'>
                                                                        <i class='fas fa-trash'></i> Delete
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>";
                                                        $counter++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='8'>No tools found.</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Edit tool Modal -->
            <div class="modal fade" id="edittoolModal" tabindex="-1" role="dialog" aria-labelledby="edittoolModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="edittoolModalLabel">Edit tool</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="update_tool.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="edit-id" name="id">

                                <div class="form-group">
                                    <label for="edit-tool_name">tool Name:</label>
                                    <input type="text" class="form-control" id="edit-tool_name" name="tool_name" required>
                                </div>

                                <div class="form-group">
                                    <label for="edit-description">Description:</label><br>
                                    <textarea id="edit-description" name="description" class="form-control" style="width: 100%; height: 200px;" required></textarea>
                                </div>


                                <div class="form-group">
                                    <label for="edit-quantity">Quantity:</label>
                                    <input type="number" class="form-control" id="edit-quantity" name="quantity" required>
                                </div>

                                

                                <hr>
                                <button type="submit" class="btn btn-primary">Update tool</button>
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        
        

        </div>
        
    
                                          
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Edit button click handler
            $('.edit').on('click', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const description = $(this).data('description');
                
                const quantity = $(this).data('quantity');

                $('#edit-id').val(id);
                $('#edit-tool_name').val(name);
                $('#edit-description').val(description);
            
                $('#edit-quantity').val(quantity);

                $('#edittoolModal').modal('show');
            });
        });
    </script>

    <?php include 'includes/scripts.php'; ?>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
