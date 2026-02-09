<header class="main-header">
  <!-- Logo -->
  <?php $users=$_SESSION['admin']; ?>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-fixed-top" style="background-color:#4682b4">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image"> Profile
            <span class="hidden-xs"><?php echo $user['fname']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
           <hr>
            <li class="user-footer">
              <!--<div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile"><b>Update My Profile</b></a>
              </div>-->
              <div style="text-align: center;">
               <a href="logout.php" class="btn btn-default btn-flat"><b>Sign out</b></a>
                </div>

            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>