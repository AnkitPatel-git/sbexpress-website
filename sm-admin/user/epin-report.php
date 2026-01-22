<?php include('../core/int.php'); protect_page(); 

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title> Report Epin | Rock India Learn And Earn</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../dist/css/font-awesome.min.css">
<link rel="stylesheet" href="../dist/css/ionicons.min.css">
<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="../formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">
<link rel="stylesheet" href="../plugins/footable/css/footable.bootstrap.min.css">
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
     Report Epin
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">E-pin</li>
           <li class="active"> Report Epin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

         <div class="row">
          
           <!-- /.col-md-6 -->
          <div class="col-md-12">
                  <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Basic Details</h3>
                   <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               
              </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-xs table-bordered " id="example1" data-paging="true" data-sorting="true" data-filtering="true">
                  <thead>
                    <tr class="bg-teal-400">
                      <th>#</th>
                      <th>E-Pin</th>
                      <th data-type="html" data-breakpoints="xs sm md">Price</th>
                        <th data-type="html" data-breakpoints="xs sm md">Product Name</th>
                        <th data-type="html" data-breakpoints="xs sm md">Date</th>
                         <th data-type="html" data-breakpoints="xs sm md">Time</th>
                          <th data-type="html" data-breakpoints="xs sm md">Used By</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $count = 1;
                  $id = $user_data['user_id'];
                  $get = mysqli_query($con, "select * from epin where Request = '$id'");
                  while ($show = mysqli_fetch_array($get)) { ?>
                    <tr>
                      <td><?php echo $count++; ?></td>
                      <td><?php echo $show['EPIN']; ?></td>
                      <td><i class="fa fa-rupee"></i> <?php echo $show['Price']; ?></td>
                      <td><?php 
                           $id = $show['P_ID'];  
                          echo Get_Product_Name($con, $id);
                      ?>
                      </td>
                       <td><?php echo $show['Date']; ?></td>
                       <td><?php echo $show['Time']; ?></td>
                       <td> 
                       <?php 
                          $id = $show['User_ID'];  
                          echo Get_User_Name($con, $id);
                       ?>
                       </td>
                    </tr>
                  <?php } ?>
                  </tbody>
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
 <script src="../formvalidation/vendor/formvalidation/js/formValidation.min.js"></script>
<script src="../formvalidation/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
<script src="../plugins/footable/js/footable.min.js"></script>
<script>
jQuery(function($){
    $('#example1').footable();
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
</body>
</html>
