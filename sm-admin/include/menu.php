 <?php $id = $user_data['user_id'];
      $get = mysqli_query($con, "select * from users where user_id = '$id'");
      $show = mysqli_fetch_array($get); ?>  
 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user_data['First_Name'].' '.$user_data['Last_Name']; ?></p>
        </div>
      </div>

      <!-- search form (Optional) -->
      
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Domestic Documentation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add-documentation.php"><i class="fa fa-circle-o"></i> Add Documentation</a></li>
            <li><a href="manage-documentation.php"><i class="fa fa-circle-o"></i> Manage Documentation</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Manage Tracking Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add-web-bill-no.php"><i class="fa fa-circle-o"></i> Add Tracking Details</a></li>
            <li><a href="add-tracking-details.php"><i class="fa fa-circle-o"></i> Upload Tracking Details</a></li>
            <li><a href="delivered-tracking-details.php"><i class="fa fa-circle-o"></i> Delivered Tracking Details</a></li>
            <li><a href="undelivered-tracking-details.php"><i class="fa fa-circle-o"></i> Undelivered Tracking Details</a></li>
          </ul>
        </li>
         <li ><a href="pickup-query.php"><i class="fa fa-dashboard"></i> <span> Pickup Request</span></a></li>
         <li ><a href="contact-query.php"><i class="fa fa-dashboard"></i> <span> Contact Request</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>