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
    $tool_name = htmlspecialchars($_POST['tool_name']);
    $description = htmlspecialchars($_POST['description']);
    $quantity = intval($_POST['quantity']);
    $now = date("Y-m-d H:i:s"); // Current timestamp

    // Insert new record into the database
    $stmt = $conn->prepare("INSERT INTO tools (tool_name, description, quantity, last_update) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $tool_name, $description, $quantity, $now);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Tool added successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while adding the tool';
    }

    // Close statement
    $stmt->close();

    // Redirect to tools.php to show success/error message
    header("Location: managetools.php");
    exit();
}
?>

<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
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
            // Display messages
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
            <!-- Tool Form -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="h3 mb-4 text-gray-800">
                            <i class="fas fa-plus"></i> Add Tool
                            <hr>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <form action="managetools.php" method="post">
                            <div class="form-group">
                                <label for="tool_name">Tool Name:</label>
                                <input type="text" class="form-control" id="tool_name" name="tool_name" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label><br>
                                <textarea id="description" name="description" class="form-control" style="width: 100%; height: 200px;" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Add Tool</button>
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
