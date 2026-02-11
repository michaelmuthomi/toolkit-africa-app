<?php include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- Content Header content can be added here if needed -->
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
      <!-- Info boxes -->
      <div class="row">
        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-shopping-cart"></i></span>
            <div class="info-box-content">
              <a href="products.php" class="info-box-link">
                <span class="info-box-text">Products</span>
                <span class="info-box-number">Browse our products</span>
              </a>
            </div>
          </div>
        </div> -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-list"></i></span>
            <div class="info-box-content">
              <a href="services.php" class="info-box-link">
                <span class="info-box-text">Courses</span>
                <span class="info-box-number">View available courses</span>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-bitcoin"></i></span>
            <div class="info-box-content">
              <a href="pay.php" class="info-box-link">
                <span class="info-box-text">Course Payments</span>
                <span class="info-box-number">My Course Payments</span>
              </a>
            </div>
          </div>
        </div>

        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-barcode"></i></span>
            <div class="info-box-content">
              <a href="my-products.php" class="info-box-link">
                <span class="info-box-text">Product Payments</span>
                <span class="info-box-number">My Product Payments</span>
              </a>
            </div>
          </div>
        </div> -->
      </div>

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="glyphicon glyphicon-gift"></i></span>
            <div class="info-box-content">
              <a href="confirm-deliveries.php" class="info-box-link">
                <span class="info-box-text">My Products</span>
                <span class="info-box-number">Confirm deliveries</span>
              </a>
            </div>
          </div> -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-navy"><i class="glyphicon glyphicon-folder-close"></i></span>
            <div class="info-box-content">
              <a href="my-services.php" class="info-box-link">
                <span class="info-box-text">My Courses</span>
                <span class="info-box-number">Manage your courses</span>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-maroon"><i class="glyphicon glyphicon-comment"></i></span>
            <div class="info-box-content">
              <a href="inbox.php" class="info-box-link">
                <span class="info-box-text">Messages</span>
                <span class="info-box-number">View your inbox</span>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-olive"><i class="glyphicon glyphicon-star"></i></span>
            <div class="info-box-content">
              <a href="ratings.php" class="info-box-link">
                <span class="info-box-text">Ratings</span>
                <span class="info-box-number">Rate Our Courses</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-teal"><i class="glyphicon glyphicon-question-sign"></i></span>
            <div class="info-box-content">
              <a href="help.php" class="info-box-link">
                <span class="info-box-text">Help</span>
                <span class="info-box-number">Get assistance</span>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-gray"><i class="glyphicon glyphicon-eye-open"></i></span>
            <div class="info-box-content">
              <a href="aboutus.php" class="info-box-link">
                <span class="info-box-text">About Us</span>
                <span class="info-box-number">Learn more about us</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <style>
      .info-box-link {
        color: inherit;
        text-decoration: none;
      }
      .info-box-link:hover {
        color: inherit;
        text-decoration: none;
      }
      </style>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'includes/footer.php'; ?>

<!-- ./wrapper -->
<?php include 'includes/scripts.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(function(){
  var rowid = '<?php echo $row['id']; ?>';
  var description = '<?php echo slugify($row['description']); ?>';
  var barChartCanvas = $('#'+description).get(0).getContext('2d');
  var barChart = new Chart(barChartCanvas, {
    type: 'bar',
    data: {
      labels: <?php echo $carray; ?>,
      datasets: [{
        label: 'Votes',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: <?php echo $varray; ?>
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      responsive: true,
      maintainAspectRatio: true,
      legend: {
        display: false
      }
    }
  });
});
</script>
</body>
</html>
