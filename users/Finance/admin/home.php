<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
// Database connection
include 'includes/dbcon.php';

// Query for pending and approved orders
$pendingOrders = $pdo->query("SELECT COUNT(*) FROM orders WHERE payment_status = 0")->fetchColumn();
$approvedOrders = $pdo->query("SELECT COUNT(*) FROM orders WHERE payment_status = 1")->fetchColumn();

// Query for pending and approved bookings
$pendingBookings = $pdo->query("SELECT COUNT(*) FROM booking WHERE payment_status = 0")->fetchColumn();
$approvedBookings = $pdo->query("SELECT COUNT(*) FROM booking WHERE payment_status = 1")->fetchColumn();
?>

<body class="hold-transition skin-blue sidebar-mini">
<?php $users = $_SESSION['admin']; ?>
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color:black;">Customer Booking and Order Sales</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
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

      <!-- Dashboard Cards Row -->
      <div class="row">
        <!-- Pending Booking Payments Card -->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $pendingBookings; ?></h3>
              <p>Pending Booking Payments</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="pending-payments.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- Approved Booking Payments Card -->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $approvedBookings; ?></h3>
              <p>Approved Booking Payments</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="Approved-payments.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- Pending Order Payments Card -->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $pendingOrders; ?></h3>
              <p>Pending Order Payments</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="pending-orderpay.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- Approved Order Payments Card -->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $approvedOrders; ?></h3>
              <p>Approved Order Payments</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="approve-orderpay.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Additional Cards Row -->
      <div class="row">
        <!-- Tenders Card -->
        <div class="col-lg-6 col-xs-12">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>Tenders</h3>
              <p>Manage Payment Tenders</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="paytenders.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- Messages Card -->
        <div class="col-lg-6 col-xs-12">
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3>Messages</h3>
              <p>View Inbox Messages</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="inbox.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Data retrieved from PHP
  var pendingBookings = <?php echo $pendingBookings; ?>;
  var approvedBookings = <?php echo $approvedBookings; ?>;
  var pendingOrders = <?php echo $pendingOrders; ?>;
  var approvedOrders = <?php echo $approvedOrders; ?>;

  // Chart configuration
  var ctx = document.getElementById('bookingOrderChart').getContext('2d');
  var bookingOrderChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Pending Bookings', 'Approved Bookings', 'Pending Orders', 'Approved Orders'],
      datasets: [
        {
          label: 'Count',
          data: [pendingBookings, approvedBookings, pendingOrders, approvedOrders],
          backgroundColor: [
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)'
          ],
          borderColor: [
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)'
          ],
          borderWidth: 1
        }
      ]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
});
</script>

<style>
body {
  font-family: 'Arial', sans-serif;
  background-color: #f4f6f9;
  margin: 0;
  padding: 0;
}

.content-wrapper {
  padding: 20px;
}

.content-header {
  background-color: #1E90FF;
  padding: 10px 20px;
  color: white;
  border-radius: 5px;
  margin-bottom: 20px;
}

.chart-container {
  width: 80%;
  margin: auto;
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
</style>
</body>
</html>
