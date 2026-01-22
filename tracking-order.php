<?php include 'sm-admin/core/database.php';?>
<?php
// Check if the "id" parameter is set in the URL
if (isset($_GET['id'])) {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
    

<head>
        <title>Tracking Order - SB Carogo LLP </title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php include 'link.php'; ?>    
    </head>
    
    <body>
      
    <?php include'header.php' ?>
       <!-- .header-wrapper end -->

         <div class="page-title-style01 page-title-negative-top pt-bkg08">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Tracking Request</h1>

                        <div class="breadcrumb-container">
                            <ul class="breadcrumb clearfix">
                                <li>You are here:</li>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#">Tracking Order </a>
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
                    <div class="col-md-6">
                        <div class="custom-heading">
                            <h3>Tracking Details</h3>
                        </div id="booking"><!-- .custom-heading.left end -->

<?php
$bookingno = 0;
// Query to fetch a single matching record from the "booking" table
$query = "SELECT * FROM booking WHERE forwordingno = '$id' LIMIT 1";

// Execute the query
$result = mysqli_query($con, $query);

if ($result) {
    // Check if a matching record was found
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $bookingno = $row['id'];
        echo '<p style="font-size:14px"><b>Waybill No: ' . $row['forwordingno'] . '</b><br/>
              Customer Name: ' . $row['cust_name'] . '<br/>
              Pickup Date: ' . $row['booking_date'] . '<br/>
              From: ' . $row['pickuplocation'] . '<br/>
              To: ' . $row['deliverylocation'] . '<br/>';

        // Additional query to fetch the expecteddeliverydate from the bookinglog table
        $logQuery = "SELECT expecteddeliverydate FROM bookinglog WHERE bookingno = '$bookingno' ORDER BY id DESC LIMIT 1";
        $logResult = mysqli_query($con, $logQuery);

        if ($logResult) {
            if (mysqli_num_rows($logResult) == 1) {
                $logRow = mysqli_fetch_assoc($logResult);
                $expectedDate = $logRow['expecteddeliverydate'];

                // Format date to display only the date part (YYYY-MM-DD)
                $formattedDate = $expectedDate ? date('Y-m-d', strtotime($expectedDate)) : 'Not set';

                // Display status and formatted expected delivery date with one line break
                 echo 'Status: ' . $row['status'] . '<br/>
                      Expected Delivery Date: ' . $formattedDate . '<br/>
                      POD Copy: <br/>
                      <img src="https://track.sbexpresscargo.com/storage/'.$row['pod'].'" 
                           alt="POD Image" 
                           style="width: auto; height: 500px;" /></p>';
            } else {
                 echo 'Status: ' . $row['status'] . '<br/>
                      Expected Delivery Date: Not available<br/>
                      POD Copy: <br/>
                      <img src="https://track.sbexpresscargo.com/storage/image/pod/2024/11/1732942364_1732940512_scouttrek.jpeg" 
                           alt="POD Image" 
                           style="width: auto; height: 500px;" /></p>';
            }

            // Free the result set for the log query
            mysqli_free_result($logResult);
        } else {
            echo 'Log query failed: ' . mysqli_error($con);
        }

    } else {
        echo '<p style="font-size:18px;color:red">No matching record found.</p>';
    }

    // Free the result set for the initial query
    mysqli_free_result($result);
} else {
    echo 'Initial query failed: ' . mysqli_error($con);
}
?>




                       
                    </div><!-- .col-md-6 end -->

                    <div class="col-md-6">
                        <div class="custom-heading">
                            <h3>Status And Scan</h3>
                        </div><!-- .custom-heading end -->
                        <div class="panel panel-default">
                        <div class="panel panel-heading">
                            <h5 class="panel-title" style="font-family: 'Open Sans', Arial, sans-serif;">Waybill No : <?php echo $id; ?></h5>
                        </div>
                        <div class="">
                            <table class="table  table-bordered " id="example1" >
                                <thead>
                                   
                                    <tr>
                                        <th data-type="html" >#</th>
                                        <th data-type="html" >Location</th>
                                         <th data-type="html" >Remark</th>
                                        <th data-type="html" data-breakpoints="xs sm md ">Status</th>
                                        <th data-type="html" data-breakpoints="xs sm md ">Date</th>
                                        <!--<th data-type="html" data-breakpoints="xs sm md ">Expected Delivery Time</th>-->
                                    </tr>
                                    
                                </thead>
                                <tbody>
<?php
                                    // Query to fetch matching records from the "booking" table
    $query = "SELECT * FROM bookinglog WHERE bookingno = '$bookingno' ORDER BY id DESC";

    // Execute the query
    $result = mysqli_query($con, $query);

    if ($result) {
        // Check if any matching records were found
        if (mysqli_num_rows($result) > 0) {
            $index = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                 echo '<tr>
                                        <td>' . $index . '</td> 
                                        <td>'.$row['currentstatus'].'</td>
                                         <td>'.$row['remark'].'</td>
                                        <td>'.$row['status'].'</td>
                                         <td>' . date('d-m-Y H:i:s', strtotime($row['deliverydate'])) . '</td>
                                      
                                        
                        </tr>';
                    $index++;
            }
        } 
        // Free the result set
        mysqli_free_result($result);
    } 
mysqli_close($con);
?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        
                    </div><!-- .col-md-6 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-content end -->
<?php include'footer.php'; ?>
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
<script src="js/footable.min.js"></script>
<script>
jQuery(function($){
    $('#example1').footable();
    
  });
</script>

        
    </body>


</html>
