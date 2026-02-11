<?php require_once('../config.php'); ?>
 <!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>
  <body class="layout-fixed layout-footer-fixed text-sm sidebar-mini control-sidebar-slide-open layout-navbar-fixed " data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
  <?php if($_settings->chk_flashdata('success')): ?>
  <script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
  </script>
  <?php endif; ?>
    <div class="wrapper">
     <?php require_once('inc/topBarNav.php') ?>
     <?php require_once('inc/navigation.php') ?>
              
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home';  ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 567.854px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
        <?php if($page == 'home'): ?>
        <!-- Dashboard Cards Navigation -->
        <div class="row">
          <div class="col-12">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-4 col-md-6">
            <div class="card bg-primary">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <i class="fas fa-tachometer-alt fa-3x text-white"></i>
              <div class="ml-3">
            <h4 class="text-white">Dashboard</h4>
            <p class="text-white mb-0">View your overview</p>
              </div>
            </div>
            <a href="./" class="stretched-link"></a>
          </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card bg-info">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <i class="fas fa-list fa-3x text-white"></i>
              <div class="ml-3">
            <h4 class="text-white">Lessons</h4>
            <p class="text-white mb-0">Browse available lessons</p>
              </div>
            </div>
            <a href="<?php echo base_url ?>student/?page=lesson" class="stretched-link"></a>
          </div>
            </div>
          </div>
        </div>
        <?php else: ?>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php 
$_p = explode("/",$page);
echo (isset($_p[1])) ? ucwords(str_replace("_", " ",$_p[1])) : ucwords(str_replace("_", " ",$_p[0])) ;
?></h1>
              </div>
              <!-- /.col -->
              <!-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="./admin?<?php echo $page ?>"><?php 
$_p = explode("/",$page);
echo (isset($_p[1])) ? ucwords(str_replace("_", " ",$_p[1])) : ucwords(str_replace("_", " ",$_p[0])) ;
?></a></li>
                  <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
              </div> -->
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <?php 
              if(!file_exists($page.".php") && !is_dir($page)){
                  include '404.html';
              }else{
                if(is_dir($page))
                  include $page.'/index.php';
                else
                  include $page.'.php';
              }
            ?>
          </div>
        </section>
        <!-- /.content -->
        <?php endif; ?>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- /.content -->
    
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="confirm_modal" role='dialog'>
      <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
        </div>
        <div class="modal-body">
          <div id="delete_content"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
      </div>
      <!-- /.content-wrapper -->
      <?php require_once('inc/footer.php') ?>
  </body>
</html>
