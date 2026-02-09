<?php
// Include necessary PHP files
include 'includes/session.php'; // Handles session management
include 'includes/slugify.php'; // Functions for slugifying
include 'includes/header.php'; // HTML header
include 'includes/configcontact.php'; // Database connection

// Initialize the $No variable
$No = null;

// Check if 'No' is passed in the URL
if (isset($_GET['No'])) {
    $No = $_GET['No'];

    // Fetch the duty details for the given 'No'
    $sql = "SELECT No FROM cleaner_tasks WHERE No = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $No);
    $stmt->execute();
    $result = $stmt->get_result();
    $duty = $result->fetch_assoc();

    if ($duty) {
        $No = $duty['No']; // Set $No from the database
    } else {
        $_SESSION['error'] = "Duty not found for the provided 'No'.";
    }

    $stmt->close(); // Close the statement
} else {
    $_SESSION['error'] = "'No' parameter is missing in the URL.";
}

if (isset($_POST['send'])) {
    $idnumber = $_POST['idnumber'];
    $tool_id = $_POST['tool_id'];
    $quantity = $_POST['quantity'];
    $request_date = $_POST['request_date'];
    $description = $_POST['description'];

    // Fetch user details
    $userid = $_SESSION['admin']; // Assuming session contains the admin's identifier
    $sql = "SELECT fname, lname FROM bnote_cleaner WHERE fname = :fname";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $userid, PDO::PARAM_STR);
    $query->execute();
    $customer = $query->fetch(PDO::FETCH_ASSOC);

    if ($customer) {
        $fname = $customer['fname'];
        $lname = $customer['lname'];
        $fullname = $fname . ' ' . $lname;

        // Fetch tool name for the given tool ID
        $toolQuery = "SELECT tool_name FROM tools WHERE id = ?";
        $toolStmt = $conn->prepare($toolQuery);
        $toolStmt->bind_param("i", $tool_id);
        $toolStmt->execute();
        $toolResult = $toolStmt->get_result();
        $tool = $toolResult->fetch_assoc();

        if ($tool) {
            $tool_name = $tool['tool_name'];

            // Insert request into the database
            $stmt = $conn->prepare("INSERT INTO requests (fullname, tool_name, no, idnumber, quantity, request_date, tool_id, description)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiissis", $fullname, $tool_name, $No, $idnumber, $quantity, $request_date, $tool_id, $description);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Request successfully submitted.";

                // Update the tool_status in dutiestable after the request has been inserted
                $updateStmt = $conn->prepare("UPDATE cleaner_tasks SET tool_status = ? WHERE No = ?");
                $toolStatus = 1; // Update to the appropriate status, assuming 1 means 'requested'
                $updateStmt->bind_param("ii", $toolStatus, $No);
                if ($updateStmt->execute()) {
                    $_SESSION['success'] .= " Tool status updated successfully.";
                } else {
                    $_SESSION['error'] = "Failed to update tool status.";
                }
                $updateStmt->close(); // Close the update statement
            } else {
                $_SESSION['error'] = "Database error: " . $stmt->error;
            }

            $stmt->close(); // Close the statement
        } else {
            $_SESSION['error'] = "Tool not found for the selected tool ID.";
        }

        $toolStmt->close(); // Close the tool statement
    } else {
        $_SESSION['error'] = "User data not found for the session.";
    }

    header('location: cleaner_tasks.php');
    exit();
}
?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>REQUEST Panel</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>REQUEST Panel</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">REQUEST Panel</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <h3>REQUEST TOOLS </h3>
                <div class="box">
                    <div class="box-body">
                        <?php
                        // Display success or error messages
                        if (isset($_SESSION['error'])) {
                            echo "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-warning'></i> Error!</h4>
                                " . $_SESSION['error'] . "
                              </div>";
                            unset($_SESSION['error']);
                        }
                        if (isset($_SESSION['success'])) {
                            echo "<div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-check'></i> Success!</h4>
                                " . $_SESSION['success'] . "
                              </div>";
                            unset($_SESSION['success']);
                        }

                        $userid = $_SESSION['admin']; // Get the admin ID from the session
                        
                        // Prepare the SQL query with a placeholder for idnumber
                        $sql = "SELECT idnumber, fname, lname, email, phone FROM bnote_cleaner WHERE fname = :fname";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':fname', $userid, PDO::PARAM_STR);
                        $query->execute();
                        $customer = $query->fetch(PDO::FETCH_ASSOC);


                        if ($customer) {
                            // Populate the form fields
                            $idnumber = htmlentities($customer['idnumber']);
                            $fname = htmlentities($customer['fname']);
                            $lname = htmlentities($customer['lname']);
                            $email = htmlentities($customer['email']);
                            $phone = htmlentities($customer['phone']);
                        } else {
                            // Handle the case where no record is found
                            echo "<div class='alert alert-danger'>No customer data found for the given user.</div>";
                            $idnumber = $fname = $lname = $email = $phone = '';
                        }


                        ?>
                        <form name="request_form" method="post">
                            <div class="control-group form-group">
                                <label>ID Number:</label>
                                <input type="text" class="form-control" id="idnumber" name="idnumber"
                                    value="<?php echo $idnumber; ?>" readonly>
                            </div>
                            <div class="control-group form-group">
                                <label>ID:</label>
                                <input type="text" class="form-control" id="no" name="no"
                                    value="<?php echo htmlspecialchars($No); ?>" readonly>
                            </div>

                            <div class="control-group form-group">
                                <label>Name:</label>
                                <input type="text" class="form-control" id="fname" name="fname"
                                    value="<?php echo $fname . ' ' . $lname; ?>" readonly>
                            </div>


                            <div class="control-group form-group">
                                <label>Email Address:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo $email; ?>" readonly>
                            </div>
                            <div class="control-group form-group">
                                <label>Phone Number:</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    value="<?php echo $phone; ?>" readonly>
                            </div>

                            <div class="control-group form-group">
                                <label>Select Tool:</label>
                                <?php
                                $qry = "SELECT id, tool_name, quantity FROM tools"; // Fetch id, tool_name and quantity
                                $result = $conn->query($qry);
                                $num = $result->num_rows;
                                if ($num > 0) {
                                    echo '<select required name="tool_id" class="form-control mb-1" id="tool_select">'; // Use tool_id as the name
                                    echo '<option value="">Select Tool</option>';
                                    while ($rows = $result->fetch_assoc()) {
                                        echo '<option value="' . $rows['id'] . '" data-quantity="' . $rows['quantity'] . '">' . $rows['tool_name'] . '</option>'; // Pass id as value and quantity as data attribute
                                    }
                                    echo '</select>';
                                } else {
                                    echo '<p>No tools available.</p>';
                                }
                                ?>
                            </div>

                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" 
                                   min="1" max="1" required>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Request Date:</label>
                            <input type="date" class="form-control" id="request_date" name="request_date"
                                min="<?= date('Y-m-d'); ?>" required>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Description:</label>
                            <textarea name="description" class="form-control" required rows="10" cols="5"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <button type="submit" name="send" class="btn btn-primary">Submit</button>
                    </form>

                </div>
        </div>
        </section>
    </div>
    <?php include 'includes/footer.php'; ?>
    </div>

    <?php include 'includes/scripts.php'; ?>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>

</html>

<?php $conn->close(); ?>    <script>
        $(document).ready(function () {
            $('#example').DataTable();
            
            // Update quantity max value when tool is selected
            $('#tool_select').change(function() {
                var selectedOption = $(this).find('option:selected');
                var maxQuantity = selectedOption.data('quantity') || 1;
                $('#quantity').attr('max', maxQuantity);
                $('#quantity').val(''); // Clear current value
            });
        });
    </script>
