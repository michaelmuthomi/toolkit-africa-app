<?php include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<?php $users = $_SESSION['admin']; ?>
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> <?php echo ucfirst($users); ?>!</h1>
      <p></p>
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

      <!-- Dashboard Overview -->
      <div class="row">
        <div class="col-lg-4 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>5</h3>
              <p>Active Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a href="orders.php" class="small-box-footer">View Orders <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-12">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>20</h3>
              <p>Delivered Products</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="delivery.php" class="small-box-footer">View Delivery Status <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-12">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>100</h3>
              <p>Items in Stock</p>
            </div>
            <div class="icon">
              <i class="fa fa-cube"></i>
            </div>
            <a href="stock.php" class="small-box-footer">Manage Stock <i class="fa fa-arrow-circle-right"></i></a>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  $(function(){
    // Assuming you have the variables for labels and data like this:
    var carray = <?php echo json_encode($carray); ?>;  // Data for labels
    var varray = <?php echo json_encode($varray); ?>;  // Data for chart values

    var ctx = document.getElementById('supplierPerformanceChart').getContext('2d');
    var supplierPerformanceChart = new Chart(ctx, {
      type: 'bar', // Change this to 'bar' for bar chart or 'doughnut' for a doughnut chart
      data: {
        labels: carray,  // Labels from PHP array
        datasets: [{
          label: 'Performance (Votes)', // Label for the dataset
          backgroundColor: 'rgba(60,141,188,0.9)', // Blue color for bars
          borderColor: 'rgba(60,141,188,0.8)',
          data: varray // Data for the chart
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          x: {
            beginAtZero: true,
            grid: {
              color: 'rgba(0,0,0,0.05)' // Grid line color
            }
          },
          y: {
            beginAtZero: true,
            grid: {
              color: 'rgba(0,0,0,0.05)'
            }
          }
        }
      }
    });
  });
</script>
</body>
</html>
