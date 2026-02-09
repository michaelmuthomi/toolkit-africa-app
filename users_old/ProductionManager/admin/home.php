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
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>Product Requests</h4>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a href="product_tenders.php" class="small-box-footer">
              Go <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Request Materials</h4>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a href="request_materials.php" class="small-box-footer">
              Go <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>Completed Productions</h4>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a href="completed_tasks.php" class="small-box-footer">
              Go <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-purple">
            <div class="inner">
              <h4>Ratings</h4>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="ratings.php" class="small-box-footer">
              Go <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h4>Messages</h4>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="inbox.php" class="small-box-footer">
              Go <i class="fa fa-arrow-circle-right"></i>
            </a>
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
