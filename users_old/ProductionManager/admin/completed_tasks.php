<?php
include 'includes/session.php';
include 'includes/conn.php';
include 'includes/header.php';

// Query to get completed production tasks - fixed JOIN condition
$query = "SELECT pt.*, t.id AS tender_id, t.title 
          FROM product_tasks pt 
          JOIN product_tenders t ON pt.idnumber = t.id 
          WHERE pt.supervisor = ? AND pt.status = 2";
if (!$stmt = $conn->prepare($query)) {
  die('<div class="alert alert-danger">SQL Prepare Error: ' . htmlspecialchars($conn->error) . '</div>');
}
if (!$stmt->bind_param('s', $_SESSION['admin'])) {
  die('<div class="alert alert-danger">SQL Bind Error: ' . htmlspecialchars($stmt->error) . '</div>');
}
if (!$stmt->execute()) {
  die('<div class="alert alert-danger">SQL Execute Error: ' . htmlspecialchars($stmt->error) . '</div>');
}
$result = $stmt->get_result();
if ($result === false) {
  die('<div class="alert alert-danger">SQL Get Result Error: ' . htmlspecialchars($stmt->error) . '</div>');
}
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h4>Completed Productions</h4>
      </section>

      <section class="content">
<?php
// Debug: Output the supervisor value being used
// echo '<div class="alert alert-info">Supervisor: ' . htmlspecialchars($_SESSION['admin']) . '</div>';
        if (isset($_SESSION['error'])) {
          echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-warning'></i> Error!</h4>" . $_SESSION['error'] . "
                </div>";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "<div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-check'></i> Success!</h4>" . $_SESSION['success'] . "
                </div>";
          unset($_SESSION['success']);
        }
        ?>

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Completed Production Tasks</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Recycler</th>
                  <th>Completion Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result->num_rows === 0) {
                  echo '<tr><td colspan="6" class="text-center">No completed tasks found.</td></tr>';
                  // Debug: Uncomment below to see the query and supervisor value
                  // echo '<tr><td colspan="6">Query: ' . htmlspecialchars($query) . '<br>Supervisor: ' . htmlspecialchars($_SESSION['admin']) . '</td></tr>';
                } else {
                  // echo '<tr><td colspan="6">Found ' . $result->num_rows . ' completed tasks.</td></tr>'; // Uncomment for debugging
                  while ($row = $result->fetch_assoc()): ?>
                    <tr>
                      <td><?php echo htmlspecialchars($row['title']); ?></td>
                      <td><?php echo htmlspecialchars($row['description']); ?></td>
                      <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                      <td><?php echo htmlspecialchars($row['cleaner']); ?></td>
                      <td><?php echo htmlspecialchars($row['date_allocated']); ?></td>
                      <td>
                        <form action="return_to_inventory.php" method="POST">
                          <input type="hidden" name="task_id" value="<?php echo $row['idnumber']; ?>">
                          <input type="hidden" name="tender_id" value="<?php echo $row['tender_id']; ?>">
                      <button type="submit" class="btn btn-primary">Return to Inventory</button>
                    </form>
                  </td>
                </tr>
                <?php endwhile;
                }
                ?>
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include 'includes/footer.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
</body>
</html>