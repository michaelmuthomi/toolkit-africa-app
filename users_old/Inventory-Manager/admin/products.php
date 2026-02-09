<?php
// Include necessary files
include 'includes/session.php'; // Contains session handling functions
include 'includes/conn.php'; // Contains database connection
// Redirect if user is not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get form inputs
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $price = floatval($_POST['price']);
    $stock = intval($_POST['stock']);
    $now = date("Y-m-d H:i:s"); // Current timestamp

    // File upload handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check === false) {
        $_SESSION['error'] = 'File is not an image.';
        header("Location: products.php");
        exit();
    }

    // Move uploaded image to target directory
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $_SESSION['error'] = 'Error uploading image.';
        header("Location: products.php");
        exit();
    }

    // Check if product exists by name
$stmt = $conn->prepare("SELECT * FROM products WHERE product_name = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

if ($result->num_rows > 0) {
    // Product already exists, update stock and last_update
    $current_product = $result->fetch_assoc();
    $current_stock = $current_product['stock'];
    
    // Calculate new stock
    $new_stock = $current_stock + $stock;

    $stmt = $conn->prepare("UPDATE products SET stock = ?, last_update = ? WHERE product_name = ?");
    $stmt->bind_param("iss", $new_stock, $now, $name);
} else {
    // Product does not exist, insert new record
    $stmt = $conn->prepare("INSERT INTO products (product_name, description, price, stock, last_update, image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiss", $name, $description, $price, $stock, $now, $target_file);
}


    // Execute prepared statement
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Product ' . ($result->num_rows > 0 ? 'updated' : 'added') . ' successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while ' . ($result->num_rows > 0 ? 'updating' : 'adding') . ' the product';
    }

    // Close statement
    $stmt->close();

    // Redirect to products.php to show success/error message
    header("Location: products.php");
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

            <!-- Product Form -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="h3 mb-4 text-gray-800">
                            <i class="fas fa-plus"></i> Add Product
                            <hr>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <form action="products.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Product Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label><br>
                                <textarea id="description" name="description" class="form-control" style="width: 100%; height: 200px;" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                            </div>

                            <div class="form-group">
                                <label for="stock">Stock:</label>
                                <input type="number" class="form-control" id="stock" name="stock" required>
                            </div>

                            <div class="form-group">
                                <label for="image">Product Image:</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            
                            <hr>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
            </section>
        </div>       
            
          
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
