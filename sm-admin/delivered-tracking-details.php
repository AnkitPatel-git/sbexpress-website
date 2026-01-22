<?php include 'core/int.php';
admin_protect();
protect_page(); 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Delivered Web Bill  | SB Express Cargo LLp Courier </title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
<link rel="stylesheet" href="plugins/footable/css/footable.bootstrap.min.css">
<link rel="stylesheet" href="plugins/iCheck/all.css">
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
       Delivered Tracking Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"> Delivered Tracking Details</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
   <div class="row">

    <div class="col-md-12">
     <div class="box box-primary">
      <div class="box-header with-border">
       <h3 class="box-title"> Manage Web Bill</h3>
      </div>
      <div class="box-body">

        <?php 

            if(isset($_POST['newspublish'])) {
              if(isset($_POST['track_id'])) {
                foreach ($_POST['track_id'] as $news) {
                  mysqli_query($con, "delete from tracking_details where AWB_No = '$news'");
                  mysqli_query($con, "delete from tracking_id where Track_ID = '$news'");
                }
              }
            }

            ?>

          <form action="delivered-tracking-details.php" method="post">
            <button class="btn btn-flat btn-danger btn-sm pull-left" name="newspublish" style="margin-bottom: 10px" onclick="return confirm('Do you want to delete tracking details ?')">Delete All</button>
          <table class="table table-bordered table-striped" data-filtering="true" data-paging="true" id="example1">
                    <thead>
                    <tr>
                        <th data-type="html"><input type="checkbox" id="checkboxall" class="minimal"></th>
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
                      $get = mysqli_query($con, "select Track_ID from tracking_id order by Track_ID desc");
                      $count = 1;
                      while ($show = mysqli_fetch_array($get)) {
                      $id = $show['Track_ID'];
                      $gettd = mysqli_query($con, "select TD_ID,AWB_No,Date_of_Pick_Up,From_Location,Destination,Delivery_Date,Delivery_Time,Statu_Remarks from tracking_details where AWB_No = '$id' order by TD_ID desc LIMIT 1");
                      $showtd = mysqli_fetch_array($gettd);
                      if($showtd['Statu_Remarks'] == 'SHIPMENT DELIVERED' || $showtd['Statu_Remarks'] == 'DELIVERED' || $showtd['Statu_Remarks'] == 'delivered' || $showtd['Statu_Remarks'] == 'shipment delivered') {
                       ?>
                      <tr>
                        <td><input name="track_id[]" type="checkbox" class="checkboxboxid minimal" value="<?php echo $show['Track_ID']; ?>"></td>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $show['Track_ID'] ?></td>
                        <td><?php echo $showtd['Date_of_Pick_Up'] ?></td>
                        <td><?php echo $showtd['From_Location'] ?></td>
                        <td><?php echo $showtd['Destination'] ?></td>
                        <td><?php echo $showtd['Delivery_Date'] ?></td>
                        <td><?php echo $showtd['Delivery_Time'] ?></td>
                        <td><?php echo $showtd['Statu_Remarks'] ?></td>
                        <td>
                          <a onclick="viewalldetails(<?php echo "'".$show['Track_ID']."'"; ?>)" class="btn btn-flat btn-xs btn-info">INFO</a>
                          <a date-toggle="tooltip" title="view" class="btn btn-xs btn-flat btn-primary" href="manage-tracking-details.php?id=<?php echo $show['Track_ID']; ?>&status=delivered"><i style="padding-right: 10px;" class="fa fa-eye"></i>
                          <span style="font-size: 10px;" class="badge">
                            <?php
                            $getcount = mysqli_query($con, "select COUNT(*) from tracking_details where AWB_No = '$id'");
                            $showcount = mysqli_fetch_array($getcount);
                            echo $showcount['COUNT(*)'];
                             ?>
                          </span></a>
                          <a onclick="Delete_Track(<?php echo $show['Track_ID']; ?>)" class="btn btn-flat btn-xs btn-danger"><i class="fa fa-close"></i></a>
                        </td>
                      </tr>
                    <?php } } ?>
                    </tbody>
                    </table>
                    </form>
      </div>
     </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document" style="width: 90%;">
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
<script src="formvalidation/vendor/formvalidation/js/formValidation.min.js"></script>
<script src="formvalidation/vendor/formvalidation/js/framework\bootstrap.min.js"></script>
<script src="plugins/footable/js/footable.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
function Delete_Track(id) {
  var YES = confirm("do you want to delete this track details");
  if(YES) {
    $.ajax({
    type:"POST",
    url:"ajax/Delete/Delete-All-Track-Details.php",
    data:"ID="+id,
    success: function() {
      location.reload();
    }
  });
  }
  
}
function viewalldetails(id) {
  $.ajax({
    type:"POST",
    url:"ajax/View/View-All-Tracking-Details.php",
    data:"ID="+id,
    success: function(data) {
      $('#view_all_details').html(data);
      $('#myModal').modal('show');
    }
  });
}
jQuery(function($){
    $('#example1').footable();

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
    });

    $('#checkboxall').on('ifChecked', function(event) {
      $('.checkboxboxid').iCheck('check');
    });
    $('#checkboxall').on('ifUnchecked', function(event) {
        $('.checkboxboxid').iCheck('uncheck');
    });
    // Removed the checked state from "All" if any checkbox is unchecked
    $('#checkboxall').on('ifChanged', function(event){
        if(!this.changed) {
            this.changed=true;
            $('#checkboxall').iCheck('check');
        } else {
            this.changed=false;
            $('#checkboxall').iCheck('uncheck');
        }
        $('#checkboxall').iCheck('update');
    });

  });
</script>
</body>
</html>
