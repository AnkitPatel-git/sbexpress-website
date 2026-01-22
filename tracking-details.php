<?php include 'sm-admin/core/int.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Tracking Details - SB Express Cargo LLp Courier </title>
<link rel="icon" type="image/x-icon" href="SB logo.ico">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'link.php'; ?>    
<style type="text/css">
  .track_dea { border: 1px solid #ddd; }
  .track_dea .panel-body { padding:10px; }
  .track_dea .panel-heading { background-color: #006db7; padding: 10px 20px; color: #fff; }
  .waybill_block label { width: 200px; display: table-cell;color: #555; }
  .waybill_block p { display: table-cell; color: #555;}
  .track_dea  .table, .track_dea  .table tr{padding:0px;border: 1px solid #555;color:#555;}
  .track_dea .table tr th, .track_dea .table tr td {padding: 1px 2px 1px 2px;}
  .track_dea .table tr th{color: #464545;font-weight: 600;}
</style>
    </head>
    
    <body>
    
        
         <?php include'header.php'; ?><!-- .header-wrapper end -->

        <!-- .page-title start -->
        


        <div class="page-content">
            <div class="container">
                <div class="">
                    <div class="col-md-12"  style="margin-top:100px">
                       
                        <div class="row">
                        <?php 
                        $track_ids = explode(",",$_GET['id']);
                          foreach ($track_ids as $track_id) { ?>
                            
                          

                        <?php } ?>
                        
                    <div class="col-md-6 col-lg-12">
                         
                         <iframe src="http://track.sbexpresscargo.com/tracking.aspx?txtawbno= <?php echo $_GET['id'] ?>" width="100%" height="500" border="0" scrolling="yes"></iframe>
                          
                       </div>
                    </div><!-- .col-md-6 end -->

                    <div class="col-md-12">
                       
                     </div>
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-content end -->  


        
     
        <br/><br/>
       <?php include'footer.php'; ?><!-- #footer-wrapper end -->

        <script src="js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
        <script src="js/bootstrap.min.js"></script><!-- .bootstrap script -->
        <script src="js/jquery.srcipts.min.js"></script><!-- modernizr, retina, stellar for parallax -->  
        <script src="js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
        <script src="style-switcher/styleSwitcher.js"></script><!-- styleswitcher script -->
        <script src="js/include.js"></script><!-- custom js functions -->
        <script src="footable/js/footable.min.js"></script>
        <script>
jQuery(function($){
    $('#example1').footable();
     
   
  });
</script>
    </body>


</html>
