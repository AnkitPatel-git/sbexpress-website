<?php include('../core/int.php'); protect_page(); 
 $id = $user_data['user_id'];
      $get = mysqli_query($con, "select * from users where user_id = '$id'");
      $show = mysqli_fetch_array($get);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title> Change Photo | Rock India Learn And Earn</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../dist/css/font-awesome.min.css">
<link rel="stylesheet" href="../dist/css/ionicons.min.css">
<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="../formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

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
       Profile Photo
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
           <li class="active"> Profile Photo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

         <div class="row">
          <div class="col-md-8">
               <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"> Profile Photo</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form"  id="photo-form" action="../ajax/Update/Update-User-Photo.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
                       <label>Photo</label>
                        <input type="file" class="form-control file-styled"  name="photo" >
                        <input type ="hidden" name="id" value="<?php echo $id; ?>" >
                          <input type="hidden" name="img_id" value="<?php echo $show['Profile_Pic']?>">
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
          <div class="col-md-4">
               <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Profile Photo</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
               
                  <div class="box-body">
                     <img src="../dist/img/user-images/<?php echo $show['Profile_Pic']; ?>" class="img-responsive"  alt="">
                  </div>
                
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
<script>
$(document).ready(function() {

$('#alert').hide();
$('#photo-form')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
        
        photo: {
          validators: {
            file: {
              extension: 'jpeg,png,jpg',
              type: 'image/jpeg,image/png,image/jpg',
              maxSize: 2097152,   // 2048 * 1024
              message: 'The selected file is not valid'
            },
            notEmpty: {
              message: 'The Image is required'
            }
          }
        },

      }
    }).on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            var $form    = $(e.target),
                formData = new FormData(),
                params   = $form.serializeArray(),
                files    = $form.find('[name="photo"]')[0].files;

            $.each(files, function(i, file) {
                // Prefix the name of uploaded files with "uploadedFiles-"
                // Of course, you can change it to any string
                formData.append('photo', file);
            });

            $.each(params, function(i, val) {
                formData.append(val.name, val.value);
            });

    $.ajax({
         url: $form.attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
        beforeSend: function() {
          $('#photo-form button').html('<i class="fa fa-spinner fa-spin"></i>');
        },
        success: function(result) {
          $('#photo-form button').html('Save <i class="icon-arrow-right14 position-right"></i>');
          $('#alert').show('600');
          setTimeout(function(){ window.location.href = 'profile-photo.php' }, 1200);
        }
    });
  });



   


});
</script>
</body>
</html>
