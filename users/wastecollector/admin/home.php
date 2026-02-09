<?php include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
// Database connection
include 'includes/dbcon.php';

// Ensure the user is logged in and the cleaner's name is set in the session
if (!isset($_SESSION['admin'])) {
    // Redirect to login if the user is not logged in
    header('Location: login.php');
    exit();
}

$cleanerName = $_SESSION['admin']; // Retrieve the logged-in cleaner's name from the session

// Query the database for task counts based on status for the logged-in cleaner
$allocatedTasksQuery = $pdo->prepare("SELECT COUNT(*) FROM cleaner_tasks WHERE status = 0 AND cleaner = ?");
$allocatedTasksQuery->execute([$cleanerName]);
$allocatedTasks = $allocatedTasksQuery->fetchColumn();

$pendingTasksQuery = $pdo->prepare("SELECT COUNT(*) FROM cleaner_tasks WHERE status = 1 AND cleaner = ?");
$pendingTasksQuery->execute([$cleanerName]);
$pendingTasks = $pendingTasksQuery->fetchColumn();

$completedTasksQuery = $pdo->prepare("SELECT COUNT(*) FROM cleaner_tasks WHERE status = 2 AND cleaner = ?");
$completedTasksQuery->execute([$cleanerName]);
$completedTasks = $completedTasksQuery->fetchColumn();
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
      <h1> <?php echo htmlspecialchars($users); ?>!</h1>
      <p></p>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if (isset($_SESSION['error'])) {
          echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-warning'></i> Error!</h4>".$_SESSION['error']."
                </div>";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "<div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-check'></i> Success!</h4>".$_SESSION['success']."
                </div>";
          unset($_SESSION['success']);
        }
      ?>

      <!-- Centralized Panels with Links -->
      <div class="row text-center" style="margin-top: 20px;">
        <div class="col-md-4 col-xs-12">
          <a href="cleaner_tasks.php">
            <div class="info-box bg-blue">
              <span class="info-box-icon"><i class="fa fa-tasks"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Allocated Tasks</span>
                <span class="info-box-number"><?php echo $allocatedTasks; ?></span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-12">
          <a href="cleaner_tasks.php">
            <div class="info-box bg-green">
              <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pending Tasks</span>
                <span class="info-box-number"><?php echo $pendingTasks; ?></span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-12">
          <a href="completed-tasks.php">
            <div class="info-box bg-red">
              <span class="info-box-icon"><i class="fa fa-check-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Completed Tasks</span>
                <span class="info-box-number"><?php echo $completedTasks; ?></span>
              </div>
            </div>
          </a>
        </div>
      </div>      
    </section>
  </div>
  
  <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
  $(function(){
    var barChartCanvas = $('#performanceChart').get(0).getContext('2d');
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($carray); ?>,
        datasets: [{
          label: 'Votes',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: <?php echo json_encode($varray); ?>
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,.05)' } },
          x: { grid: { color: 'rgba(0,0,0,.05)' } }
        },
        plugins: {
          legend: { display: false },
          tooltip: { callbacks: { label: function(context) { return context.raw + ' votes'; } } }
        }
      }
    });
  });
</script>
</body>
</html>
