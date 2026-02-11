<?php
include 'includes/session.php';
include 'includes/slugify.php';
include 'includes/header.php';

// Handle redirection for errors before any output
if (isset($_SESSION['error'])) {
    $_SESSION['error'] = "Error fetching ratings.";
    header("Location: home.php"); // Redirect to a page to handle errors
    exit();
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

// Handle search
$search = '';
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
}

// Fetch ratings from the ratings table
$query = "SELECT * FROM ratings WHERE service LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%' ORDER BY rating_id DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    $_SESSION['error'] = "Error fetching ratings.";
    header("Location: home.php"); // Redirect to a page to handle errors
    exit();
}
?>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h4>
        Panel
      </h4>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>-->
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
      ?>

      <!-- Search Bar -->
      <div class="container" style="background-color: white; padding: 20px; border-radius: 8px;">
        <form method="POST" class="mb-4">
          <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by customer or service name" value="<?php echo htmlspecialchars($search); ?>">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary">Search</button>
            </span>
          </div>
        </form>
        
        <!-- Display ratings in a table -->
        
        <div class="box box-info">
                        <div class="box-body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Course</th>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Rating</th>
                <th>Feedback</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i=1;
              while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  
                  <td><?php echo htmlspecialchars($row['service']); ?></td>
                  <td><?php echo htmlspecialchars($row['fname']) . ' ' . htmlspecialchars($row['lname']); ?></td>
                  <td><?php echo htmlspecialchars($row['phone']); ?></td>
                  <td><?php echo htmlspecialchars($row['email']); ?></td>
                  <td><?php echo str_repeat('★', $row['rating']) . str_repeat('☆', 5 - $row['rating']); ?></td>
                  <td><?php echo htmlspecialchars($row['feedback']); ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>

    </section>
    <!-- right col -->
    </div>
  <?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->
<?php include 'includes/scripts.php'; ?>

</body>
</html>
