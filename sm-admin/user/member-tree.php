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
<title> Member Tree | Rock India Learn And Earn</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../dist/css/font-awesome.min.css">
<link rel="stylesheet" href="../dist/css/ionicons.min.css">
<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="../formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">
<style type="text/css">
  .fixed-size { width: 90px; padding: 10px; margin-bottom: 0; }
  table tr td { padding: 20px 0 20px 0 !important;  }
  .fixed-size .label { margin-top: 10px; }
</style>
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
      Member Tree 
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
           <li class="active">Member Tree </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

         <div class="row">
          
          <div class="col-md-12">
               <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Profile Photo</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
               
                  <div class="box-body">
                    <div class="table-responsive">
        
        <table class="table table-bordered table-condensed">
        <tr>
          <td align="center" colspan="10">

            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    if(isset($_GET['ID'])) {
                      $ID = base64_decode($_GET['ID']);
                    } else {
                      $ID = $user_data['user_id'];
                    }
                    $SPID = 'RILAN00'.$ID;
                    echo '<a class="label label-success">'.Get_User_First_Name($con, $ID).'</a><br/>';
                    echo '<a href="member-tree.php?ID='.base64_encode($ID).'" class="label label-info">'.$SPID.'</a>';
                  ?>
                  </div>
                </div>
            </div>

          </td>
        </tr>

        <tr>
          <td align="center" colspan="3">
            
            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    $getone = mysqli_query($con, "select * from position_details where User_ID = '$ID' AND Sponser_ID = '$SPID' AND Position = 'Left'");
                    $showone = mysqli_fetch_array($getone);
                    if (empty($showone['Assign_User_ID'])) {
                      echo '<a href="add-user.php?ID='.$ID.'&Position=Left" class="label label-danger">Join Now</a><br/>';
                    } else {
                      echo '<a class="label label-success">'.Get_User_First_Name($con, $showone['Assign_User_ID']).'</a><br/>';
                      echo '<a href="member-tree.php?ID='.base64_encode($showone['Assign_User_ID']).'" class="label label-info">RILAN00'.$showone['Assign_User_ID'].'</a>';
                      $ONEID = $showone['Assign_User_ID'];
                      $ONESPID = 'RILAN00'.$ONEID;
                    }
                  ?>
                  </div>
                </div>
            </div>

          </td>

          <td align="center" colspan="3">
            
            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    $gettwo = mysqli_query($con, "select * from position_details where User_ID = '$ID' AND Sponser_ID = '$SPID' AND Position = 'Middle'");
                    $showtwo = mysqli_fetch_array($gettwo);
                    if (empty($showtwo['Assign_User_ID'])) {
                      echo '<a href="add-user.php?ID='.$ID.'&Position=Middle" class="label label-danger">Join Now</a><br/>';
                    } else {
                      echo '<a class="label label-success">'.Get_User_First_Name($con, $showtwo['Assign_User_ID']).'</a><br/>';
                      echo '<a href="member-tree.php?ID='.base64_encode($showtwo['Assign_User_ID']).'" class="label label-info">RILAN00'.$showtwo['Assign_User_ID'].'</a>';
                      $TWOID = $showtwo['Assign_User_ID'];
                      $TWOSPID = 'RILAN00'.$TWOID;
                    }
                  ?>
                  </div>
                </div>
            </div>

          </td>

          <td align="center" colspan="3">
            
            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    $getthree = mysqli_query($con, "select * from position_details where User_ID = '$ID' AND Sponser_ID = '$SPID' AND Position = 'Right'");
                    $showthree = mysqli_fetch_array($getthree);
                    if (empty($showthree['Assign_User_ID'])) {
                      echo '<a href="add-user.php?ID='.$ID.'&Position=Right" class="label label-danger">Join Now</a><br/>';
                    } else {
                      echo '<a class="label label-success">'.Get_User_First_Name($con, $showthree['Assign_User_ID']).'</a><br/>';
                      echo '<a href="member-tree.php?ID='.base64_encode($showthree['Assign_User_ID']).'" class="label label-info">RILAN00'.$showthree['Assign_User_ID'].'</a>';
                      $THREEID = $showthree['Assign_User_ID'];
                      $THREESPID = 'RILAN00'.$THREEID;
                    }
                  ?>
                  </div>
                </div>
            </div>

          </td>
        </tr>

        <tr>
          
          <td align="center">
            
            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    $getfour = mysqli_query($con, "select * from position_details where User_ID = '$ONEID' AND Sponser_ID = '$ONESPID' AND Position = 'Left'");
                    $showfour = mysqli_fetch_array($getfour);
                    if (empty($showfour['Assign_User_ID'])) {
                      echo '<a href="add-user.php?ID='.$ONEID.'&Position=Left" class="label label-danger">Join Now</a><br/>';
                    } else {
                      echo '<a class="label label-success ">'.Get_User_First_Name($con, $showfour['Assign_User_ID']).'</a><br/>';
                      echo '<a href="member-tree.php?ID='.base64_encode($showfour['Assign_User_ID']).'" class="label label-info">RILAN00'.$showfour['Assign_User_ID'].'</a>';
                    }
                  ?>
                  </div>
                </div>
            </div>

          </td>

          <td align="center">
            
            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    $getfive = mysqli_query($con, "select * from position_details where User_ID = '$ONEID' AND Sponser_ID = '$ONESPID' AND Position = 'Middle'");
                    $showfive = mysqli_fetch_array($getfive);
                    if (empty($showfive['Assign_User_ID'])) {
                      echo '<a href="add-user.php?ID='.$ONEID.'&Position=Middle" class="label label-danger">Join Now</a><br/>';
                    } else {
                      echo '<a class="label label-success">'.Get_User_First_Name($con, $showfive['Assign_User_ID']).'</a><br/>';
                      echo '<a href="member-tree.php?ID='.base64_encode($showfive['Assign_User_ID']).'" class="label label-info">RILAN00'.$showfive['Assign_User_ID'].'</a>';
                    }
                  ?>
                  </div>
                </div>
            </div>

          </td>

          <td align="center">
            
            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    $getsix = mysqli_query($con, "select * from position_details where User_ID = '$ONEID' AND Sponser_ID = '$ONESPID' AND Position = 'Right'");
                    $showsix = mysqli_fetch_array($getsix);
                    if (empty($showsix['Assign_User_ID'])) {
                      echo '<a href="add-user.php?ID='.$ONEID.'&Position=Right" class="label label-danger">Join Now</a><br/>';
                    } else {
                      echo '<a class="label label-success">'.Get_User_First_Name($con, $showsix['Assign_User_ID']).'</a><br/>';
                      echo '<a href="member-tree.php?ID='.base64_encode($showsix['Assign_User_ID']).'" class="label label-info">RILAN00'.$showsix['Assign_User_ID'].'</a>';
                    }
                  ?>
                  </div>
                </div>
            </div>

          </td>

          <td align="center">
            
            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    $getseven = mysqli_query($con, "select * from position_details where User_ID = '$TWOID' AND Sponser_ID = '$TWOSPID' AND Position = 'Left'");
                    $showseven = mysqli_fetch_array($getseven);
                    if (empty($showseven['Assign_User_ID'])) {
                      echo '<a href="add-user.php?ID='.$TWOID.'&Position=Left" class="label label-danger">Join Now</a><br/>';
                    } else {
                      echo '<a class="label label-success">'.Get_User_First_Name($con, $showseven['Assign_User_ID']).'</a><br/>';
                      echo '<a href="member-tree.php?ID='.base64_encode($showseven['Assign_User_ID']).'" class="label label-info">RILAN00'.$showseven['Assign_User_ID'].'</a>';
                    }
                  ?>
                  </div>
                </div>
            </div>

          </td>

          <td align="center">
            
            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    $geteight = mysqli_query($con, "select * from position_details where User_ID = '$TWOID' AND Sponser_ID = '$TWOSPID' AND Position = 'Middle'");
                    $showeight = mysqli_fetch_array($geteight);
                    if (empty($showeight['Assign_User_ID'])) {
                      echo '<a href="add-user.php?ID='.$TWOID.'&Position=Middle" class="label label-danger">Join Now</a><br/>';
                    } else {
                      echo '<a class="label label-success">'.Get_User_First_Name($con, $showeight['Assign_User_ID']).'</a><br/>';
                      echo '<a href="member-tree.php?ID='.base64_encode($showeight['Assign_User_ID']).'" class="label label-info">RILAN00'.$showeight['Assign_User_ID'].'</a>';
                    }
                  ?>
                  </div>
                </div>
            </div>

          </td>

          <td align="center">
            
            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    $getnine = mysqli_query($con, "select * from position_details where User_ID = '$TWOID' AND Sponser_ID = '$TWOSPID' AND Position = 'Right'");
                    $shownine = mysqli_fetch_array($getnine);
                    if (empty($shownine['Assign_User_ID'])) {
                      echo '<a href="add-user.php?ID='.$TWOID.'&Position=Right" class="label label-danger">Join Now</a><br/>';
                    } else {
                      echo '<a class="label label-success">'.Get_User_First_Name($con, $shownine['Assign_User_ID']).'</a><br/>';
                      echo '<a href="member-tree.php?ID='.base64_encode($shownine['Assign_User_ID']).'" class="label label-info">RILAN00'.$shownine['Assign_User_ID'].'</a>';
                    }
                  ?>
                  </div>
                </div>
            </div>

          </td>

          <td align="center">
            
            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    $getten = mysqli_query($con, "select * from position_details where User_ID = '$THREEID' AND Sponser_ID = '$THREESPID' AND Position = 'Left'");
                    $showten = mysqli_fetch_array($getten);
                    if (empty($showten['Assign_User_ID'])) {
                      echo '<a href="add-user.php?ID='.$THREEID.'&Position=Left" class="label label-danger">Join Now</a><br/>';
                    } else {
                      echo '<a class="label label-success">'.Get_User_First_Name($con, $showten['Assign_User_ID']).'</a><br/>';
                      echo '<a href="member-tree.php?ID='.base64_encode($showten['Assign_User_ID']).'" class="label label-info">RILAN00'.$showten['Assign_User_ID'].'</a>';
                    }
                  ?>
                  </div>
                </div>
            </div>

          </td>

          <td align="center">
            
            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    $geteleven = mysqli_query($con, "select * from position_details where User_ID = '$THREEID' AND Sponser_ID = '$THREESPID' AND Position = 'Middle'");
                    $showeleven = mysqli_fetch_array($geteleven);
                    if (empty($showeleven['Assign_User_ID'])) {
                      echo '<a href="add-user.php?ID='.$THREEID.'&Position=Middle" class="label label-danger">Join Now</a><br/>';
                    } else {
                      echo '<a class="label label-success">'.Get_User_First_Name($con, $showeleven['Assign_User_ID']).'</a><br/>';
                      echo '<a href="member-tree.php?ID='.base64_encode($showeleven['Assign_User_ID']).'" class="label label-info">RILAN00'.$showeleven['Assign_User_ID'].'</a>';
                    }
                  ?>
                  </div>
                </div>
            </div>

          </td>

          <td align="center">
            
            <div class="panel panel-body fixed-size">
                <div class="media">
                  <div class="media">
                      <img src="../dist/img/users.png" style="width: 40px; height: 40px;" class="img-cicle" alt="">
                  </div>
                  <div class="media-body">
                  <?php 
                    $gettwele = mysqli_query($con, "select * from position_details where User_ID = '$THREEID' AND Sponser_ID = '$THREESPID' AND Position = 'Right'");
                    $showtwele = mysqli_fetch_array($gettwele);
                    if (empty($showtwele['Assign_User_ID'])) {
                      echo '<a href="add-user.php?ID='.$THREEID.'&Position=Right" class="label label-danger">Join Now</a><br/>';
                    } else {
                      echo '<a class="label label-success">'.Get_User_First_Name($con, $showtwele['Assign_User_ID']).'</a><br/>';
                      echo '<a href="member-tree.php?ID='.base64_encode($showtwele['Assign_User_ID']).'" class="label label-info">RILAN00'.$showtwele['Assign_User_ID'].'</a>';
                    }
                  ?>
                  </div>
                </div>
            </div>

          </td>

        </tr>

      </table>

      </div>
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

</body>
</html>
