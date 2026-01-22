
<!DOCTYPE html>
<html> 
<head>
        <title>Service Destination - SB Carogo LLP </title>
        <link rel="icon" type="image/x-icon" href="SB logo.ico">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php include 'link.php'; ?>   
        <?php include 'sm-admin/core/database.php';?>
    </head>
    
    <body>
      
    <?php include'header.php' ?>
       <!-- .header-wrapper end -->
 <!-- .page-title start -->
        <div class="page-title-style01 page-title-negative-top pt-bkg03">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                    <h1>Service Destination</h1>

<div class="breadcrumb-container">
    <ul class="breadcrumb clearfix">
        <!--<li>You are here:</li>-->
        <li>
            <a href="index.php">Home /</a>
         
            <a href="#">Service-destination </a>
        </li>
    </ul><!-- .breadcrumb end -->
</div><!-- .breadcrumb-container end -->
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-title-style01.page-title-negative-top end -->

  <div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="custom-heading">
                <h3>Check Pincode</h3>
            </div><!-- .custom-heading.left end -->
          
            <!-- .contact form start -->
            <form role="form" class="wpcf7 clearfix form-horzontal" method="post" action="service-destination.php">
                <div class="col-md-4"> 
                    <fieldset>
                        <div class="form-group">
                            <input type="text" class="wpcf7-text" name="search_pincode" placeholder="Search Pincode" id="pincode">
                        </div>
                    </fieldset>
                </div><!-- .col-md-4 end -->   
                <div class="col-md-1"> 
                    <fieldset>
                        <div class="form-group">
                            <button style="padding:10px 20px" type="submit" class="wpcf7-submit" id="getinfo">Search</button>
                        </div>
                    </fieldset>
                </div><!-- .col-md-1 end -->   
            </form><!-- .wpcf7 end -->
        </div><!-- .row end -->






          
                    <div class="col-md-12">
                        <div class="custom-heading">
                            <h2>Service Destination</h2>
                        </div><!-- .custom-heading end -->
                       <div class="col-md-12">
                            <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['search_pincode'])) {
 
        $zipcode =$_POST['search_pincode'];
        $query = "SELECT * FROM Pincode WHERE pincode =$zipcode LIMIT 1";
        $result = mysqli_query($con, $query);
             
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
               
                $row = mysqli_fetch_assoc($result);
           
               
               
                echo '<P style="font-size:16px"><b>Pincode No :' . $row['pincode'] . '</b><br/>
              Area :     ' . $row['area'] . '<br/>
              District :     ' . $row['district'] . '<br/>
              State  :      ' . $row['state'] . '</P>';
              
              echo '<table  class="table table-bordered table-striped"  id="example1">
                            <thead>
                               <tr>
                              
                                <th>Mode</th>
                                <th>Service Types</th>
                                <th>EDL KM</th>
                                <th>TAT</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr >
                                    <td>Air Mode</td>
                                    <td>' . $row['air-servie'] . '</td>
                                    <td>' . $row['edlkmair'] . '</td>
                                    <td>' . $row['tat-air'] . 'Hrs. </td>
                                </tr>
                                 <tr >
                                    <td>Surface Mode</td>
                                    <td>' . $row['surface-service'] . '</td>
                                    <td>' . $row['edlkmsurface'] . '</td>
                                    <td>' . $row['tat-surface'] . 'Hrs. </td>
                                </tr>
                                 <tr >
                                    <td>DP</td>
                                   
                                    <td>' . $row['dp-service'] . '</td>
                                     <td>NA</td>
                                    <td>' . $row['tatdp'] . 'Hrs. </td>
                                </tr>

                            </tbody>
                        </table>';
             
               
            } else {
           
                echo '<P style="font-size:14px">No records found</P>';
             
            }
            mysqli_free_result($result);
        } else {
            echo 'Error executing query: ' . mysqli_error($con);
        }
    }
    mysqli_close($con);
}
?>
                       
                       </div>
                    </div><!-- .col-md-6 end -->

                    
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-content end --> 

        <?php include'footer.php'; ?><!-- #footer-wrapper end -->
<!-- #footer-wrapper end -->

        <script src="js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
        <script src="js/bootstrap.min.js"></script><!-- .bootstrap script -->
        <script src="js/jquery.srcipts.min.js"></script><!-- modernizr, retina, stellar for parallax -->  
        <script src="owl-carousel/owl.carousel.min.js"></script><!-- Carousels script -->
        <script src="masterslider/masterslider.min.js"></script><!-- Master slider main js -->
        <script src="js/jquery.matchHeight-min.js"></script><!-- for columns with background image -->
        <script src="js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
        <script src="style-switcher/styleSwitcher.js"></script><!-- styleswitcher script -->
        <script src="js/include.js"></script><!-- custom js functions -->
        <script src="sm-admin/formvalidation/vendor/formvalidation/js/formValidation.min.js"></script>
<script src="sm-admin/formvalidation/vendor/formvalidation/js/framework\bootstrap.min.js"></script>
<script src="sm-admin/dist/js/pnotify.custom.min.js"></script>
<script src="sm-admin/dist/js/jquery-ui.min.js"></script>
<script src="footable/js/footable.min.js"></script>
   <script>
jQuery(function($){
    $('#example1').footable();
     
   
  });
  
</script>
  <!-- <script src="footable/js/footable.min.js"></script>
     
 <script type="text/javascript">
     $(document).ready(function() {
    
            $('#getinfo').click(function() {
                
               
                var id = $('#pincode').val();
                var dataString = 'id=' + id ;
                
                
                $.ajax({
                            type: "POST",
                            url:"sm-admin/ajax/getpincode.php",
                            data: dataString,
                            cache: false,
                            success: function(html)
                            {
                                $('#table').html(html);
                            }
                          
                    });
                $('#getinfo').attr('disabled','disabled');

                $('#pincode').keyup(function() {
                $('#getinfo').removeAttr('disabled');
                });
                
            });
            
           
           
            
});
 </script>        -->
    </body>


</html>
