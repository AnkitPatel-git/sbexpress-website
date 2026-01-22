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
<title> Edit Password | Rock India Learn And Earn</title>
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
       Edit Password
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
           <li class="active"> Edit Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

         <div class="row">
          <div class="col-md-6">
               <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Password</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form"  id="passform" action="../ajax/Update/Update-User-Password.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
                       <label>New password</label>
                        <input type="password" name="password" placeholder="Enter new password" class="form-control">
                        <input type="hidden" name="id" value="<?php echo $user_data['user_id'];?>">
                    </div>

                     <div class="form-group">
                       <label>Repeat password</label>
                      <input type="password" name="confirmpassword" placeholder="Repeat new password" class="form-control">
                    </div>
                  
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <div class="alert alert-success alert-dismissible" id="alert2">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     
                      Success ! Data Successfully Saved
                    </div>
                    <button type="submit" class="btn btn-warning pull-right" id="btn-pass">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.box -->
          </div>
           <!-- /.col-md-6 -->
          <div class="col-md-6">
               <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Username</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form  role="form"  id="userform" action="../ajax/Update/Update-User-Username.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
                       <label>Username</label>
                       <input type="text" name="username" placeholder="Username"  class="form-control">
                        <input type="hidden" name="id" value="<?php echo $user_data['user_id'];?>">
                    </div>
                  
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <div class="alert alert-success alert-dismissible" id="alert1">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     
                       Success ! Data Successfully Saved
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" id="btn-set">Submit</button>
                  </div>
                </form>
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

    var notr = function(){
    new PNotify({
        title: 'Success',
    text: 'Data Successfully Saved',
    type: 'success',
    });
  }

        
  
 $('#alert1').hide();  
  $('#alert2').hide();  
  
   $('#userform')
        .formValidation({
            framework: 'bootstrap',
      excluded: [':disabled'],
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
               username: {
                validators: {
                    remote: {
                        message: 'The username is not available',
                        url: '../ajax/check-username.php',
                        type: 'POST',
                        delay: 500 
                    },
                     notEmpty: {
                            message: 'The username is required'
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
          $('#btn-set').html('<i class="icon-spinner3 spinner"></i>');
        },
        success: function(result) {
           
          $('#btn-set').html('Submit');
            $('#alert1').show(500);
          setTimeout(function(){ window.location.href = "edit-password.php" }, 1200);
        }
            });
        });

    $('#passform')
        .formValidation({
            framework: 'bootstrap',
      excluded: [':disabled'],
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              
                password: {
            validators: {
                identical: {
                    field: 'confirmpassword',
                    message: 'The password and its confirm are not the same'
                },
                 notEmpty: {
                            message: 'The password is required'
                        }
            }
        },
        confirmpassword: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'The password and its confirm are not the same'
                },
                 notEmpty: {
                            message: 'The confirm password is required'
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
          $('#btn-pass').html('<i class="icon-spinner3 spinner"></i>');
        },
        success: function(result) {
         
          $('#btn-pass').html('Submit');
            $('#alert2').show(500);
          setTimeout(function(){ window.location.href = "edit-password.php" }, 1200);
        }
            });
        });
});
</script>
</body>
</html>
