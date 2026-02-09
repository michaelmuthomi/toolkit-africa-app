<?php include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
// Database connection
include 'includes/dbcon.php';

// Fetch key metrics
$pendingDispatches = $pdo->query("SELECT COUNT(*) FROM dispatch_tasks WHERE status = 0")->fetchColumn();
$dispatchedOrders = $pdo->query("SELECT COUNT(*) FROM dispatch_tasks WHERE status = 2")->fetchColumn();
$completedDeliveries = $pdo->query("SELECT COUNT(*) FROM dispatch_tasks WHERE status = 3 AND status = 3")->fetchColumn();
?>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
      <h1>Dispatch Manager Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
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
      
      <!-- Dashboard Summary -->
      <div class="row">
        <div class="col-lg-4 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-truck"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Pending Dispatches</span>
              <span class="info-box-number"><?php echo $pendingDispatches; ?></span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-xs-12">
          <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-paper-plane"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Dispatched Orders</span>
              <span class="info-box-number"><?php echo $dispatchedOrders; ?></span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-check"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Completed Deliveries</span>
              <span class="info-box-number"><?php echo $completedDeliveries; ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Chart Section -->
      <div class="row">
        <div class="col-lg-12 col-xs-12">
          <div class="chart-container">
            <canvas id="dispatchChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Orders Table -->
      <div class="row">
        <div class="col-lg-12 col-xs-12">
          <div class="box">
            <div class="box-header">
             <!-- <h3 class="box-title">Pending Dispatch Orders</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Product</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>-->
                <tbody>
                  <?php
                  $query = $pdo->query("SELECT * FROM orders WHERE dispatch_status = 0");
                  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "
                      <tr>
                        <td>".$row['order_id']."</td>
                        <td>".$row['fname']." ".$row['lname']."</td>
                        <td>".$row['products']."</td>
                        <td>".$row['total']."</td>
                        <td><span class='label label-warning'>Pending</span></td>
                        <td>
                          <button class='btn btn-success btn-sm'>Dispatch</button>
                        </td>
                      </tr>
                    ";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var ctx = document.getElementById('dispatchChart').getContext('2d');
  var dispatchChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Pending Dispatches', 'Dispatched Orders', 'Completed Deliveries'],
      datasets: [
        {
          label: 'Count',
          data: [
            <?php echo $pendingDispatches; ?>,
            <?php echo $dispatchedOrders; ?>,
            <?php echo $completedDeliveries; ?>
          ],
          backgroundColor: ['#FFC107', '#007BFF', '#28A745'],
          borderColor: ['#FFC107', '#007BFF', '#28A745'],
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
  background-color: #f4f6f9;
}

.chart-container {
  margin: 20px auto;
  width: 90%;
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

.info-box {
  padding: 20px;
}
</style>
</body>
</html>
