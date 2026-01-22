 <?php $id = $user_data['user_id'];
      $get = mysqli_query($con, "select * from users where user_id = '$id'");
      $show = mysqli_fetch_array($get); ?>  
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user-images/<?php echo $show['Profile_Pic']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user_data['First_Name'].' '.$user_data['Last_Name']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="dashboard.php"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
       
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="edit-profile.php">Edit Profile</a></li>
             <li><a href="#">Welcome Letter</a></li>
             <li><a href="edit-password.php">Edit Password</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>E-Pin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="manage-epin.php">Manage Epin</a></li>
            <li><a href="epin-report.php">Report Epin</a></li>
             
          </ul>
        </li>
         <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Geneology</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="member-tree.php">Member Tree</a></li>
            <li><a href="geneology-report.php">Geneology Report</a></li>
            <li><a href="downline-list.php">Downline List</a></li>
             
          </ul>
        </li>
         <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Wallet</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="paid-payment-list.php">Paid Payment List</a></li>
            <li><a href="balance-payment-list.php">Balance Payment List</a></li>
            
             
          </ul>
        </li>
         <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Income Profit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="earning-date-wise.php">Earning Date Wise</a></li>
            <li><a href="relise-payment-report.php">Relise Payment Report</a></li>
             <li><a href="pending-payment.php">Pending Payment</a></li>
              <li><a href="tds-report.php">TDS Report</a></li>
               <li><a href="donation-report.php">Donation Report</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>