<?php
session_start();
error_reporting(0);
include 'includes/session.php';
include('includes/configcontact.php');

// Assume the user ID is stored in session
$userid = $_SESSION['userid'];

// Fetch customer data from the database
$sql = "SELECT idnumber, fname, lname, email, phone, address FROM customers WHERE id=:userid";
$query = $dbh->prepare($sql);
$query->bindParam(':userid', $userid, PDO::PARAM_STR);
$query->execute();
$customer = $query->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['send'])) {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $service = $_POST['service'];
    $charges = $_POST['charges'];
    $transactioncode = test_input($_POST['transactioncode']);
    $per = 'M1OPQRST6U8V2X3ABCDEFG45NYZ7W9HIJ0KL';
    $newS = substr(str_shuffle($per), 0, 8);

    $naming = "/^[A-Z0-9]{10,}$/";

    if (!preg_match($naming, $transactioncode)) {
        $error = "Enter a valid MPESA ID";
    } else {
        $sql = "INSERT INTO bookings(idnumber, fname, lname, email, phone, address, service, charges, transactioncode) VALUES(:idnumber, :fname, :lname, :email, :phone, :address, :service, :charges, :transactioncode)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':idnumber', $customer['idnumber'], PDO::PARAM_STR);
        $query->bindParam(':fname', $customer['fname'], PDO::PARAM_STR);
        $query->bindParam(':lname', $customer['lname'], PDO::PARAM_STR);
        $query->bindParam(':email', $customer['email'], PDO::PARAM_STR);
        $query->bindParam(':phone', $customer['phone'], PDO::PARAM_STR);
        $query->bindParam(':address', $customer['address'], PDO::PARAM_STR);
        $query->bindParam(':service', $service, PDO::PARAM_STR);
        $query->bindParam(':charges', $charges, PDO::PARAM_STR);
        $query->bindParam(':transactioncode', $transactioncode, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            $msg = "Registration was successful, Please wait for approval process";
        } else {
            $error = "Something went wrong. Please try again";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css3/modern-business.css" rel="stylesheet">

    <style>
        .navbar-toggler {
            z-index: 1;
        }

        @media (max-width: 576px) {
            nav > .container {
                width: 100%;
            }
        }

        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>
    <script>
        function classArmDropdown(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
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
</head>

<body>

    <?php include('includes/header.php'); ?>

    <div class="container">
        <h1 class="mt-4 mb-3"></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
            </li>
        </ol>

        <div class="row">
            <div class="col-lg-8 mb-4">
                <center><h5><b>REGISTER FOR A SERVICE :</b></h5></center>

                <?php if ($error) { ?>
                    <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?></div>
                <?php } else if ($msg) { ?>
                    <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?></div>
                <?php } ?>
                
                <form name="sentaddress" method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>ID Number:</label>
                            <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?php echo htmlentities($customer['idnumber']); ?>" readonly>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>First Name:</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo htmlentities($customer['fname']); ?>" readonly>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Last Name:</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo htmlentities($customer['lname']); ?>" readonly>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlentities($customer['email']); ?>" readonly>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Phone Number:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlentities($customer['phone']); ?>" readonly>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Address:</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlentities($customer['address']); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label>Select Service</label>
                            <?php
                            $qry = "SELECT * FROM services WHERE status='1'";
                            $result = $conn->query($qry);
                            $num = $result->num_rows;
                            if ($num > 0) {
                                echo '<select required name="service" onchange="classArmDropdown(this.value)" class="form-control mb-1">';
                                echo '<option value="">--Select Service--</option>';
                                while ($rows = $result->fetch_assoc()) {
                                    echo '<option value="' . $rows['service_name'] . '">' . $rows['service_name'] . '-->(' . $rows['duration'] . ')</option>';
                                }
                                echo '</select>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <label class="form-control-label">Charges<span class="text-danger ml-2">*</span></label>
                        <div id="txtHint"></div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>M-Pesa Code:</label>
                            <input type="text" class="form-control" minlength="10" maxlength="10" id="transactioncode" name="transactioncode" required>
                        </div>
                    </div>
                    <div id="success"></div>
                    <button type="submit" name="send" class="btn btn-primary">Register</button>
                </form>
            </div>

            <div class="col-lg-4 mb-4">
                <h3>Contact Details</h3>
                <?php
                $pagetype = $_GET['type'];
                $sql = "SELECT Address, emailId, ContactNo FROM tblcontactusinfo";
                $query = $dbh->prepare($sql);
                $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) { ?>
                        <p><?php echo htmlentities($result->Address); ?></p>
                        <p><abbr title="Phone">P</abbr>: <?php echo htmlentities($result->ContactNo); ?></p>
                        <p><abbr title="email">E</abbr>: <a href="mailto:name@example.com"><?php echo htmlentities($result->emailId); ?></a></p>
                    <?php }
                } ?>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js3/jqBootstrapValidation.js"></script>
    <script src="js3/contact_me.js"></script>

</body>
</html>
