<?php
include 'includes/session.php';  // Includes session and database connection
include 'includes/slugify.php';  // Include any additional utility functions
include 'includes/header.php';  // Include header HTML
include 'includes/dbcon.php';

// Initialize variables
$pending_count = 0;
$completed_count = 0;
$message_count = 0;

// Fetch pending deliveries count
$query = $pdo->query("SELECT COUNT(*) AS count FROM driver_tasks WHERE status = 0");
$result = $query->fetch(PDO::FETCH_ASSOC);
$pending_count = $result['count'];

// Fetch completed deliveries count (status 1 and 2)
$query = $pdo->query("SELECT COUNT(*) AS count FROM driver_tasks WHERE status IN (1, 2)");
$result = $query->fetch(PDO::FETCH_ASSOC);
$completed_count = $result['count'];

// Fetch unread messages count
$query = $pdo->query("SELECT COUNT(*) AS count FROM messages WHERE read_status = 'unread'");
$result = $query->fetch(PDO::FETCH_ASSOC);
$message_count = $result['count'];
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Driver Dashboard</h1>
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
        <!-- Pending Deliveries -->
        <div class="col-lg-4 col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Pending Deliveries</h3>
            </div>
            <div class="box-body">
              <p>You have <strong><?php echo $pending_count; ?></strong> pending deliveries.</p>
              <a href="pending-deliveries.php" class="btn btn-warning">View Pending Deliveries</a>
            </div>
          </div>
        </div>

        <!-- Completed Deliveries -->
        <div class="col-lg-4 col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Completed Deliveries</h3>
            </div>
            <div class="box-body">
              <p>You have completed <strong><?php echo $completed_count; ?></strong> deliveries.</p>
              <a href="completed-deliveries.php" class="btn btn-success">View Completed Deliveries</a>
            </div>
          </div>
        </div>

        <!-- Messages -->
        <div class="col-lg-4 col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Messages</h3>
            </div>
            <div class="box-body">
              <p>You have <strong><?php echo $message_count; ?></strong> new messages.</p>
              <a href="inbox.php" class="btn btn-info">View Messages</a>
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
