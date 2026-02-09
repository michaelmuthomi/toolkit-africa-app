<?php include 'includes/config1.php'; ?> 
<?php include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!--<h4>
        Customer Panel
      </h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>-->
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
      
      <!-- MENU SECTION END-->
      <div class="row pad-botm">
        <div class="col-md-4">
          <h4><font color="black">THE AVAILABLE SERVICES.</font></h4>
        </div>
        <div class="col-md-4">
          <input type="text" id="serviceSearch" class="form-control" placeholder="Search services...">
        </div>
        <div class="container">
          <button class="btn btn-sm btn-success">
            <a href="register.php"><font color="white"><i class="fa fa-receipt"></i>&nbsp;Register</font></a>
          </button>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th><font color="green">Service Name</font></th>
                      <th><font color="green">Price </font></th>
                      <th><font color="green">Description</font></th> 
                      <th><font color="green">Status</font></th>  
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT * FROM services";
                      $query = $dbh->prepare($sql);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;
                      if($query->rowCount() > 0) {
                        foreach($results as $result) {
                    ?>                                      
                    <tr class="odd gradeX">
                      <td class="center"><?php echo htmlentities($cnt); ?></td>                                     
                      <td class="center"><?php echo htmlentities($result->service_name); ?></td>
                      <td class="center"><?php echo htmlentities($result->price); ?></td>
                      <td class="center"><?php echo htmlentities($result->description); ?></td>
                      <td class="center">
                        <?php
                          if($result->status == 1) {
                            echo htmlentities("Available");
                          } else {
                            echo htmlentities("Unavailable");
                          }
                        ?>
                      </td>
                    </tr>
                    <?php 
                        $cnt++;
                        }
                      } 
                    ?>                                      
                  </tbody>
                </table>
              </div>
              <!--<button class="btn btn-sm btn-primary"><a href="home.php"><font color="white">Back</font></a></button>-->
            </div>
          </div>
          <!--End Advanced Tables -->
        </div>
      </div>
      <!-- CONTENT-WRAPPER SECTION END-->
    </section>
    <!-- right col -->
</div>
  
  <?php include 'includes/footer.php'; ?>
  
</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>


<script>
// Search and sort services table
document.addEventListener('DOMContentLoaded', function() {
  var input = document.getElementById('serviceSearch');
  var table = document.getElementById('dataTables-example');
  var tbody = table.getElementsByTagName('tbody')[0];
  var rows = Array.from(tbody.getElementsByTagName('tr'));

  input.addEventListener('input', function() {
    var filter = input.value.toLowerCase();
    var filteredRows = rows.filter(function(row) {
      return row.textContent.toLowerCase().indexOf(filter) > -1;
    });
    // Sort filtered rows alphabetically by service name (2nd column)
    filteredRows.sort(function(a, b) {
      var nameA = a.cells[1].textContent.toLowerCase();
      var nameB = b.cells[1].textContent.toLowerCase();
      if(nameA < nameB) return -1;
      if(nameA > nameB) return 1;
      return 0;
    });
    // Remove all rows
    while (tbody.firstChild) tbody.removeChild(tbody.firstChild);
    // Add filtered and sorted rows
    filteredRows.forEach(function(row) {
      tbody.appendChild(row);
    });
  });
});
</script>

</body>
</html>
