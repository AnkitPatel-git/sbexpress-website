<?php include 'core/int.php';
admin_protect();
protect_page(); 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Contact Request| SB Cargo Express</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="dist/css/pnotify.custom.min.css">
<link rel="stylesheet" href="dist/css/jquery-ui.min.css">

<link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
<link rel="stylesheet" href="dist/css/footable.bootstrap.min.css">
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
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
  <?php include'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include'include/menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Contact Request
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Contact Request</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
   <div class="row">

    <div class="col-md-12">
     <div class="box box-primary">
      <div class="box-header with-border">
       <h3 class="box-title">Contact Request</h3>
      </div>
      <div class="box-body">

      <table id="example1" data-paging="true" data-sorting="true" data-filtering="true" class="table table-bordered table-striped">
          <thead>
             <tr>
             <td>#</td>
             <th data-type="html">Full Name</th>
              <th data-type="html" data-breakpoints="xs sm md ">Mobile</th>
              <th data-type="html" data-breakpoints="xs sm md ">Email</th>
              <th data-type="html" data-breakpoints="xs sm md ">Message  </th>
              <th data-type="html" data-breakpoints="xs sm md ">Time</th>
              
              </tr>
          </thead>
          <tbody>
          <?php $count = 1; 
          $get = mysqli_query($con,"select * from contact ");
            while ($show = mysqli_fetch_array($get)) {   
          ?>
          <tr>
              <td><?php echo $count ++;?></td>
              <td><?php echo  $show['Name'];?></td>
              <td><?php echo  $show['Mobile'];?></td>
              <td><?php echo  $show['Email'];?></td>
              <td><?php echo  $show['Message'];?></td>
              <td><?php echo  $show['Time'];?></td>
             
                
          </tr>
          <?php } ?>
          </tbody>
      </table>

      </div>
     </div>
    </div>




   </div>
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include'include/footer.php'; ?>

</div>


<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="formvalidation/vendor/formvalidation/js/formValidation.min.js"></script>
<script src="formvalidation/vendor/formvalidation/js/framework\bootstrap.min.js"></script>
<script src="dist/js/pnotify.custom.min.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<script src="dist/js/footable.min.js"></script>
<script>
jQuery(function($){
    $('#example1').footable();
     $('#example2 ').footable();
  });
</script>


</body>
</html>
