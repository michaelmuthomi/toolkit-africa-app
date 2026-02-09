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
      <h1>Inventory Dashboard</h1>
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
      
      <!-- Dashboard Cards -->
      <div class="row">
        <!-- Products Section -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Products</h3>
              <p>Manage Inventory</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="products.php" class="small-box-footer">Add Products <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Manage</h3>
              <p>Product Catalog</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="manage_product.php" class="small-box-footer">Manage Products <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Orders</h3>
              <p>Track Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="allocate-dispatch.php" class="small-box-footer">Ordered Products <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- Tenders Section -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Tenders</h3>
              <p>Create New</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="tenders.php" class="small-box-footer">Add Tenders <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>Manage</h3>
              <p>Tender Records</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="manage-tenders.php" class="small-box-footer">Manage Tenders <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- Tools Section -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="small-box bg-navy">
            <div class="inner">
              <h3>Tools</h3>
              <p>Manage Equipment</p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <a href="tools.php" class="small-box-footer">Manage Tools <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="small-box bg-teal">
            <div class="inner">
              <h3>Add</h3>
              <p>New Tools</p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <a href="managetools.php" class="small-box-footer">Add Tools <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3>Requests</h3>
              <p>Tool Requests</p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <a href="work.php" class="small-box-footer">Tools Request <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Messages -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="small-box bg-olive">
            <div class="inner">
              <h3>Messages</h3>
              <p>Communication</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="inbox.php" class="small-box-footer">Messages <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- Low Stock Materials Section -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
          <?php
      $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM materials WHERE stock_quantity <= 10");
      $stmt->execute();
      $result = $stmt->get_result();
      $low_stock = $result->fetch_assoc()['total'];
      ?>
      <h3><?php echo $low_stock; ?></h3>
      <p>Low Stock Materials</p>
    </div>
    <div class="icon">
      <i class="fa fa-warning"></i>
    </div>
    <a href="materials.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
  // Example data arrays; replace with actual data from PHP or an API
  var newItemsData = 523;
  var purchasedItemsData = 178;
  var soldItemsData = 267;
  var purchasedValueData = 400;
  var outOfStockItemsData = 25;

  document.getElementById('newItems').textContent = newItemsData;
  document.getElementById('purchasedItems').textContent = purchasedItemsData;
  document.getElementById('soldItems').textContent = soldItemsData;
  document.getElementById('purchasedValue').textContent = purchasedValueData;
  document.getElementById('outOfStockItems').textContent = outOfStockItemsData;

  var ctx1 = document.getElementById('yearlySalesChart').getContext('2d');
  var yearlySalesChart = new Chart(ctx1, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          label: 'Sales',
          data: [1200, 1900, 3000, 5000, 2300, 3500, 2800, 3200, 4300, 3100, 4200, 5000],
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        },
        {
          label: 'Purchase',
          data: [1000, 1500, 2500, 4500, 2000, 3000, 2500, 2900, 4000, 2800, 3900, 4600],
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
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

  var ctx2 = document.getElementById('overallReportChart').getContext('2d');
  var overallReportChart = new Chart(ctx2, {
    type: 'doughnut',
    data: {
      labels: ['Purchase', 'Sales', 'Income'],
      datasets: [
        {
          label: 'Overall Report',
          data: [4000, 5000, 1000],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(255, 206, 86, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(255, 206, 86, 1)'
          ],
          borderWidth: 1
        }
      ]
    },
    options: {
      responsive: true
    }
  });

  var ctx3 = document.getElementById('profitLossChart').getContext('2d');
  var profitLossChart = new Chart(ctx3, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label: 'Profit',
          data: [1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000, 6500],
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1,
          fill: false
        },
        {
          label: 'Loss',
          data: [200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300],
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1,
          fill: false
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

  var ctx4 = document.getElementById('stockLevelsChart').getContext('2d');
  var stockLevelsChart = new Chart(ctx4, {
    type: 'bar',
    data: {
      labels: ['Category A', 'Category B', 'Category C', 'Category D', 'Category E'],
      datasets: [
        {
          label: 'Stock Levels',
          data: [200, 150, 100, 80, 60],
          backgroundColor: 'rgba(153, 102, 255, 0.2)',
          borderColor: 'rgba(153, 102, 255, 1)',
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
</body>
</html>
