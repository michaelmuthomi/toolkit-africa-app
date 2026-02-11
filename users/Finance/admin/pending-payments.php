<?php
error_reporting(0);
// Include necessary PHP files
include 'includes/session.php';
include 'includes/slugify.php';
include 'includes/header.php';
include 'includes/dbcon.php'; // Assuming this file initializes $pdo

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Finance Panel</title>
   
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

                    
            
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h4></h4>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
                    <li class="active"></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="col-md-12">
                        <h4>Pending Course Payments</h4>
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
                        <div class="box box-info">
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Course</th>
                                            <th>Charges</th>
                                            <th>Transaction Code</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        $statement = $pdo->prepare("SELECT * FROM booking WHERE payment_status = '0'");
                                        $statement->execute();
                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($result as $row) {
                                            $i++;
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['fname'] . ' ' . $row['lname']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['service']; ?></td>
                                                <td><?php echo $row['charges']; ?></td>
                                                <td><?php echo $row['transactioncode']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td>
                                                    <?php
                                                    if($row['payment_status'] == '0') {
                                                        echo "Pending";
                                                    } elseif ($row['payment_status'] == '1') {
                                                        echo "Approved";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['payment_status'] == '0'): ?>
                                                        <form action="approve_payment.php" method="POST">
                                                            <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                                                            <button type="submit" class="btn btn-primary">Approve</button>
                                                        </form>
                                                    <?php endif; ?>

                                                    <?php if ($row['payment_status'] == '1'): ?>
                                                        <a href="receipt.php?trainee_id=<?php echo $row['booking_id']; ?>" class="btn btn-success" style="color:white;">Receipt</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include 'includes/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
  <?php include 'includes/scripts.php'; ?>
</body>
</html>
