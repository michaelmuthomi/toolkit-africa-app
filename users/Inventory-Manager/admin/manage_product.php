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

                <!-- Product List -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="h3 mb-4 text-gray-800">
                                <i class="fas fa-boxes"></i> Manage Products
                                <hr>
                            </h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Product Name</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                    <th>Stock</th>
                                                    <th>Last Updated</th>
                                                    <th>Image</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Fetch product data
                                                $productQuery = "SELECT product_id, product_name, description, price, stock, last_update, image FROM products";
                                                $result = $conn->query($productQuery);

                                                if ($result->num_rows > 0) {
                                                    $counter = 1;
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>
                                                            <td>{$counter}</td>
                                                            <td>{$row['product_name']}</td>
                                                            <td>{$row['description']}</td>
                                                            <td>{$row['price']}</td>
                                                            <td>{$row['stock']}</td>
                                                            <td>{$row['last_update']}</td>
                                                            <td><img src='{$row['image']}' alt='Product Image' style='max-width: 100px; max-height: 100px;'></td>
                                                            <td>
                                                                <button class='btn btn-success btn-sm edit'
                                                                    data-id='{$row['product_id']}'
                                                                    data-name='{$row['product_name']}'
                                                                    data-description='{$row['description']}'
                                                                    data-price='{$row['price']}'
                                                                    data-stock='{$row['stock']}'
                                                                    data-image='{$row['image']}'>
                                                                    <i class='fas fa-edit'></i> Edit
                                                                </button>
                                                                <form action='delete_product.php' method='post' style='display:inline-block;'>
                                                                    <input type='hidden' name='id' value='{$row['product_id']}'>
                                                                    <button type='submit' class='btn btn-danger btn-sm delete' onclick='return confirm(\"Are you sure you want to delete this product?\");'>
                                                                        <i class='fas fa-trash'></i> Delete
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>";
                                                        $counter++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='8'>No products found.</td></tr>";
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

            <!-- Edit Product Modal -->
            <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="update_product.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="edit-id" name="id">

                                <div class="form-group">
                                    <label for="edit-name">Product Name:</label>
                                    <input type="text" class="form-control" id="edit-name" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="edit-description">Description:</label><br>
                                    <textarea id="edit-description" name="description" class="form-control" style="width: 100%; height: 200px;" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="edit-price">Price:</label>
                                    <input type="number" step="0.01" class="form-control" id="edit-price" name="price" required>
                                </div>

                                <div class="form-group">
                                    <label for="edit-stock">Stock:</label>
                                    <input type="number" class="form-control" id="edit-stock" name="stock" required>
                                </div>

                                <div class="form-group">
                                    <label for="edit-image">Product Image:</label><br>
                                    <input type="file" class="form-control-file" id="edit-image" name="image">
                                    <img id="edit-image-preview" src="" alt="Image Preview" style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                </div>

                                <hr>
                                <button type="submit" class="btn btn-primary">Update Product</button>
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
                const price = $(this).data('price');
                const stock = $(this).data('stock');
                const image = $(this).data('image');

                $('#edit-id').val(id);
                $('#edit-name').val(name);
                $('#edit-description').val(description);
                $('#edit-price').val(price);
                $('#edit-stock').val(stock);
                $('#edit-image-preview').attr('src', image);

                $('#editProductModal').modal('show');
            });
        });
    </script>

    <?php include 'includes/scripts.php'; ?>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
