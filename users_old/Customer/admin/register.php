<?php
//error_reporting(0);
include 'includes/session.php';
include 'includes/configcontact.php'; // Assuming this file contains your database connection

// Initialize variables
$error = "";
$msg = "";

// Fetch user ID from session (assuming it's set correctly)
$userid = $_SESSION['admin'];

// Fetch customer data from the database
$sql = "SELECT idnumber, fname, lname, email, phone, address FROM customer WHERE fname =:fname";
$query = $dbh->prepare($sql);
$query->bindParam(':fname', $userid, PDO::PARAM_STR);
$query->execute();
$customer = $query->fetch(PDO::FETCH_ASSOC);

if (!$customer) {
    $_SESSION['error'] = "Error fetching customer details";
    header('Location: services.php');
    exit; 
}

// Function to sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process form submission
if (isset($_POST['send'])) {
    $service = test_input($_POST['service']); // Extract service name
    $charges = test_input($_POST['charges']); // Extract calculated charges
    $transactioncode = test_input($_POST['transactioncode']);

    // Validate M-Pesa code
    $naming = "/^(?=.*[A-Za-z])(?=.*[0-9])[A-Za-z0-9]{10}$/";
    if (!preg_match($naming, $transactioncode)) {
        $error = "Enter a valid M-Pesa ID.";
    } else {
        // Insert booking into database
        $sql = "INSERT INTO booking (idnumber, fname, lname, email, phone, address, service, charges, transactioncode) 
                VALUES (:idnumber, :fname, :lname, :email, :phone, :address, :service, :charges, :transactioncode)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':idnumber', $customer['idnumber'], PDO::PARAM_STR);
        $query->bindParam(':fname', $customer['fname'], PDO::PARAM_STR);
        $query->bindParam(':lname', $customer['lname'], PDO::PARAM_STR);
        $query->bindParam(':email', $customer['email'], PDO::PARAM_STR);
        $query->bindParam(':phone', $customer['phone'], PDO::PARAM_STR);
        $query->bindParam(':address', $customer['address'], PDO::PARAM_STR);
        $query->bindParam(':service', $service, PDO::PARAM_STR); // Service name
        $query->bindParam(':charges', $charges, PDO::PARAM_STR); // Calculated charges
        $query->bindParam(':transactioncode', $transactioncode, PDO::PARAM_STR);

        if ($query->execute()) {
            $msg = "Registration was successful. Please wait for the approval process.";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
}


?>

<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <div class="content-wrapper">
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

                <div class="container">
                    <h1 class="mt-4 mb-3"></h1>
                    <div class="row">
                        <div class="col-lg-8 mb-3"><br>
                            <center><h5><b>REGISTER FOR A SERVICE!!!!!</b></h5></center>
                            <form name="sentaddress" method="post">
                                <div class="control-group form-group">
                                    <label>ID Number:</label>
                                    <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?php echo htmlentities($customer['idnumber']); ?>" readonly>
                                </div>
                                <div class="control-group form-group">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo htmlentities($customer['fname']); ?>" readonly>
                                </div>
                                <div class="control-group form-group">
                                    <label>Last Name:</label>
                                    <input type="text" class="form-control" id="lname" name="lname" value="<?php echo htmlentities($customer['lname']); ?>" readonly>
                                </div>
                                <div class="control-group form-group">
                                    <label>Email Address:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlentities($customer['email']); ?>" readonly>
                                </div>
                                <div class="control-group form-group">
                                    <label>Phone Number:</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlentities($customer['phone']); ?>" readonly>
                                </div>
                                <div class="control-group form-group">
                                    <label>Address:</label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlentities($customer['address']); ?>" readonly>
                                </div>
                                <div class="form-group row mb-3">
    <div class="col-xl-6">
        <label>Select Service:</label>
        <?php
        $qry = "SELECT * FROM services WHERE status='1'";
        $result = $conn->query($qry);
        $num = $result->num_rows;
        if ($num > 0) {
            echo '<select required name="serviceDropdown" id="serviceDropdown" class="form-control mb-1" onchange="updatePrice()">';
            echo '<option value="">--Select Service--</option>';
            while ($rows = $result->fetch_assoc()) {
                echo '<option value="' . $rows['price'] . '" data-servicename="' . $rows['service_name'] . '">' . $rows['service_name'] . ' - KSh ' . $rows['price'] . ' </option>';
            }
            echo '</select>';
        }
        ?>
        <!-- Hidden input for service name -->
        <input type="hidden" id="serviceName" name="service">
    </div>
    <div class="col-xl-6">
        <input type="hidden" class="form-control" id="quantity" name="quantity" min="1" value="1"  oninput="updatePrice()" placeholder="Enter quantity" required value="1">
    </div>
</div>
<div class="control-group form-group">
    <label>Total Charges:</label>
    <input type="text" class="form-control" id="totalPrice" readonly>
    <input type="hidden" id="charges" name="charges"> <!-- Hidden field for calculated charges -->
</div>
<p>Pay to M-PESA Till No: 23456</p>


                                    <!--<div class="col-xl-6">
                                        <label>Select Service:</label>
                                        <?php
                                        $qry = "SELECT * FROM services WHERE status='1'";
                                        $result = $conn->query($qry);
                                        $num = $result->num_rows;
                                        if ($num > 0) {
                                            echo '<select required name="service" onchange="classArmDropdown(this.value)" class="form-control mb-1">';
                                            echo '<option value="">--Select Service--</option>';
                                            while ($rows = $result->fetch_assoc()) {
                                                echo '<option value="' . $rows['service_name'] . '">' . $rows['service_name'] . '</option>';
                                            }
                                            echo '</select>';
                                        }
                                        ?>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-control-label">Charges<span class="text-danger ml-2">*      Paybill: 271976</span></label>
                                        <div id="txtHint"></div>
                                    </div>
                                </div>-->
                                <div class="control-group form-group">
                                    <label>M-Pesa Code:</label>
                                    <input type="text" class="form-control" minlength="10" maxlength="10" id="transactioncode" name="transactioncode" required>
                                </div>
                                <button type="submit" name="send" class="btn btn-primary">Register</button>
                            </form>
                            <?php if ($error) { ?>
                                <div class="alert alert-danger mt-3"><strong>Error:</strong> <?php echo htmlentities($error); ?></div>
                            <?php } else if ($msg) { ?>
                                <div class="alert alert-success mt-3"><strong>Success:</strong> <?php echo htmlentities($msg); ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
    </div>

    <?php include 'includes/scripts.php'; ?>
    <script>
        $(function(){
            // Your JavaScript code here
            
        });

        function classArmDropdown(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajaxClassArms2.php?cid=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
    <script>
    function updatePrice() {
        const serviceDropdown = document.getElementById('serviceDropdown');
        const quantityInput = document.getElementById('quantity');
        const totalPriceField = document.getElementById('totalPrice');

        const selectedService = serviceDropdown.options[serviceDropdown.selectedIndex];
        const pricePerNote = parseFloat(selectedService.value) || 0;
        const quantity = parseInt(quantityInput.value) || 0;

        const totalPrice = pricePerNote * quantity;
        totalPriceField.value = totalPrice ? `KSh ${totalPrice.toFixed(2)}` : '';
    }

    function updatePrice() {
    const serviceDropdown = document.getElementById('serviceDropdown');
    const quantityInput = document.getElementById('quantity');
    const totalPriceField = document.getElementById('totalPrice');
    const hiddenCharges = document.getElementById('charges');
    const serviceNameField = document.getElementById('serviceName');

    const selectedOption = serviceDropdown.options[serviceDropdown.selectedIndex];
    const pricePerNote = parseFloat(selectedOption.value) || 0;
    const quantity = parseInt(quantityInput.value) || 0;

    const totalPrice = pricePerNote * quantity;
    const serviceName = selectedOption.getAttribute('data-servicename');

    // Update total price and hidden inputs
    totalPriceField.value = totalPrice ? `KSh ${totalPrice.toFixed(2)}` : '';
    hiddenCharges.value = totalPrice.toFixed(2); // Hidden input for calculated charges
    serviceNameField.value = serviceName; // Hidden input for service name
}

</script>

</body>
</html>
