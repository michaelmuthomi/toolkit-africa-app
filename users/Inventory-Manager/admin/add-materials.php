<?php
include 'includes/session.php';
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
      <h1>
        Add New Material
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="materials.php">Materials</a></li>
        <li class="active">Add New</li>
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
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Material Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="material_add.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Material Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter material name" required>
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control" id="category" name="category" required>
                    <option value="">- Select Category -</option>
                    <option value="Metallic">Metallic</option>
                    <option value="Plastic">Plastic</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" name="description" placeholder="Enter material description" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="unit">Unit of Measurement</label>
                  <input type="text" class="form-control" id="unit" name="unit" placeholder="e.g. kg, liter, piece" required>
                </div>
                <div class="form-group">
                  <label for="stock_quantity">Initial Stock Quantity</label>
                  <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="0.00" min="0" step="0.01" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-save"></i> Save</button>
                <a href="materials.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
              </div>
            </form>
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