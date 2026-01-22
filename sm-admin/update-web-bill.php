<?php include 'core/int.php';
admin_protect();
protect_page();
$id = $_GET['id'];
$gettd = mysqli_query($con, "select * from tracking_details where TD_ID = '$id'");
$showtd = mysqli_fetch_array($gettd); 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Update Tracking Details | SB Cargo Express</title>
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
        Update Tracking Details
      </h1>

    </section>

    <!-- Main content -->
     <section class="content">
   <div class="row">

    <div class="col-md-12">
     <div class="box box-primary">
      <div class="box-header with-border">
       <h3 class="box-title">Update Tracking Details</h3>
       <a class="btn btn-xs btn-success btn-flat pull-right" href="<?php echo base64_decode($_GET['url']); ?>">Back</a>
      </div>
      <div class="box-body">

        <form id="webform" method="post" action="ajax/Update/Update-Web-Bill.php" class="form-horizontal">

          <div class="form-group">
              <label class="control-label col-md-3">Date of Pick Up</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Date_of_Pick_Up']; ?>" name="Date_of_Pick_Up" placeholder="Date of Pick Up"  />
                  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Consignor Name</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Consignor_Name']; ?>" name="Consignor_Name" placeholder="Consignor Name"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">From Location</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['From_Location']; ?>" name="From_Location" placeholder="From Location"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Sender Name</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Sender_Name']; ?>" name="Sender_Name" placeholder="Sender Name"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Sender Department</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Sender_Department']; ?>" name="Sender_Department" placeholder="Sender Department"  />
                </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Consignee Name</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Consignee_Name']; ?>" name="Consignee_Name" placeholder="Consignee Name"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Destination</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Destination']; ?>" name="Destination" placeholder="Destination"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Mode</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="Mode" value="<?php echo $showtd['Mode']; ?>" placeholder="Mode"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">SB Ref No</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['SB_Ref_No']; ?>" name="SB_Ref_No" placeholder="SB Ref No"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Courier Name</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Courier_Name']; ?>" name="Courier_Name" placeholder="Courier Name"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Qty</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Qty']; ?>" name="Qty" placeholder="Qty"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Weight</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Weight']; ?>" name="Weight" placeholder="Weight"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Content</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Content']; ?>" name="Content" placeholder="Content"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">L</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['L']; ?>" name="L" placeholder="L"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">B</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['B']; ?>" name="B" placeholder="B"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">H</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['H']; ?>" name="H" placeholder="H"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Delivery Date</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="Delivery_Date" value="<?php echo $showtd['Delivery_Date']; ?>" placeholder="Delivery Date"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Delivery Time</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Delivery_Time']; ?>" name="Delivery_Time" placeholder="Delivery Time"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Received By</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Received_By']; ?>" name="Received_By" placeholder="Received By"  />
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Status Remarks</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" value="<?php echo $showtd['Statu_Remarks']; ?>" name="Statu_Remarks" placeholder="Statu Remarks"  />
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
  
   $('#webform')
  .find('[name="Date_of_Pick_Up"]')
  .datepicker({
    changeMonth: true,
      changeYear: true,
      dateFormat: 'dd-mm-yy',
    
      onSelect: function(date, inst) {
          /* Revalidate the field when choosing it from the datepicker */
          $('#webform').formValidation('revalidateField', 'Date_of_Pick_Up');
      }
  });
  
  $('#webform')
  .find('[name="Delivery_Date"]')
  .datepicker({
    changeMonth: true,
      changeYear: true,
      dateFormat: 'dd-mm-yy',
    
      onSelect: function(date, inst) {
          /* Revalidate the field when choosing it from the datepicker */
          $('#webform').formValidation('revalidateField', 'Delivery_Date');
      }
  });

   $('#webform')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
       AWB_No: {
          validators: {
            notEmpty: {
              message: 'The AWB No is Required' 
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
          $('#webform button').html('<i class="fa fa-spinner fa-spin"></i>');
        },
        success: function(result) {
          $('#webform button').html(result);
          notr();
          setTimeout(function(){ location.reload() }, 1200);
        }
    });
  });

     

});
</script>

</body>
</html>
