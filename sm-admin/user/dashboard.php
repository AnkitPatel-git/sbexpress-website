<?php include('../core/int.php'); 
protect_page(); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Dashboard | Rock India Learn And Earn</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../dist/css/font-awesome.min.css">
<link rel="stylesheet" href="../dist/css/ionicons.min.css">
<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="../formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
 <?php include 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'include/menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Dashboard
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
     
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

     <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><i class="fa fa-inr"></i> <?php
                        $total = $user_data['user_id'];
                        level_matrix($total) ?></h3>

              <p>Total Earnings</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3><i class="fa fa-inr"></i> <?php
                        $total = $user_data['user_id'];
                        level_matrix($total) ?></h3>

              <p>Pending Payment</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>144</h3>

              <p>Send Email</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>365</h3>

              <p>TDS Report</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><i class="fa fa-inr"></i> <?php
                        $total = $user_data['user_id'];
                        level_matrix($total) ?></h3>

              <p>My Renewal</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3>345</h3>

              <p>Add New Member</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
          
           <!-- /.col-md-6 -->
          <div class="col-md-6">
                  <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $user_data['First_Name'].' '.$user_data['Last_Name']; ?></h3>
                   <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               
              </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-xs table-bordered text-center" id="example1" data-paging="true" data-sorting="true" data-filtering="true">
      <tr>
                <th>Sponsor ID</th>
                 <td>RILAN008</td>
              </tr>
              <tr>
                <th>Name</th>
                 <td><?php echo $user_data['First_Name'].' '.$user_data['Last_Name']; ?></td>
              </tr>
              <tr>
                <th>Mobile</th>
                <td>7738475225</td>
              </tr>
              <tr> 
                <th>Package Name</th>
                <td>Tally 9</td>
               </tr>
              <tr>
                <th>Date Of Joining</th>
                 <td>03-09-2016</td>
              </tr>
     </table>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
           <!-- /.col-md-6 -->
          
        </div>
         <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
 <?php include 'include/footer.php';?>

</div>

<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
</body>
</html>
