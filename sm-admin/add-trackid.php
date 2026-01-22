<?php include 'core/int.php';
admin_protect();
protect_page(); 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Manage Tracking Details | SB Cargo Express</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="dist/css/pnotify.custom.min.css">
<link rel="stylesheet" href="dist/css/jquery-ui.min.css">
<link rel="stylesheet" href="dist/css/footable.bootstrap.min.css">
<link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

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
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
   <div class="row">

    <div class="col-md-6">
     <div class="box box-primary">
      <div class="box-header with-border">
       <h3 class="box-title">Add Tracking ID</h3>
      </div>
      <div class="box-body">

        <form id="documentation-form" method="post" action="ajax/Add/Add-TrackID.php" class="form-horizontal">

          <div class="form-group">
              <label class="control-label col-md-3">Track ID</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="track_id" placeholder="Enter Track ID"  />
                </div>
            </div>
             
            <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-success" name="save">Save</button>
                </div>
            </div>
        </form>

      </div>
     </div>
    </div>

    <div class="col-md-6">
     <div class="box box-primary">
      <div class="box-header with-border">
       <h3 class="box-title">Manage Tracking Details</h3>
      </div>
      <div class="box-body">

        <table id="example1" data-paging="true" data-sorting="true" data-filtering="true" class="table table-bordered">
          <thead>
            <tr>
             <td class="text-center">#</td>
             <th data-type="html">Track ID</th>
             <th data-type="html">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $count = 1; 
          $get = mysqli_query($con,"select * from tackid");
            while ($show = mysqli_fetch_array($get)) {   
          ?>
          <tr>
              <td class="text-center"><?php echo $count ++;?></td>
              <td><?php echo  $show['Track_ID'];?></td>
              <td>
                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a>
                <a href="#" class="btn btn-warning btn-xs">ATD</a>
              </td>  
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

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="formvalidation/vendor/formvalidation/js/formValidation.min.js"></script>
<script src="formvalidation/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
<script src="dist/js/pnotify.custom.min.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<script src="dist/js/footable.min.js"></script>
<script>
$(document).ready(function(){

  var notr = function(){
    new PNotify({
        title: 'Success',
    text: 'Data Successfully Saved',
    type: 'success',
    });
  }


   $('#documentation-form')
        .formValidation({
            framework: 'bootstrap',
            excluded: [':disabled'],
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
            track_id: {
              verbose: false,
              validators: {
                  notEmpty: {
                      message: 'The track id is required'
                  },
                  remote: {
                      message: 'The track id already use',
                      url: 'ajax/check-trackid.php',
                      type: 'POST',
                      delay: 200
                  },
              }
          },
        }
    }).on('success.form.fv', function(e) {
            // Prevent form submission
    e.preventDefault();

    var $form = $(e.target),
        fv    = $form.data('formValidation');

    $.ajax({
        url: $form.attr('action'),
        type: 'POST',
        data: $form.serialize(),
        beforeSend: function() {
          $('#documentation-form button').html('red');
        },
        success: function(result) {
          $('#documentation-form button').html('Save');
          notr();
          setTimeout(function(){ location.reload() }, 1200);
        }
    });
  });

     

});
</script>

</body>
</html>
