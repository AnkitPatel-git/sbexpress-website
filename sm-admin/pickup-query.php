<?php include 'core/int.php';
admin_protect();
protect_page(); 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Pickup Request| SB Cargo Express</title>
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
       Pickup Request
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pickup Request</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
   <div class="row">

    <div class="col-md-12">
     <div class="box box-primary">
      <div class="box-header with-border">
       <h3 class="box-title">Pickup Request</h3>
      </div>
      <div class="box-body">

      <table id="example1" data-paging="true" data-sorting="true" data-filtering="true" class="table table-bordered table-striped">
          <thead>
             <tr>
             <td>#</td>
             <th data-type="html">Requester Name</th>
              <th data-type="html" data-breakpoints="xs sm md ">Requester Company</th>
              <th data-type="html" data-breakpoints="xs sm md ">Requester Mobile</th>
              <th data-type="html" data-breakpoints="xs sm md ">Requester City  </th>
              <th data-type="html" data-breakpoints="xs sm md ">Pickup Company Name</th>
              <th data-type="html" data-breakpoints="xs sm md ">Pickup Address1 </th>
              <th data-type="html" data-breakpoints="xs sm md ">Pickup Address2</th>
              <th data-type="html" data-breakpoints="xs sm md ">Pickup City</th>
              <th data-type="html" data-breakpoints="xs sm md lg">Pickup Pincode</th>
              <th data-type="html" data-breakpoints="xs sm md lg">Pickup Contact Person</th>
              <th data-type="html" data-breakpoints="xs sm md lg">Pickup Mobile </th>
               <th data-type="html" data-breakpoints="xs sm md lg">Pickup Landline No.</th>
                <th data-type="html" data-breakpoints="xs sm md lg">Contents </th>
                 <th data-type="html" data-breakpoints="xs sm md lg">Quantity </th>
                  <th data-type="html" data-breakpoints="xs sm md lg">Value </th>
                   <th data-type="html" data-breakpoints="xs sm md lg">No. Of Boxes </th>
                    <th data-type="html" data-breakpoints="xs sm md lg"> Weight </th>
                     <th data-type="html" data-breakpoints="xs sm md lg">Dimensions </th>
                      <th data-type="html" data-breakpoints="xs sm md lg">Pickup Date </th>
                       <th data-type="html" data-breakpoints="xs sm md lg">Pickup Time </th>
              </tr>
          </thead>
          <tbody>
          <?php $count = 1; 
          $get = mysqli_query($con,"select * from pickup ");
            while ($show = mysqli_fetch_array($get)) {   
          ?>
          <tr>
              <td><?php echo $count ++;?></td>
              <td><a href="" data-toggle="modal" data-target="#myModal<?php echo $show[0]; ?>"><?php echo  $show['re_name'];?></a>

                       <!-- Modal -->
          <div class="modal fade" id="myModal<?php echo $show[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><?php echo  $show['re_name'];?></a></h4>
                </div>
                <div class="modal-body">
                 <table class="table table-bordered table-condensed" id="example2" >
                    <tr>
                      <th data-type="html" data-breakpoints=" ">Requester Name:</th>
                      <td data-type="html" data-breakpoints="xs sm md "><?php echo  $show['re_name'];?></td>
                    </tr>
                    <tr>
                      <th data-type="html" data-breakpoints=" ">Requester Company :</th>
                      <td data-type="html" data-breakpoints="xs sm md "><?php echo  $show['re_company'];?></td>
                    </tr>
                    <tr>
                      <th>Requester Phone No:</th>
                      <td><?php echo  $show['re_mobile'];?></td>
                    </tr>
                     <tr>
                      <th>Requester City:</th>
                      <td><?php echo  $show['re_city'];?></td>
                    </tr>
                    <tr>
                      <th>Pickup Company Name :</th>
                      <td><?php echo  $show['pi_company'];?></td>
                    </tr>
                 
                   <tr>
                      <th>Pickup Address1</th>
                      <td><?php echo  $show['pi_address1'];?></td>
                    </tr>
                     <tr>
                      <th>Pickup Address2</th>
                      <td><?php echo  $show['pi_address2'];?></td>
                    </tr>
                     <tr>
                      <th>Pickup Pincode:</th>
                      <td><?php echo  $show['pi_pincode'];?></td>
                    </tr>
                 
                    <tr>
                      <th>Pickup City / State :</th>
                      <td><?php echo  $show['pi_city'];?></td>
                    </tr>
                    <tr>
                      <th>Pickup Contact Person :</th>
                      <td><?php echo  $show['pi_person'];?></td>
                    </tr>
                     <tr>
                      <th>Pickup Mobile No :</th>
                      <td><?php echo  $show['pi_mobile'];?></td>
                    </tr>
                    <tr>
                      <th>Pickup Landline No :</th>
                      <td><?php echo  $show['pi_landline'];?></td>
                    </tr>
                       <tr>
                      <th>Content</th>
                      <td><?php echo  $show['content'];?></td>
                    </tr>
                     <tr>
                      <th>Quantity</th>
                      <td><?php echo  $show['quantity'];?></td>
                    </tr>
                     <tr>
                      <th>Value</th>
                      <td><?php echo  $show['valuee'];?></td>
                    </tr>
                    <tr>
                      <th>No. Of Boxes</th>
                      <td><?php echo  $show['pi_boxes'];?></td>
                    </tr>
                   
                   
                    <tr>
                      <th>Dimensions</th>
                      <td><?php echo  $show['dimensions'];?></td>
                    </tr>
                    <tr>
                      <th>Weight</th>
                      <td><?php echo  $show['weight'];?></td>
                    </tr>
                   
                    
                    <tr>
                      <th>Pickup Date</th>
                      <td><?php echo  $show['pi_date'];?></td>
                    </tr>
                    <tr>
                      <th>Pickup Time</th>
                      <td><?php echo  $show['pi_time'];?></td>
                    </tr>
                 </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 
                </div>
              </div>
            </div>
          </div>

              </td>
              <td><?php echo  $show['re_company'];?></td>
              <td><?php echo  $show['re_mobile'];?></td>
              <td><?php echo  $show['re_city'];?></td>
              <td><?php echo  $show['pi_company'];?></td>
              <td><?php echo  $show['pi_address1'];?></td>
              <td><?php echo  $show['pi_address2'];?></td>
              <td><?php echo  $show['pi_city'];?></td>
              <td><?php echo  $show['pi_pincode'];?></td>
              <td><?php echo  $show['pi_person'];?></td>
              <td><?php echo  $show['pi_mobile'];?></td>
              <td><?php echo  $show['pi_landline'];?></td>
              <td><?php echo  $show['content'];?></td>
              <td><?php echo  $show['quantity'];?></td>
              <td><?php echo  $show['value'];?></td>
              <td><?php echo  $show['pi_boxes'];?></td>
              <td><?php echo  $show['weight'];?></td>
              <td><?php echo  $show['dimensions'];?></td>
              <td><?php echo  $show['pi_date'];?></td>
              <td><?php echo  $show['pi_time'];?></td>
                
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
