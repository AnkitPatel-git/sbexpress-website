<?php include('../core/int.php'); protect_page(); 

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title> Manage Epin | Rock India Learn And Earn</title>
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
      Manage Epin
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">E-pin</li>
           <li class="active"> Manage Epin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

         <div class="row">
          <div class="col-md-6">
               <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Request E-Pin</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form"  id="epin_form" action="../ajax/Add/Add-User-Epin.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
                       <label>E-Pin</label>
                        <div id="add_epin"></div>
                    </div>

                     <div class="form-group">
                       <label>Price</label>
                       <select class="form-control" name="price">
                        <option value="">--select--</option>
                         <option value="199">Tutorial (Rs: 199) </option>
                          <option value="250">Tutorial + CD (Rs: 199 + 51)</option>
                      </select>
                    </div>
                  
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <div class="alert alert-success alert-dismissible" id="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     
                      Success ! Data Successfully Saved
                    </div>
                    <button type="submit" class="btn btn-warning pull-right" id="add">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.box -->
          </div>
           <!-- /.col-md-6 -->
          <div class="col-md-6">
                  <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Basic Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                   <div id="view_epin" ></div>
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
function Add_Epin() {
  $.ajax({
    type:"GET",
    url:"../ajax/View/View-Add-User-Epin.php",
    success: function(data) {
      $('#add_epin').html(data);
    }
  });
}
function View_Epin() {
  $.ajax({
    type:"GET",
    url:"../ajax/View/View-User-Epin.php",
    success: function(data) {
      $('#view_epin').html(data);
    }
  });
}
window.load = Add_Epin();
window.load = View_Epin();
$(document).ready(function() {
  $('#alert').hide();
  $('#epin_form')
        .formValidation({
            framework: 'bootstrap',
             excluded: [':disabled'],
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                price: {
                  validators: {
                    notEmpty: {
                      message: 'The Price is required'
                    }
                    
                  }
                },
                epin: {
                  verbose: false,
                      validators: {
                          notEmpty: {
                      message: 'The epin is required'
                      },
                      remote: {
                        message: 'The epin already exists',
                        url: '../ajax/check-epin.php',
                        type: 'POST',
                        delay: 200
                      }
                    }
                },
            }
        })
        .on('success.form.fv', function(e) {
                // Prevent form submission
                e.preventDefault();

                var $form = $(e.target),
                    fv    = $form.data('formValidation');

                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: $form.serialize(),
                    beforeSend: function() {
                      $('#epin_form button').html('<span class="icon-spinner4 spinner"></span>');
                    },
                    success: function(result) {
                      $('#epin_form button').html('Save <i class="icon-arrow-right14 position-right"></i>');
                      $('#alert').show(500);
                        $('#alert').fadeOut(1000);
                      $('#epin_form').data('formValidation').resetForm(true);
                      View_Epin();
                      Add_Epin();
                       
                      
                    }
                });
              });
});
</script>
</body>
</html>
