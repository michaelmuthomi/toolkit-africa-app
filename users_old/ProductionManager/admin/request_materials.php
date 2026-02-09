<?php
include 'includes/session.php';
include 'includes/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tender_id = $_POST['tender_id'];
    
    // Check if this is the second step (with recycler selection)
    if (isset($_POST['recycler_id']) && isset($_POST['material'])) {
        $recycler_id = $_POST['recycler_id'];
        $materials = $_POST['material'];
        $quantities = $_POST['quantity'];
        
        // Begin transaction
        $conn->begin_transaction();
        
        try {
            // First mark the tender as being processed
            $stmt = $conn->prepare("UPDATE product_tenders SET cleaner_status = 1 WHERE id = ?");
            $stmt->bind_param('i', $tender_id);
            $stmt->execute();
            
            // Create a summary of materials for the materials_needed field
            $materials_summary = [];
            foreach ($materials as $mat_id => $selected) {
                if (isset($quantities[$mat_id]) && $quantities[$mat_id] > 0) {
                    // Get material name
                    $stmt = $conn->prepare("SELECT name FROM materials WHERE id = ?");
                    $stmt->bind_param('i', $mat_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $material = $result->fetch_assoc();
                    
                    $materials_summary[] = $material['name'] . ': ' . $quantities[$mat_id];
                }
            }
            $materials_needed = implode(", ", $materials_summary);
            
            // Then create a task for the recycler
            $stmt = $conn->prepare("INSERT INTO product_tasks (idnumber, description, quantity, materials_needed, supervisor, cleaner, status, date_allocated) 
                                  SELECT id, description, quantity, ?, ?, ?, 0, NOW() FROM product_tenders WHERE id = ?");
            $stmt->bind_param('sssi', $materials_needed, $_SESSION['admin'], $recycler_id, $tender_id);
            $stmt->execute();
            
            // Get the task ID
            $task_id = $conn->insert_id;
            
            // Insert work items for each material
            $stmt = $conn->prepare("INSERT INTO work_items (task_id, material_id, quantity) VALUES (?, ?, ?)");
            
            foreach ($materials as $mat_id => $selected) {
                if (isset($quantities[$mat_id]) && $quantities[$mat_id] > 0) {
                    // Make sure $task_id is coming from the right field
                    // If you're storing the inserted ID from product_tasks, it should match the column name
                    $stmt->bind_param('iid', $task_id, $mat_id, $quantities[$mat_id]);
                    $stmt->execute();
                }
            }
            
            // Commit the transaction
            $conn->commit();
            $_SESSION['success'] = 'Materials requested from recycler successfully';
            
        } catch (Exception $e) {
            // Rollback on error
            $conn->rollback();
            $_SESSION['error'] = 'Failed to request materials: ' . $e->getMessage();
        }
        
        header('Location: product_tenders.php');
        exit();
    }
}

// Get tender ID from query string
// If no POST request, show form to select tender
if (!isset($_POST['tender_id'])) {
  include 'includes/header.php';
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
    <h4>Request Materials for Production</h4>
    </section>

    <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
      <h3 class="box-title">Select Product Request</h3>
      </div>
      <div class="box-body">
      <form action="" method="POST">
        <div class="form-group">
        <label for="tender_id">Select Request:</label>
        <select class="form-control" name="tender_id" required>
          <option value="">--Select Request--</option>
          <?php
          $stmt = $conn->prepare("SELECT id, title, quantity FROM product_tenders WHERE fname = ? AND supplier_status = 1");
          $stmt->bind_param('s', $_SESSION['admin']);
          $stmt->execute();
          $result = $stmt->get_result();
          while ($row = $result->fetch_assoc()) {
          echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['title']) . " (Qty: " . $row['quantity'] . ")</option>";
          }
          ?>
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Continue</button>
      </form>
      </div>
    </div>
    </section>
  </div>
  <?php include 'includes/footer.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
</body>
</html>

<?php
  exit();
}

$tender_id = $_POST['tender_id'];

// Get tender details
$stmt = $conn->prepare("SELECT * FROM product_tenders WHERE id = ?");
$stmt->bind_param('i', $tender_id);
$stmt->execute();
$result = $stmt->get_result();
$tender = $result->fetch_assoc();

if (!$tender) {
    $_SESSION['error'] = 'Request not found';
    header('Location: product_tenders.php');
    exit();
}

// Get distinct categories for materials
$categories = [];
$stmt = $conn->prepare("SELECT DISTINCT category FROM materials ORDER BY category");
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $categories[] = $row['category'];
}

include 'includes/header.php';
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h4>Request Materials for Production</h4>
      </section>

      <section class="content">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Request Materials from Recycler</h3>
          </div>
          <div class="box-body">
            <form action="" method="POST">
              <input type="hidden" name="tender_id" value="<?php echo $tender_id; ?>">
              
              <div class="form-group">
                <label>Product: <?php echo htmlspecialchars($tender['title']); ?></label>
              </div>
              
              <div class="form-group">
                <label>Quantity Needed: <?php echo htmlspecialchars($tender['quantity']); ?></label>
              </div>
              
              <div class="form-group">
                <label for="recycler_id">Select Recycler:</label>
                <select class="form-control" name="recycler_id" required>
                  <option value="">--Select Recycler--</option>
                  <?php
                  $stmt = $conn->prepare("SELECT fname, lname FROM bnote_cleaner WHERE status = 1");
                  $stmt->execute();
                  $result = $stmt->get_result();
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['fname'] . "'>" . $row['fname'] . " " . $row['lname'] . "</option>";
                  }
                  ?>
                </select>
              </div>
              
              <div class="form-group">
                <label>Select Required Materials:</label>
                <?php foreach ($categories as $category): ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"><?php echo htmlspecialchars($category); ?> Materials</h4>
                  </div>
                  <div class="panel-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th width="5%">Select</th>
                          <th width="30%">Material</th>
                          <th width="45%">Description</th>
                          <th width="10%">Unit</th>
                          <th width="10%">Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM materials WHERE category = ? ORDER BY name");
                        $stmt->bind_param('s', $category);
                        $stmt->execute();
                        $materials = $stmt->get_result();
                        
                        while ($material = $materials->fetch_assoc()):
                        ?>
                        <tr>
                          <td>
                            <input type="checkbox" name="material[<?php echo $material['id']; ?>]" value="1">
                          </td>
                          <td><?php echo htmlspecialchars($material['name']); ?></td>
                          <td><?php echo htmlspecialchars($material['description']); ?></td>
                          <td><?php echo htmlspecialchars($material['unit']); ?></td>
                          <td>
                            <input type="number" name="quantity[<?php echo $material['id']; ?>]" class="form-control" 
                                  min="0" step="0.01" value="0">
                          </td>
                        </tr>
                        <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
              
              <button type="submit" class="btn btn-primary">Submit Request</button>
            </form>
          </div>
        </div>
      </section>
    </div>
    <?php include 'includes/footer.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  
  <script>
  $(function() {
    // Enable/disable quantity fields based on checkbox selection
    $('input[type="checkbox"]').change(function() {
      var materialId = $(this).attr('name').match(/\d+/)[0];
      if ($(this).is(':checked')) {
        $('input[name="quantity[' + materialId + ']"]').prop('disabled', false).focus();
      } else {
        $('input[name="quantity[' + materialId + ']"]').prop('disabled', true).val('0');
      }
    });
    
    // Initially disable all quantity fields
    $('input[type="number"]').prop('disabled', true);
    
    // Form validation
    $('form').submit(function(e) {
      var valid = false;
      $('input[type="checkbox"]:checked').each(function() {
        var materialId = $(this).attr('name').match(/\d+/)[0];
        var qty = parseFloat($('input[name="quantity[' + materialId + ']"]').val());
        if (qty > 0) {
          valid = true;
          return false; // Break the each loop
        }
      });
      
      if (!valid) {
        e.preventDefault();
        alert('Please select at least one material with a quantity greater than 0.');
      }
    });
  });
  </script>
</body>
</html>