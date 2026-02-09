<?php
include 'includes/session.php';
include 'includes/header.php';
include 'includes/conn.php';
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
        Material Inventory
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Materials</li>
      </ol>
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
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="pull-right">
                <form method="POST" class="form-inline" action="materials.php">
                  <div class="form-group">
                    <label>Category: </label>
                    <select class="form-control input-sm" name="category">
                      <option value="all" <?php echo (isset($_POST['category']) && $_POST['category'] == 'all') ? 'selected' : ''; ?>>All</option>
                      <option value="Metallic" <?php echo (isset($_POST['category']) && $_POST['category'] == 'Metallic') ? 'selected' : ''; ?>>Metallic</option>
                      <option value="Plastic" <?php echo (isset($_POST['category']) && $_POST['category'] == 'Plastic') ? 'selected' : ''; ?>>Plastic</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm" name="filter"><i class="fa fa-filter"></i> Filter</button>
                </form>
              </div>
              <a href="add-materials.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New Material</a>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Stock Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sql = "SELECT * FROM materials";
                    if(isset($_POST['category']) && $_POST['category'] != 'all'){
                    $sql .= " WHERE category = '".$_POST['category']."'";
                    }
                    $sql .= " ORDER BY category, name";
                    
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                    $status = '';
                    if($row['stock_quantity'] <= 0){
                      $status = '<span class="label label-danger">Out of Stock</span>';
                    }
                    else if($row['stock_quantity'] < 10){
                      $status = '<span class="label label-warning">Low Stock</span>';
                    }
                    else{
                      $status = '<span class="label label-success">In Stock</span>';
                    }
                    
                    echo "
                      <tr>
                      <td>".$row['name']."</td>
                      <td>".($row['category'] == 'Metallic' ? 
                        '<span class="label label-primary">'.$row['category'].'</span>' : 
                        '<span class="label label-info">'.$row['category'].'</span>')."</td>
                      <td>".$row['description']."</td>
                      <td>".$row['unit']."</td>
                      <td>".$row['stock_quantity']."</td>
                      <td>".$status."</td>
                      <td>
                        <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                        
                      </td>
                      </tr>
                    ";
                    }
                  ?>
                  </tbody>
                </table>
                </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Material Stats -->
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Metallic Materials</h3>
            </div>
            <div class="box-body">
              <canvas id="metallicChart" style="height:250px"></canvas>
            </div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Plastic Materials</h3>
            </div>
            <div class="box-body">
              <canvas id="plasticChart" style="height:250px"></canvas>
            </div>
          </div>
        </div>
      </div>
      
    </section>
  </div>
  
  <?php include 'includes/footer.php'; ?>
  
  <!-- Edit Material Modal -->
  <div class="modal fade" id="edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>Edit Material</b></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="POST" action="material_edit.php">
            <input type="hidden" id="edit_id" name="id">
            <div class="form-group">
              <label for="edit_name" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_name" name="name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="edit_category" class="col-sm-3 control-label">Category</label>
              <div class="col-sm-9">
                <select class="form-control" id="edit_category" name="category" required>
                  <option value="Metallic">Metallic</option>
                  <option value="Plastic">Plastic</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="edit_description" class="col-sm-3 control-label">Description</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="edit_description" name="description"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="edit_unit" class="col-sm-3 control-label">Unit</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_unit" name="unit" required>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Adjust Stock Modal -->
  <div class="modal fade" id="adjust">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>Adjust Stock</b></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="POST" action="material_stock.php">
            <input type="hidden" id="stock_id" name="id">
            <div class="form-group">
              <label for="material_name" class="col-sm-3 control-label">Material</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="material_name" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="stock_current" class="col-sm-3 control-label">Current Stock</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="stock_current" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="stock_action" class="col-sm-3 control-label">Action</label>
              <div class="col-sm-9">
                <select class="form-control" id="stock_action" name="action" required>
                  <option value="add">Add to Stock</option>
                  <option value="subtract">Subtract from Stock</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="stock_quantity" class="col-sm-3 control-label">Quantity</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" id="stock_quantity" name="quantity" required min="0.01" step="0.01">
              </div>
            </div>
            <div class="form-group">
              <label for="stock_reason" class="col-sm-3 control-label">Reason</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="stock_reason" name="reason" required></textarea>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-primary btn-flat" name="adjust"><i class="fa fa-check-square-o"></i> Adjust</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    
    $.ajax({
      type: 'POST',
      url: 'material_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('#edit_id').val(response.id);
        $('#edit_name').val(response.name);
        $('#edit_category').val(response.category);
        $('#edit_description').val(response.description);
        $('#edit_unit').val(response.unit);
      }
    });
  });
  
  $(document).on('click', '.adjust', function(e){
    e.preventDefault();
    $('#adjust').modal('show');
    var id = $(this).data('id');
    
    $.ajax({
      type: 'POST',
      url: 'material_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('#stock_id').val(response.id);
        $('#material_name').val(response.name);
        $('#stock_current').val(response.stock_quantity);
      }
    });
  });

  // Chart data
  $.ajax({
    url: 'material_chart_data.php',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      // Metallic chart
      var metallicCtx = $('#metallicChart').get(0).getContext('2d');
      var metallicChart = new Chart(metallicCtx, {
        type: 'bar',
        data: {
          labels: data.metallic.labels,
          datasets: [{
            label: 'Stock Quantity',
            data: data.metallic.data,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
      
      // Plastic chart
      var plasticCtx = $('#plasticChart').get(0).getContext('2d');
      var plasticChart = new Chart(plasticCtx, {
        type: 'bar',
        data: {
          labels: data.plastic.labels,
          datasets: [{
            label: 'Stock Quantity',
            data: data.plastic.data,
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    },
    error: function(error) {
      console.log('Error loading chart data:', error);
    }
  });
});
</script>
</body>
</html>