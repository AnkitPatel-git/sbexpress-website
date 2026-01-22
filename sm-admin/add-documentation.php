<?php include 'core/int.php';
admin_protect();
protect_page(); 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Add Documentaion | SB Cargo Express</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="dist/css/pnotify.custom.min.css">
<link rel="stylesheet" href="dist/css/jquery-ui.min.css">

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
        Add Documentation
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-link"></i> Domestic Documentation</a></li>
        <li class="active">Add Documentation</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
   <div class="row">

    <div class="col-md-12">
     <div class="box box-primary">
      <div class="box-header with-border">
       <h3 class="box-title">Add Documentation</h3>
      </div>
      <div class="box-body">

        <form id="documentation-form" method="post" action="ajax/Add/Add-Documentation.php" class="form-horizontal">

          <div class="form-group">
              <label class="control-label col-md-3">State</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="state" placeholder="Name Of State"  />
                </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-3">Link</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="link" placeholder="Name Of Website Link" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Inbound Vat Forms</label>
                <div class="col-md-5">
                    <textarea rows="4" class="form-control" name="in_vat"   placeholder="Inbound Vat Forms"></textarea>
                </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Validity Form</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="val_form"  placeholder="Validity Form"  />
                </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Entry Tax</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="tax" placeholder="Entry Tax"  />
                </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Octroi</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="octroi" placeholder="Octroi"  />
                </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Outbound Vat Forms</label>
                <div class="col-md-5">
                  <textarea rows="4" class="form-control" name="out_vat"  placeholder="Outbound Vat Forms" ></textarea>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Remarks</label>
                <div class="col-md-5">
                  <textarea rows="4" class="form-control" name="remarks" placeholder="Remarks"></textarea> 
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
  .find('[name="dob"]')
  .datepicker({
    changeMonth: true,
      changeYear: true,
      dateFormat: 'dd-mm-yy',
      yearRange: "1980:2015",
      onSelect: function(date, inst) {
          /* Revalidate the field when choosing it from the datepicker */
          $('#documentation-form').formValidation('revalidateField', 'dob');
      }
  });

  $('#documentation-form')
  .find('[name="doa"]')
  .datepicker({
    changeMonth: true,
      changeYear: true,
      dateFormat: 'dd-mm-yy',
      onSelect: function(date, inst) {
          /* Revalidate the field when choosing it from the datepicker */
          $('#documentation-form').formValidation('revalidateField', 'doa');
      }
  });

   $('#documentation-form')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
       state: {
          validators: {
            notEmpty: {
              message: 'The State Name is Required' 
            }
          }
        },
        invoice_re : {
          validators: {
            notEmpty: {
              message: 'The No of invoices reqd. is Required'  
            }
          }
        },
       cst_number : {
          validators: {
            notEmpty: {
              message: 'The Consignee ST & CST numbers reqd is Required'  
            }
          }
        },
        st_form : {
          
          validators: {
            notEmpty: {
              message: 'The Type of ST form/Permit is Required' 
            }
          }
        },
        tax : {
          validators: {
            notEmpty: {
              message: 'The Entry Tax Applicability is Required'  
            }
          }
        },
        octroi : {
          validators: {
            notEmpty: {
              message: 'The Applicability of Octroi is Required'  
            }
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
          setTimeout(function(){ window.location.href = 'add-documentation.php' }, 1200);
        }
    });
  });

     

});
</script>

</body>
</html>
