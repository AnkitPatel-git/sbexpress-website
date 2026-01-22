<?php include 'core/int.php';
admin_protect();
protect_page(); 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Manage Documentation | SB Cargo Express</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="dist/css/pnotify.custom.min.css">
<link rel="stylesheet" href="dist/css/jquery-ui.min.css">

<link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
<link rel="stylesheet" href="dist/css/footable.bootstrap.min.css">
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
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
       Manage Documentation
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Domestic Documentation</a></li>
        <li class="active">Manage Documentation</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
   <div class="row">

    <div class="col-md-12">
     <div class="box box-primary">
      <div class="box-header with-border">
       <h3 class="box-title">Manage Documentation</h3>
      </div>
      <div class="box-body">

      <table id="example1" data-paging="true" data-sorting="true" data-filtering="true" class="table table-bordered table-striped">
          <thead>
             <tr>
             <td>#</td>
             <th data-type="html">State</th>
              <th data-type="html" data-breakpoints="xs sm md ">Inbound Vat Forms</th>
              <th data-type="html" data-breakpoints="xs sm md ">Validity Form</th>
              <th data-type="html" data-breakpoints="xs sm md ">Entry Tax</th>
              <th data-type="html" data-breakpoints="xs sm md ">Octroi</th>
              <th data-type="html" data-breakpoints="xs sm md ">Outbound Vat Forms</th>
              <th data-type="html" data-breakpoints="xs sm md ">Remarks</th>
              <th data-type="html" data-breakpoints="xs sm md ">Action</th>
              </tr>
          </thead>
          <tbody>
          <?php $count = 1; 
          $get = mysqli_query($con,"select * from domestic_doc  ");
            while ($show = mysqli_fetch_array($get)) {   
          ?>
          <tr>
              <td><?php echo $count ++;?></td>
              <td><?php echo  $show['State'];?><br/><a style="font-size:12px" href="<?php echo  $show['Link'];?>" target="blank"><?php echo  $show['Link'];?></a></td>
              <td><?php echo  $show['IN_Vat'];?></td>
              <td><?php echo  $show['Validity_Form'];?></td>
              <td><?php echo  $show['Tax'];?></td>
              <td><?php echo  $show['Octroi'];?></td>
              <td><?php echo  $show['Out_Vat'];?></td>
              <td><?php echo  $show['Remark'];?></td>
              <td><a class="btn btn-sm btn-flat btn-danger" href="" data-toggle="modal" data-target="#DOC_Delete<?php echo $show[0]; ?>"><i class="fa fa-close fa-lg"></i></a>

                    <div class="modal" id="DOC_Delete<?php echo $show[0]; ?>">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-body" style="background-color:#ecf0f5; padding:0;">
                              
                              <div class="box box-primary">
                                  <div class="box-header with-border">
                                    <h3 class="box-title text-center"><?php echo $show['State']; ?></h3>
                                  </div>
                                  <div class="box-body">
                                    <h4 align="center"><i class="fa fa-trash"></i>&nbsp;Do You Want This Record</h4>
                                      <input type="hidden" value="<?php echo $show[0]; ?>" id="doc_id<?php echo $show[0]; ?>" />
                                      
                                  </div>
                                  <div class="box-footer">
                                      <button type="submit" id="delete_event<?php echo $show[0]; ?>" class="btn btn-primary">Yes</button>
                                      <button type="submit" data-dismiss="modal" class="btn btn-danger pull-right">No</button>
                                    </div>
                                </div>
                              <script>
                                $(document).ready(function() {
                                                        
                                  $('#delete_event<?php echo $show[0]; ?>').click(function() {
                                                            
                                    var ID = $('#doc_id<?php echo $show[0]; ?>').val();
                                    
                                    
                                    var dataDel = 'ID=' + ID ;
                                    
                                    $.ajax({
                                      type:"POST",
                                      url:"ajax/Delete/Delete-Documenation.php",
                                      data: dataDel,
                                      beforeSend: function() {
                                        $('#delete_event<?php echo $show[0]; ?>').html('<i class="fa fa-spinner fa-spin"></i>');
                                      },success: function() {
                                        $('#delete_event<?php echo $show[0]; ?>').html('Yes');
                                        setTimeout(function(){ window.location.href = "manage-documentation.php" }, 500);
                                      }
                                    });
                    
                                        });
                  
                                    });
                             </script>
                            </div>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                  </div>
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


<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="formvalidation/vendor/formvalidation/js/formValidation.min.js"></script>
<script src="formvalidation/vendor/formvalidation/js/framework\bootstrap.min.js"></script>
<script src="dist/js/pnotify.custom.min.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<script src="dist/js/footable.min.js"></script>
<script>
jQuery(function($){
    $('#example1').footable();
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>


</body>
</html>
