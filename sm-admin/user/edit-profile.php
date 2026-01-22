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
<title>Edit Profile | Rock India Learn And Earn</title>
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
       Edit Profile
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
           <li class="active">Edit Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

         <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Profile information</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           
          </div>
        </div>
        <!-- /.box-header -->
         <form class="form-horizontal" id="adduserform" action="../ajax/Update/Update-User-Profile.php" method="post">
        <div class="box-body">
         
            <div class="row">
              <div class="col-md-6">
                 <fieldset class="content-group">
                  <legend class="text-bold">Basic Details</legend>

                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >First Name</label>
                    
                      <input type="text" class="form-control" value="<?php echo $show['First_Name']; ?>" name="first_name" placeholder="First  Name">
                      <input type="hidden" name="userid" value="<?php echo $id; ?>" />
                    </div>
                  </div>

                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >Last Name</label>
                    
                      <input type="text" class="form-control" value="<?php echo $show['Last_Name']; ?>" name="last_name" placeholder="Last  Name">
                   </div>
                  </div>
                  
                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >Email</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><?php echo $show['Email']; ?></span>
                      <input type="email" class="form-control" value="" name="email" placeholder="Email Address">
                    </div>
                   
                      
                    </div>
                  </div>

                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >Mobile No</label>
                    
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><?php echo $show['Mobile']; ?></span>
                      <input type="number" class="form-control" name="phone" placeholder="Mobile No.">
                    </div>
                    </div>
                   
                  </div>

                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >PAN No.</label>
                       <div class="input-group">
                      <span class="input-group-addon text-uppercase" id="basic-addon1"><?php echo $show['Pan_Card']; ?></span>
                     <input type="text" class="form-control text-uppercase" value="" name="pancard" placeholder="PAN Number">
                    </div>
                      
                    </div>
                  </div>

                </fieldset>
              </div>
              <!-- /.col-md-6 -->
               <div class="col-md-6">
                  <fieldset class="content-group">
                  <legend class="text-bold">Bank Details</legend>

                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >Account Name</label>
                 
                      <input type="text" class="form-control" value="<?php echo $show['Account_Name']; ?>" name="account_name" placeholder="Bank Account Name" >
                   </div>
                  </div>

                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >Bank Name</label>
                    
                      <input type="text" name="bank_name" value="<?php echo $show['Bank_Name']; ?>" class="form-control" placeholder="Bank Name">
                   </div>
                  </div>

                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >Branch</label>
                    
                      <input type="text" name="branch" value="<?php echo $show['Branch']; ?>" placeholder="Branch" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >Account Number</label>
                   
                      <input type="number" name="account_number" value="<?php echo $show['Account_Number']; ?>" placeholder="Account Number" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >IFSC Number</label>
                    
                      <input type="text" name="ifsc_number" value="<?php echo $show['IFSC_Number']; ?>" placeholder="IFSC Number" class="form-control">
                   </div>
                  </div>

                </fieldset>
              </div>
              <!-- /.col-md-6 -->
              <div class="col-md-6">
                 <fieldset class="content-group">
                  <legend class="text-bold">Contact Details</legend>

                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >State</label>
                    
                      <input type="text" class="form-control" value="<?php echo $show['State']; ?>" name="state" placeholder="State">
                    </div>
                  </div>
                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >City</label>
                    
                      <input type="text" class="form-control" value="<?php echo $show['City']; ?>" name="city" placeholder="City">
                   </div>
                  </div>
                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >Address</label>
                    
                      <textarea style="resize:vertical;"  class="form-control" name="address" placeholder="Address"><?php echo $show['Address']; ?></textarea>
                   </div>
                  </div>
                  
                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >Pin Code</label>
                    
                      <input type="number" class="form-control" value="<?php echo $show['Pincode']; ?>" name="pin" placeholder="Pin Code">
                   </div>
                  </div>
                </fieldset>
              </div>
                <!-- /.col-md-6 -->
              <div class="col-md-6">
                <fieldset class="content-group">
                  <legend class="text-bold">Miscellaneous Details</legend>

                  <div class="form-group">
                  <div class="col-lg-12">
                    <label >Nominee Name</label>
                    
                      <input type="text" class="form-control" value="<?php echo $show['Nominee_Name']; ?>" name="nominee_name" placeholder="Nominee Name">
                   </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-12">
                      <label >Nominee Relation</label>
                      <input type="text" class="form-control" value="<?php echo $show['Nominee_Relation']; ?>"  name="nominee_relation" placeholder="Nominee Relation">
                    </div>
                  </div>

                  
                  
                </fieldset>
              </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="row">
            <div class="col-md-10">
              <div class="callout callout-success" id="alert">
              <h4>Success!</h4>

              <p>Data Successfully Saved</p>
            </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary pull-right" name="save" id="add">Save <i class="icon-arrow-right14 position-right"></i></button>
            </div>
          </div>
            <!-- /.row -->
        </div>
       </form>
           <!-- /.form -->
      </div>
      <!-- /.box -->
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

    $('#alert').hide();    
   $('#adduserform')
        .formValidation({
            framework: 'bootstrap',
      excluded: [':disabled'],
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                first_name: {
                    validators: {
                        notEmpty: {
                            message: 'The first Name is required'
                        }
                    }
                },
                last_name: {
                    validators: {
                        notEmpty: {
                            message: 'The last Name is required'
                        }
                    }
                },
        email: {
                    validators: {
                      remote: {
                          message: 'The email address already exists',
                          url: '../ajax/check-email.php',
                          type: 'POST',
                          delay: 200
                        },
                        emailAddress: {
                            message: 'The value is not a valid email address'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
                    }
                },
        phone: {
          verbose: false,
                    validators: {
            remote: {
              message: 'The mobile number already exists',
              url: '../ajax/check-mobile.php',
              type: 'POST',
              delay: 200
            }
                    }
                },
                pancard: {
          verbose: false,
                    validators: {
            remote: {
              message: 'The pancard number already exists',
              url: '../ajax/check-pan-no.php',
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
          $('#add').html('<i class="icon-spinner3 spinner"></i>');
        },
        success: function(result) {
          
          $('#add').html('Submit');
           $('#alert').show(500);
          setTimeout(function(){ window.location.href = "edit-profile.php" }, 1200);
        }
            });
        });


   
});
</script>
</body>
</html>
