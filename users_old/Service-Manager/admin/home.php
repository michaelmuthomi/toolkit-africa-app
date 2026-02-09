<?php 
  // Include the database connection file
  include 'includes/dbcon.php'; 
  include 'includes/session.php'; 
  include 'includes/slugify.php'; 
  include 'includes/header.php'; 
?>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Welcome, <?php echo ucfirst($users); ?>!</h1>
      <p></p>
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

      <!-- Dashboard Widgets (Service Management Overview) -->
      <div class="row">
        <!-- Pending Service Requests -->
        <div class="col-lg-4 col-xs-12">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
                <?php 
                  // Query for Pending Service Requests
                  $pendingServicesQuery = "SELECT COUNT(*) AS count FROM booking WHERE supervisor_status = 0";
                  $pendingServicesResult = mysqli_query($conn, $pendingServicesQuery);
                  if (!$pendingServicesResult) {
                      die('Error executing query: ' . mysqli_error($conn));
                  }
                  echo mysqli_fetch_assoc($pendingServicesResult)['count'];
                ?>
              </h3>
              <p>Pending Service Requests</p>
            </div>
            <div class="icon">
              <i class="fa fa-wrench"></i>
            </div>
            <a href="booked-services.php" class="small-box-footer">Manage Requests <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- Completed Services -->
        <div class="col-lg-4 col-xs-12">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                <?php 
                  // Query for Completed Services
                  $completedServicesQuery = "SELECT COUNT(*) AS count FROM supervisor_tasks WHERE status IN (2, 3)";
                  $completedServicesResult = mysqli_query($conn, $completedServicesQuery);
                  if (!$completedServicesResult) {
                      die('Error executing query: ' . mysqli_error($conn));
                  }
                  echo mysqli_fetch_assoc($completedServicesResult)['count'];
                ?>
              </h3>
              <p>Completed Services</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-circle"></i>
            </div>
            <a href="completed-services.php" class="small-box-footer">View Completed Services <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- Pending Tasks -->
        <div class="col-lg-4 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                <?php 
                  // Query for Pending Tasks
                  $pendingTasksQuery = "SELECT COUNT(*) AS count FROM supervisor_tasks WHERE status = 1";
                  $pendingTasksResult = mysqli_query($conn, $pendingTasksQuery);
                  if (!$pendingTasksResult) {
                      die('Error executing query: ' . mysqli_error($conn));
                  }
                  echo mysqli_fetch_assoc($pendingTasksResult)['count'];
                ?>
              </h3>
              <p>Pending Tasks</p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <a href="manage-booked_services.php" class="small-box-footer">View Tasks <i class="fa fa-arrow-circle-right"></i></a>
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
    // Sample data from PHP
    var carray = <?php echo json_encode($carray); ?>;  // Data for labels
    var varray = <?php echo json_encode($varray); ?>;  // Data for chart values

    var ctx = document.getElementById('servicePerformanceChart').getContext('2d');
    var servicePerformanceChart = new Chart(ctx, {
      type: 'bar', // Type of the chart (bar chart)
      data: {
        labels: carray,  // Labels from PHP array
        datasets: [{
          label: 'Service Performance (Requests)', // Label for the dataset
          backgroundColor: 'rgba(60,141,188,0.9)', // Color for bars
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
              color: 'rgba(0,0,0,0.05)' // Grid line color
            }
          }
        }
      }
    });
  });
</script>

</body>
</html>
