<?php include('../core/int.php'); protect_page(); 

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title> Pending Payment | Rock India Learn And Earn</title>
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
  Pending Payment
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Wallet</li>
           <li class="active">Pending Payment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

         <div class="row">
          
           <!-- /.col-md-6 -->
          <div class="col-md-12">
                  <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Pending Payment</h3>
                   <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               
              </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-xs table-bordered text-center" id="example1" data-paging="true" data-sorting="true" data-filtering="true">
      <thead>
       <tr class="bg-teal-400 text-center">
        <th class="text-center">#</th>
        
        <th data-type="html" class="text-center">Sponsor ID</th>
        <th data-type="html" class="text-center">Name</th>
        <th data-type="html" class="text-center" data-breakpoints="xs sm md">Level</th>
        <th data-type="html" class="text-center" data-breakpoints="xs sm md">Amount</th>
        <th data-type="html" class="text-center" data-breakpoints="xs sm md">Date</th>
      
       </tr>
      </thead>
     <tbody>
      <tr>
       <td>1</td>
        <td>RILAN008</td>
        <td>Aditya Maurya</td>
        
        <td>1</td>
        <td><i class="fa fa-inr"></i> 20</td>
        <td>03-09-2016</td>
        </tr>
       
       <tr>
       <td>2</td>
        <td>RILAN009</td>
        <td>Suraj Maurya</td>
       
        <td>2</td>
         <td><i class="fa fa-inr"></i> 10</td>
        <td>01-09-2016</td>
        </tr>

        <tr>
       <td>3</td>
        <td>RILAN0010</td>
        <td>Sandeep Jha</td>
       
        <td>3</td>
         <td><i class="fa fa-inr"></i> 10</td>
        <td>03-08-2016</td>
        </tr>

        <tr>
       <td>4</td>
        <td>RILAN0013</td>
        <td>Vikas Jha</td>
       
        <td>3</td>
         <td><i class="fa fa-inr"></i> 10</td>
        <td>03-08-2016</td>
        </tr>

        <tr>
       <td>5</td>
        <td>RILAN0023</td>
        <td>Hitesh Sing</td>
       
        <td>1</td>
         <td><i class="fa fa-inr"></i> 10</td>
        <td>03-10-2016</td>
        </tr>

        <tr>
       <td>6</td>
        <td>RILAN002</td>
        <td>Rushikesh Awatade</td>
        
        <td>8</td>
        <td><i class="fa fa-inr"></i> 10</td>
        <td>03-06-2016</td>
        </tr>
        
       
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
