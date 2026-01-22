<?php include 'core/int.php';
admin_protect();
protect_page(); 
$status = $_GET['status'];
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Manage Web Bill  | SB Express Cargo LLp Courier </title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="dist/css/pnotify.custom.min.css">
<link rel="stylesheet" href="dist/css/jquery-ui.min.css">

<link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
<link rel="stylesheet" href="plugins/footable/css/footable.bootstrap.min.css">

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
       Manage Tracking Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"> Manage Tracking Details</li>
        <?php if($status == 'delivered'){ ?>
        <li><a href="delivered-tracking-details.php"> Delivered Tracking Details</a></li>
        <?php } else if($status == 'undelivered'){ ?>
        <li><a href="undelivered-tracking-details.php"> Undelivered Tracking Details</a></li>
        <?php } ?>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
   <div class="row">

    <div class="col-md-12">
     <div class="box box-primary">
      <div class="box-header with-border">
       <h3 class="box-title"> Manage Web Bill</h3>
       <a style="margin-left: 20px;" class="btn btn-xs btn-success btn-flat pull-right" href="add-single-tracking-details.php?id=<?php echo $_GET['id']; ?>&url=<?php echo base64_encode('manage-tracking-details.php?id='.$_GET['id'].'&status='.$_GET['status']); ?>"><i class="fa fa-plus"></i> Add New Tracking Details</a>
       <?php if($status == 'delivered'){ ?>
        <a href="delivered-tracking-details.php" class="btn btn-xs btn-success btn-flat pull-right">Back</a>
        <?php } else if($status == 'undelivered'){ ?>
        <a href="undelivered-tracking-details.php" class="btn btn-xs btn-success btn-flat pull-right">Back</a>
        <?php } ?>
      </div>
      <div class="box-body">

          <table class="table table-bordered table-striped" data-sorting="true" data-filtering="true" data-paging="true" id="example1">
                    <thead>
                    <tr>
                      <th data-type="html" >#</th>
                        <th data-type="html" >Web Bill No</th>
                        <th data-type="html" data-breakpoints="xs sm md ">Pick Up Date</th>
                        <th data-type="html" data-breakpoints="xs sm md ">From</th>
                        <th data-type="html" data-breakpoints="xs sm md ">To</th>
                        <th data-type="html" data-breakpoints="xs sm md ">Delivery Date</th>
                        <th data-type="html" data-breakpoints="xs sm md ">Delivery Time</th>
                        <th data-type="html" data-breakpoints="xs sm md ">Status</th>
                        <th data-type="html" data-breakpoints="xs sm md ">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $id = $_GET['id'];
                      $get = mysqli_query($con, "select TD_ID,AWB_No,Date_of_Pick_Up,From_Location,Destination,Delivery_Date,Delivery_Time,Statu_Remarks from tracking_details where AWB_No = '$id' order by TD_ID desc");
                      $count = 1;
                      while ($show = mysqli_fetch_array($get)) {

                       ?>
                      <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $show['AWB_No'] ?></td>
                        <td><?php echo $show['Date_of_Pick_Up'] ?></td>
                        <td><?php echo $show['From_Location'] ?></td>
                        <td><?php echo $show['Destination'] ?></td>
                        <td><?php echo $show['Delivery_Date'] ?></td>
                        <td><?php echo $show['Delivery_Time'] ?></td>
                        <td><?php echo $show['Statu_Remarks'] ?></td>
                        <td>
                          <a onclick="viewdetails(<?php echo "'".$show['AWB_No']."'"; ?>)" class="btn btn-xs btn-flat btn-info">INFO</a>
                          <a class="btn btn-xs btn-flat btn-primary" href="update-web-bill.php?id=<?php echo $show[0]; ?>&url=<?php echo base64_encode('manage-tracking-details.php?id='.$_GET['id'].'&status='.$_GET['status']); ?>"><i class="fa fa-pencil"></i></a>
                          <a onclick="Delete_Track(<?php echo $show[0]; ?>)" class="btn btn-flat btn-xs btn-danger"><i class="fa fa-close"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                    </table>

      </div>
     </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div id="view_all_details"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
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

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="formvalidation/vendor/formvalidation/js/formValidation.min.js"></script>
<script src="formvalidation/vendor/formvalidation/js/framework\bootstrap.min.js"></script>
<script src="dist/js/pnotify.custom.min.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<script src="plugins/footable/js/footable.min.js"></script>
<script>
function Delete_Track(id) {
  var YES = confirm("do you want to delete this track details");
  if(YES) {
    $.ajax({
    type:"POST",
    url:"ajax/Delete/Delete-Track-Details.php",
    data:"ID="+id,
    success: function() {
      location.reload();
    }
  });
  }
  
}
function viewdetails(id) {
  $.ajax({
    type:"POST",
    url:"ajax/View/View-Single-Tracking-Details.php",
    data:"ID="+id,
    success: function(data) {
      $('#view_all_details').html(data);
      $('#myModal').modal('show');
    }
  });
}
jQuery(function($){
    $('#example1').footable();
  });
</script>
</body>
</html>
