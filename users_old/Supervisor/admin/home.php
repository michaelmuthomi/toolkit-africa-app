<?php include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<?php $supervisor = $_SESSION['admin']; ?>
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
      <h1> <?php echo ucfirst($supervisor); ?>!</h1>
      <p></p>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Alerts -->
      <?php
      if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
      }
      if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
      }
      ?>

      <!-- Dashboard Overview -->
      <div class="row">
        <div class="col-lg-4 col-xs-12">
          <div class="info-box bg-light-blue">
            <span class="info-box-icon"><i class="fa fa-tasks"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Allocated Tasks</span>
              <span class="info-box-number">
                <?php 
                  // Fetch Allocated tasks (status=0)
                  $allocated_tasks = $conn->query("SELECT COUNT(*) as allocated FROM supervisor_tasks WHERE status = 0 AND supervisor = '$supervisor'")->fetch_assoc();
                  echo $allocated_tasks['allocated'];
                ?>
              </span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-xs-12">
          <div class="info-box bg-teal">
            <span class="info-box-icon"><i class="fa fa-exclamation-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Pending Tasks</span>
              <span class="info-box-number">
                <?php 
                  // Fetch Pending tasks (status=1)
                  $pending_tasks = $conn->query("SELECT COUNT(*) as pending FROM supervisor_tasks WHERE status = 1 AND supervisor = '$supervisor'")->fetch_assoc();
                  echo $pending_tasks['pending'];
                ?>
              </span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-xs-12">
          <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fa fa-check-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Completed Tasks</span>
              <span class="info-box-number">
                <?php 
                  // Fetch Completed tasks (status=2 or 3)
                  $completed_tasks = $conn->query("SELECT COUNT(*) as completed FROM supervisor_tasks WHERE status IN (2, 3) AND supervisor = '$supervisor'")->fetch_assoc();
                  echo $completed_tasks['completed'];
                ?>
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- Performance Chart -->
      <div class="row">
        <div class="col-lg-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Task Completion Overview</h3>
            </div>
            <div class="box-body">
              <!-- Adjusted canvas size -->
              <canvas id="taskCompletionChart" width="600" height="600"></canvas>
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
document.addEventListener('DOMContentLoaded', function () {
  var ctx = document.getElementById('taskCompletionChart').getContext('2d');
  var taskCompletionChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Completed', 'Pending'],
      datasets: [{
        data: [
          <?php echo $completed_tasks['completed']; ?>, 
          <?php echo $pending_tasks['pending']; ?>
        ],
        backgroundColor: ['#28a745', '#ffc107']
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  });
});
</script>

</body>
</html>
