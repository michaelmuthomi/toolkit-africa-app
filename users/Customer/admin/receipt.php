<?php require_once  'includes/header.php'; ?>

<?php
// Include database configuration file
require_once 'includes/dbcon.php';

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if admin session variable is set
if (!isset($_SESSION['admin'])) {
    // Handle the case where the admin session variable is not set
    die('Admin session not set.');
}
?>

<hr>
<center>
    <div class="container">
        <b><h4>Toolkit Africa</h4></b>
        <center><img src="img/Logo.jpg" alt="user" style="width:10%;height:25%;"></center>
        <b>ADDRESS</b></br>Ngong Road, Nairobi, Kenya
        </br>
        <b>PHONE NUMBER</b></br>+254787379737</br><b>MOBILE PHONE</b></br>+254787379737</br>
    </div>
</center>

<hr>
<section class="content">

    <div class="container">
        <div class="col-md-12">
            <h4>RECEIPT</h4>
            <div class="box box-info">
                <div class="box-body ">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Details</th>
                                <th>Payment Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Ensure $pdo is defined
                            if (isset($pdo)) {
                                $i = 0;
                                $statement = $pdo->prepare("SELECT * FROM booking WHERE fname = '".$_SESSION['admin']."'");
                                $statement->execute();
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                    $i++;
                                    ?>
                                    <tr class="<?php echo ($row['payment_status'] ==  'Pending') ? 'bg-r' : 'bg-g'; ?>">
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <b>Customer Name: </b><?php echo $row['fname'] . ' ' . $row['lname']; ?><br>
                                            <b>Email Address :</b><?php echo $row['email']; ?><br>
                                            <b>Phone Number :</b><?php echo $row['phone']; ?><br><br>
                                            <b>Course Name :</b><?php echo $row['service']; ?><br>
                                            <b>Date Registered :</b><?php echo $row['date']; ?><br>
                                           
                                            <?php
                                            $statement1 = $pdo->prepare("SELECT * FROM services WHERE service_name = ?");
                                            $statement1->execute([$row['service']]);
                                            $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($result1 as $row1) {
                                           
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <b>Amount Paid :</b> <?php echo $row['charges']; ?><br>
                                            <b>Paid Through :</b> M-Pesa<br>
                                            <b>Transaction Code :</b> <?php echo $row['transactioncode']; ?><br>
                                            <b>Date Paid :</b> <?php echo $row['date']; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="3">Database connection not established.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class=""></div><br>
        </div>
    </div>
</section>

<?php
// Include footer if necessary
// require_once('includes/footer.php');
?>