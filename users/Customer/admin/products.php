<?php
//error_reporting(0);
// Includes
include 'includes/config1.php'; // Adjust as per your setup
include 'includes/session.php'; // Adjust as per your setup
include 'includes/slugify.php'; // Adjust as per your setup

// Example product listing query (assuming you have a database connection)
$query = "SELECT product_id, product_name, price, image, stock FROM products";
$result = $dbh->query($query);
$products = $result->fetchAll(PDO::FETCH_ASSOC);

// Reverse the products array to start with the last one first
$products = array_reverse($products);

// Initialize cart session if not already initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Function to calculate total amount in the cart
function calculateTotalAmount() {
    $total = 0;
    foreach ($_SESSION['cart'] as $product) {
        $total += $product['price'] * $product['quantity'];
    }
    return $total;
}

// Handle adding product to cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Retrieve product details including stock
    $query = "SELECT product_id, product_name, price, image, stock FROM products WHERE product_id = :product_id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $available_stock = $product['stock'];

        // Check if requested quantity exceeds available stock
        if ($quantity > $available_stock) {
            $_SESSION['error'] = "Sorry, there are only $available_stock units available for {$product['product_name']}.";
        } else {
            // Check if product already exists in cart, increment quantity if so
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity'] += $quantity;
            } else {
                // Add new product to cart
                $product_name = $product['product_name'];
                $price = $product['price'];
                $image = $product['image'];
                $_SESSION['cart'][$product_id] = [
                    'product_name' => $product_name,
                    'price' => $price,
                    'quantity' => $quantity,
                    'image' => $image
                ];
            }
        }
    } else {
        $_SESSION['error'] = "Product not found.";
    }

    // Redirect back to the referring page after adding to cart
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Handle clearing the cart
if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = []; // Clear the cart array
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/header.php'; ?>
    <style>
        /* CSS for floating cart icon */
        .floating-cart {
            position: fixed;
            bottom: 60px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            width: 50px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 1000;
        }
        .floating-cart:hover {
            background-color: #0056b3;
        }
        .cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: red;
            color: white;
            padding: 5px 10px;
            border-radius: 100%;
            font-size: 12px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .box {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .box-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <div class="content-wrapper">
        <section class="content-header">
            <!--<h4>Customer Panel</h4>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>-->
            </ol>
        </section>

        <section class="content">
            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Error!</h4>
                    <?php echo $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <!-- Product List Example -->
            <!-- Search Form -->
            <div class="row">
                <div class="">
                    <div class="">
                        <div class="">
                            <div class="row">
                                <div class="">
                                    <div class="input-group"></div>
                                        <input type="text" class="form-control input-lg" id="searchInput" 
                                               placeholder="Search courses by name..." 
                                               value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                                    </div>
                                </div>
                                <div class=""></div>
                                    <button type="button" id="clearSearch" class="btn btn-default btn-lg btn-block">
                                        <i class="fa fa-times"></i> Clear
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Search Results Info -->
                    <div id="searchInfo" class="row" style="display: none;">
                        <div class="">
                            <div class="alert alert-info">
                                <strong>Search Results:</strong> <span id="searchTerm"></span> 
                                (<span id="resultCount">0</span> course(s) found)
                            </div>
                        </div>
                    </div>
        
                    <!-- Product List -->
                    <div class="row" id="productContainer">
                        <?php if (empty($products)): ?>
                            <div class="">
                                <div class="alert alert-warning text-center">
                                    <h4>No courses found</h4>
                                    <p>No courses are currently available.</p>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($products as $product): ?>
                                <div class="col-md-4 col-sm-6 product-item" data-name="<?php echo strtolower($product['product_name']); ?>">
                                    <div class="box box-primary product-card"></div>
                                        <form method="post">
                                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                            <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>">

                                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                                            <input type="hidden" name="image" value="<?php echo $product['image']; ?>">
                                            
                                            <div class="box-body product-card-body">
                                                <div class="product-image-container">
                                                    <?php
                                                        $imgSrc = $product['image'];
                                                        if (!preg_match("~^(?:f|ht)tps?://~i", $imgSrc)) {
                                                            $imgSrc = "../../Inventory-Manager/admin/" . $imgSrc;
                                                        }
                                                        ?>
                                                    <img class="product-image" 
                                                         src="<?php echo $imgSrc; ?>" 
                                                         alt="Product Image">
                                                </div>
                                                <div class="product-info">
                                                    <h4 class="product-title"><?php echo $product['product_name']; ?></h4>
                                                    <p class="product-price">Ksh. <?php echo number_format($product['price'], 2); ?></p>
                                                    <div class="stock-info">
                                                        <span class="stock-label">In Stock:</span>
                                                        <span class="stock-count <?php echo $product['stock'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                                                            <?php echo number_format($product['stock']); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="product-actions">
                                                    <div class="form-group quantity-group">
                                                        <label for="quantity_<?php echo $product['product_id']; ?>">Quantity:</label>
                                                        <input type="number" class="form-control quantity-input" 
                                                               id="quantity_<?php echo $product['product_id']; ?>" 
                                                               name="quantity" min="1" max="<?php echo $product['stock']; ?>" 
                                                               oninput="this.value = Math.max(1, Math.min(<?php echo $product['stock']; ?>, parseInt(this.value) || 1))">
                                                    </div>
                                                    <button type="submit" name="add_to_cart" 
                                                            class="btn btn-primary btn-block add-to-cart-btn"
                                                            <?php echo $product['stock'] <= 0 ? 'disabled' : ''; ?>>
                                                        <i class="fa fa-shopping-cart"></i> 
                                                        <?php echo $product['stock'] > 0 ? 'Add to Cart' : 'Out of Stock'; ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

                        
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const clearButton = document.getElementById('clearSearch');
                const productItems = document.querySelectorAll('.product-item');
                const searchInfo = document.getElementById('searchInfo');
                const searchTerm = document.getElementById('searchTerm');
                const resultCount = document.getElementById('resultCount');

                function filterProducts() {
                    const query = searchInput.value.toLowerCase().trim();
                    let visibleCount = 0;

                    productItems.forEach(function(item) {
                        const productName = item.getAttribute('data-name');
                        
                        if (productName.includes(query)) {
                            item.style.display = 'block';
                            visibleCount++;
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    // Update search info
                    if (query) {
                        searchTerm.textContent = '"' + searchInput.value + '"';
                        resultCount.textContent = visibleCount;
                        searchInfo.style.display = 'block';
                    } else {
                        searchInfo.style.display = 'none';
                    }
                }

                // Filter as user types
                searchInput.addEventListener('input', filterProducts);

                // Clear search
                clearButton.addEventListener('click', function() {
                    searchInput.value = '';
                    filterProducts();
                });

                // Initial filter if there's a search term from URL
                if (searchInput.value) {
                    filterProducts();
                }
            });
            </script>
            <!-- End Product List Example -->

        </section>
    </div>

    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<!-- Floating Cart Icon and Cart Modal -->
<div class="floating-cart" data-toggle="modal" data-target="#cartModal">
    <span class="cart-count"><?php echo count($_SESSION['cart']); ?></span>
    <i class="fa fa-shopping-cart fa-lg"></i>
</div>

<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="cartModalLabel">Shopping Cart</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (!empty($_SESSION['cart'])): ?>
                    <ul class="list-group">
                        <?php foreach ($_SESSION['cart'] as $product_id => $product): ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="<?php echo "../../Inventory-Manager/admin/" . $product['image']; ?>" class="img-thumbnail" alt="Product Image">
                                    </div>
                                    <div class="col-md-6">
                                        <h4><?php echo $product['product_name']; ?></h4>
                                        <p>Price: Ksh. <?php echo number_format($product['price'], 2); ?></p>
                                        <p>Quantity: <?php echo $product['quantity']; ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Total: Ksh. <?php echo number_format($product['price'] * $product['quantity'], 2); ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="text-center">
                        <form method="post">
                            <input type="hidden" name="clear_cart" value="1">
                            <button type="submit" class="btn btn-danger">Clear Cart</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal">Proceed to Payment</button>
                        </form>
                    </div>
                <?php else: ?>
                    <p>Your cart is empty.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="process_payment.php">
                <div class="modal-header">
                <h4 class="modal-title" id="paymentModalLabel">Make Payment</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php
                        // Assuming $_SESSION['admin'] contains the username or identifier
                        $username = $_SESSION['user_id'];

                        // Query to fetch user information
                        $query = "SELECT idnumber, fname, lname, email, phone, address FROM customer WHERE idnumber = :idnumber";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam(':idnumber', $username); 
                        $stmt->execute();
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);

                        
                    // Display user information
                    if ($user) {
                        echo '<div class="form-group">';
                        echo '<label for="idnumber">ID Number:</label>';
                        echo '<input type="text" class="form-control" id="idnumber" name="idnumber" value="' . htmlspecialchars($user['idnumber']) . '" disabled>';
                        echo '</div>';

                        echo '<div class="form-group">';
                        echo '<label for="fname">First Name:</label>';
                        echo '<input type="text" class="form-control" id="fname" name="fname" value="' . htmlspecialchars($user['fname']) . '" disabled>';
                        echo '</div>';

                        echo '<div class="form-group">';
                        echo '<label for="lname">Last Name:</label>';
                        echo '<input type="text" class="form-control" id="lname" name="lname" value="' . htmlspecialchars($user['lname']) . '" disabled>';
                        echo '</div>';

                        echo '<div class="form-group">';
                        echo '<label for="email">Email:</label>';
                        echo '<input type="email" class="form-control" id="email" name="email" value="' . htmlspecialchars($user['email']) . '" disabled>';
                        echo '</div>';

                        echo '<div class="form-group">';
                        echo '<label for="phone">Phone:</label>';
                        echo '<input type="tel" class="form-control" id="phone" name="phone" value="' . htmlspecialchars($user['phone']) . '" disabled>';
                        echo '</div>';

                        echo '<div class="form-group">';
                        echo '<label for="address">Address:</label>';
                        echo '<input type="text" class="form-control" id="address" name="address" value="' . htmlspecialchars($user['address']) . '" disabled>';
                        echo '</div>';
                    } else {
                        echo "<p>User information not found.</p>";
                    }
                    ?>
                    <p>Total Amount: Ksh. <?php echo number_format(calculateTotalAmount(), 2); ?></p>
                    <!-- Add a label telling the customer to pay to the bussiness no 23456 -->
                    <p>Pay to M-PESA Till No: 23456</p>
                    <!-- M-Pesa Code Input -->
                    <div class="form-group">
                        <label for="mpesa_code">Transcation Code:</label>
                        <input type="text" class="form-control" id="mpesa_code" name="mpesa_code" maxlength="10" minlength="10" pattern="^[A-Za-z]{2}[A-Za-z0-9]{8}$" title="First 2 characters must be letters, followed by 8 alphanumeric characters" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Pay</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
