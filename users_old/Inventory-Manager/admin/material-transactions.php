
<?php
include 'includes/session.php';
include 'includes/header.php';
include 'includes/conn.php';

// Approve submitted material collection
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_id'])) {
    $approveId = intval($_POST['approve_id']);
    // Get material and quantity
    $get = $conn->query("SELECT material_id, quantity FROM materials_collected WHERE id = $approveId AND approved = 0");
    if ($get && $get->num_rows > 0) {
        $row = $get->fetch_assoc();
        $materialId = $row['material_id'];
        $quantity = $row['quantity'];
        // Update stock_quantity in materials table
        $conn->query("UPDATE materials SET stock_quantity = stock_quantity + $quantity WHERE id = $materialId");
        // Mark as approved
        $conn->query("UPDATE materials_collected SET approved = 1 WHERE id = $approveId");
        $_SESSION['success'] = "Material collection approved and stock updated.";
    } else {
        $_SESSION['error'] = "Material collection not found or already approved.";
    }
    header("Location: material-transactions.php");
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
      <h1>
        Material Transactions History
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="materials.php">Materials</a></li>
        <li class="active">Transactions</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="pull-right">
                <form method="POST" class="form-inline">
                  <div class="form-group">
                    <label>From: </label>
                    <input type="date" class="form-control" name="from_date" value="<?php echo isset($_POST['from_date']) ? $_POST['from_date'] : date('Y-m-d', strtotime('-30 days')); ?>">
                  </div>
                  <div class="form-group">
                    <label>To: </label>
                    <input type="date" class="form-control" name="to_date" value="<?php echo isset($_POST['to_date']) ? $_POST['to_date'] : date('Y-m-d'); ?>">
                  </div>
                  <button type="submit" class="btn btn-primary" name="filter"><i class="fa fa-filter"></i> Filter</button>
                </form>
              </div>
            </div>
            <div class="box-body">
              <h4>Pending Material Collections for Approval</h4>
              <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Date Collected</th>
                    <th>Material</th>
                    <th>Quantity</th>
                    <th>Task ID</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $pending = $conn->query("SELECT mc.*, m.name FROM materials_collected mc JOIN materials m ON m.id = mc.material_id WHERE mc.approved = 0 ORDER BY mc.collected_at DESC");
                  if ($pending && $pending->num_rows > 0) {
                    while ($row = $pending->fetch_assoc()) {
                      echo "<tr>
                        <td>".date('M d, Y h:i A', strtotime($row['collected_at']))."</td>
                        <td>".htmlspecialchars($row['name'])."</td>
                        <td>".intval($row['quantity'])."</td>
                        <td>".intval($row['task_id'])."</td>
                        <td>
                          <form method='POST' style='display:inline;'>
                            <input type='hidden' name='approve_id' value='".intval($row['id'])."'>
                            <button type='submit' class='btn btn-success btn-xs'>Approve</button>
                          </form>
                        </td>
                      </tr>";
                    }
                  } else {
                    echo "<tr><td colspan='5'>No pending material collections.</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
              </div>

              <hr>
              <h4>Approved Material Collections</h4>
              <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Date Approved</th>
                    <th>Material</th>
                    <th>Quantity</th>
                    <th>Task ID</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $approved = $conn->query("SELECT mc.*, m.name FROM materials_collected mc JOIN materials m ON m.id = mc.material_id WHERE mc.approved = 1 ORDER BY mc.collected_at DESC");
                  if ($approved && $approved->num_rows > 0) {
                    while ($row = $approved->fetch_assoc()) {
                      echo "<tr>
                        <td>".date('M d, Y h:i A', strtotime($row['collected_at']))."</td>
                        <td>".htmlspecialchars($row['name'])."</td>
                        <td>".intval($row['quantity'])."</td>
                        <td>".intval($row['task_id'])."</td>
                        <td><span class='label label-success'>Approved</span></td>
                      </tr>";
                    }
                  } else {
                    echo "<tr><td colspan='4'>No approved material collections.</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
              </div>

              <hr>
              <!-- <h4>Material Transactions History</h4>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Material</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Transaction Type</th>
                    <th>Performed By</th>
                    <th>Notes</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $where = "";
                    if(isset($_POST['filter'])){
                      $from = $_POST['from_date'];
                      $to = $_POST['to_date'];
                      $where = " AND DATE(t.transaction_date) BETWEEN '$from' AND '$to'";
                    }
                    $sql = "SELECT t.*, m.name, m.category FROM material_transactions t 
                           JOIN materials m ON m.id = t.material_id
                           WHERE 1=1 $where
                           ORDER BY t.transaction_date DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $badge = '';
                      if($row['transaction_type'] == 'add' || $row['transaction_type'] == 'initial'){
                        $badge = '<span class="badge bg-green">+'.$row['quantity'].'</span>';
                      }
                      else{
                        $badge = '<span class="badge bg-red">'.$row['quantity'].'</span>';
                      }
                      echo "
                        <tr>
                          <td>".date('M d, Y h:i A', strtotime($row['transaction_date']))."</td>
                          <td>".$row['name']."</td>
                          <td>".($row['category'] == 'Metallic' ? 
                              '<span class="label label-primary">'.$row['category'].'</span>' : 
                              '<span class="label label-info">'.$row['category'].'</span>')."</td>
                          <td>".$badge."</td>
                          <td>".$row['transaction_type']."</td>
                          <td>".$row['performed_by']."</td>
                          <td>".$row['notes']."</td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table> -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('#example1').DataTable({
    responsive: true,
    "order": [[ 0, "desc" ]]
  });
});
</script>
</body>
</html>