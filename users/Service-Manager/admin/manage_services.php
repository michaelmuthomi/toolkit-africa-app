<?php 
include 'includes/session.php'; 
include 'includes/slugify.php'; 
include 'includes/header.php'; 
include 'includes/conn.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

$users = $_SESSION['admin'];

// Fetch service data
$servicequery = "SELECT service_id, service_name, description, price, last_update, status FROM services";
$result = $conn->query($servicequery);

?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
  
  <div class="content-wrapper">
    <section class="content-header">
      <h4>Service Manager</h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

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
      ?>
     
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="h3 mb-4 text-gray-800">
                    <i class="fas fa-users"></i> Manage Services
                    <hr>
                </h1>
            </div>
        </div>
        <!-- Service Table -->
        <div class="row">
            <div class="col-lg-12">
                <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                <div class="alert alert-success">Service action completed successfully!</div>
                <?php endif; ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Service List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Service Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Last Updated</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            $status_button = $row['status'] == 0
                                                ? "<button class='btn btn-warning btn-sm status' data-id='{$row['service_id']}' data-status='1'>Unavailable</button>"
                                                : "<button class='btn btn-success btn-sm status' data-id='{$row['service_id']}' data-status='0'>Available</button>";

                                            echo "<tr id='row-{$row['service_id']}'>
                                                <td>{$counter}</td>
                                                <td>{$row['service_name']}</td>
                                                <td>{$row['description']}</td>
                                                <td>{$row['price']}</td>
                                                <td>{$row['last_update']}</td>
                                                <td>
                                                    <button class='btn btn-success btn-sm edit'
                                                        data-id='{$row['service_id']}'
                                                        data-name='{$row['service_name']}'
                                                        data-description='{$row['description']}'
                                                        data-price='{$row['price']}'>
                                                        <i class='fas fa-edit'></i> Edit
                                                    </button>

                                                    <button class='btn btn-danger btn-sm delete'
                                                        data-id='{$row['service_id']}'
                                                        data-name='{$row['service_name']}'>
                                                        <i class='fas fa-trash'></i> Delete
                                                    </button>
                                                    $status_button
                                                </td>
                                            </tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No services found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
  </div>

  <!-- Edit Service Modal -->
  <div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editCustomerModalLabel">Edit Service</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="editCustomerForm" action="update_service.php" method="post">
                      <input type="hidden" id="edit-id" name="id">
                      <div class="form-group">
                          <label for="edit-name">Service Name:</label>
                          <input type="text" class="form-control" id="edit-name" name="name" required>
                      </div>
                      
                      <div class="form-group">
                          <label for="edit-description">Description:</label>
                          <textarea class="form-control" id="edit-description" name="description" required></textarea>
                      </div>

                      <div class="form-group">
                          <label for="edit-price">Price:</label>
                          <input type="text" class="form-control" id="edit-price" name="price" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <!-- Delete Service Modal -->
  <div class="modal fade" id="deleteCustomerModal" tabindex="-1" role="dialog" aria-labelledby="deleteCustomerModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="deleteCustomerModalLabel">Delete Service</h5>
                  <button type="button" class="close" data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="deleteCustomerForm" action="delete_service.php" method="post">
                      <input type="hidden" id="delete-id" name="id">
                      <p>Are you sure you want to delete <span id="delete-customer-name"></span>?</p>
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script>
  $(document).ready(function() {
      // Edit button click handler
      $('.edit').on('click', function() {
          const id = $(this).data('id');
          const name = $(this).data('name');
          const description = $(this).data('description');
          const price = $(this).data('price');

          $('#edit-id').val(id);
          $('#edit-name').val(name);
          $('#edit-description').val(description);
          $('#edit-price').val(price);
          
          $('#editCustomerModal').modal('show');
      });

      // Delete button click handler
      $('.delete').on('click', function() {
          const id = $(this).data('id');
          const name = $(this).data('name');

          $('#delete-id').val(id);
          $('#delete-customer-name').text(name);

          $('#deleteCustomerModal').modal('show');
      });

      // Status button click handler
      $('.status').on('click', function() {
          const id = $(this).data('id');
          const newStatus = $(this).data('status');

          $.ajax({
              url: 'update_status.php',
              type: 'POST',
              data: { id: id, status: newStatus },
              success: function(response) {
                  if (response === 'success') {
                      location.reload();
                  } else {
                      alert('Failed to update status.');
                  }
              }
          });
      });
  });
  </script>
  <?php include 'includes/scripts.php'; ?>
  <?php include 'includes/footer.php'; ?>

</body>
</html>
