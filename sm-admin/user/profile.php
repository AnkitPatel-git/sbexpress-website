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
<title>Profile | Rock India Learn And Earn</title>
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
        Profile
        <small>full details my profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
         <li class="active">My Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Basic Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                   <tr>
                              <th>Sponsor ID</th>
                              <td>RILAN008</td>
                            </tr>
                            <tr>
                              <th>Name</th>
                              <td><?php echo $user_data['First_Name'].' '.$user_data['Last_Name']; ?></td>
                            </tr>
                            <tr>
                              <th>Username</th>
                              <td><?php echo $show['Username']; ?></td>
                            </tr>
                            <tr>
                              <th>Email</th>
                              <td><?php echo $show['Email']; ?></td>
                            </tr>
                            <tr>
                              <th>Mobile</th>
                              <td><?php echo $show['Mobile']; ?></td>
                            </tr>
                            <tr>
                              <th>Pan No:</th>
                              <td class="text-uppercase"><?php echo $show['Pan_Card']; ?></td>
                            </tr>
                  </table>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title"> Miscellaneous Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                  <tr>
                          <th>Nominee Name</th>
                          <td><?php echo $show['Nominee_Name']; ?></td>
                        </tr>
                        <tr>
                          <th>Nominee Relation</th>
                          <td><?php echo $show['Nominee_Relation']; ?></td>
                        </tr>
                  </table>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>

          <div class="col-md-6">
             <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Bank Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                                          <tr>
                          <th>Account Name</th>
                          <td><?php echo $show['Account_Name']; ?></td>
                        </tr>
                        <tr>
                          <th>Bank Name</th>
                          <td><?php echo $show['Bank_Name']; ?></td>
                        </tr>
                        <tr>
                          <th>Branch</th>
                          <td><?php echo $show['Branch']; ?></td>
                        </tr>
                        <tr>
                          <th>Account Number</th>
                          <td><?php echo $show['Account_Number']; ?></td>
                        </tr>
                        <tr>
                          <th>IFSC Number</th>
                          <td><?php echo $show['IFSC_Number']; ?></td>
                        </tr>
                  </table>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

             <div class="box box-warning">
                <div class="box-header ">
                  <h3 class="box-title">Contact Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                   <tr>
                          <th>State</th>
                          <td><?php echo $show['State']; ?></td>
                        </tr>
                        <tr>
                          <th>City</th>
                          <td><?php echo $show['City']; ?></td>
                        </tr>
                        <tr>
                          <th>Address</th>
                          <td><?php echo $show['Address']; ?></td>
                        </tr>
                        <tr>
                          <th>Pin Code</th>
                          <td><?php echo $show['Pincode']; ?></td>
                        </tr>
                        
                  </table>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            
        </div>
      </div>

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
</body>
</html>
