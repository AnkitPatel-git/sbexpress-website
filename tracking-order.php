<?php include 'sm-admin/core/database.php';?>
<?php include 'sm-admin/core/tracking-api.php';?>
<?php
// Check if the "id" parameter is set in the URL
if (isset($_GET['id'])) {
    if (!empty($_GET['id'])) {
        $id = trim($_GET['id']);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

// Prefer our DB: if AWB exists in our booking table, use only DB data
$bookingno = 0;
$id_escaped = mysqli_real_escape_string($con, $id);
$dbCheck = mysqli_query($con, "SELECT id FROM booking WHERE forwordingno = '$id_escaped' LIMIT 1");
$awbExistsInDb = ($dbCheck && mysqli_num_rows($dbCheck) === 1);
if ($awbExistsInDb) {
    $row = mysqli_fetch_assoc($dbCheck);
    $bookingno = (int) $row['id'];
    mysqli_free_result($dbCheck);
}

$useAPI = false;
$trackingData = null;
$eventsData = array();
$podImageUrl = null;

// Only use API when AWB does NOT exist in our database
if (!$awbExistsInDb) {
    $apiResponse = callTrackingAPI($id);
    $useAPI = hasValidTrackingData($apiResponse);
    if ($useAPI) {
        $trackingData = $apiResponse['Response']['Tracking'][0];
        $eventsData = $apiResponse['Response']['Events'] ?? array();
        $eventsData = array_reverse($eventsData);
        $podImageUrl = callPODImageAPI($id, 'A');
    }
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
                        </div><!-- .custom-heading.left end -->

<?php
if ($useAPI && $trackingData) {
    // Display data from API
    $track = $trackingData;
    echo '<p style="font-size:14px">';
    echo '<b>Waybill No: ' . htmlspecialchars($track['AWBNo'] ?? $id) . '</b><br/>';
    echo 'Consignee: ' . htmlspecialchars($track['Consignee'] ?? 'N/A') . '<br/>';
    echo 'Shipper Name: ' . htmlspecialchars($track['Shipper_Name'] ?? 'N/A') . '<br/>';
    echo 'Booking Date: ' . htmlspecialchars($track['BookingDate1'] ?? ($track['BookingDate'] ?? 'N/A')) . '<br/>';
    echo 'Origin: ' . htmlspecialchars($track['Origin'] ?? 'N/A') . '<br/>';
    echo 'Destination: ' . htmlspecialchars($track['Destination'] ?? 'N/A') . '<br/>';
    echo 'Status: <strong>' . htmlspecialchars($track['Status'] ?? 'N/A') . '</strong><br/>';
    
    if (!empty($track['ExpectedDeliveryDate'])) {
        echo 'Expected Delivery Date: ' . htmlspecialchars($track['ExpectedDeliveryDate']) . '<br/>';
    }
    
    if (!empty($track['DeliveryDate1'])) {
        echo 'Delivery Date: ' . htmlspecialchars($track['DeliveryDate1']) . '<br/>';
    }
    
    if (!empty($track['Weight'])) {
        echo 'Weight: ' . htmlspecialchars($track['Weight']) . ' kg<br/>';
    }
    
    if (!empty($track['ServiceName'])) {
        echo 'Service: ' . htmlspecialchars($track['ServiceName']) . '<br/>';
    }
    
    if (!empty($track['VendorAWBNo1'])) {
        echo 'Vendor AWB No: ' . htmlspecialchars($track['VendorAWBNo1']) . '<br/>';
    }
    
    if (!empty($track['Remark'])) {
        echo 'Remark: ' . htmlspecialchars($track['Remark']) . '<br/>';
    }
    
    // POD Image - from PODImage API first, then from tracking response
    $podSrc = $podImageUrl;
    if (empty($podSrc) && !empty($track['PODImage']) && $track['PODImage'] !== 'No') {
        $podSrc = $track['PODImage'];
    }
    if (!empty($podSrc)) {
        echo 'POD Copy: <br/>';
        echo '<img src="' . htmlspecialchars($podSrc) . '" alt="POD Image" style="max-width:100%; height: auto; max-height: 500px;" />';
    }
    
    echo '</p>';
} else {
    // Fallback to database query
    $id_escaped = mysqli_real_escape_string($con, $id);
    $query = "SELECT * FROM booking WHERE forwordingno = '$id_escaped' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Check if a matching record was found
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $bookingno = $row['id'];
            echo '<p style="font-size:14px"><b>Waybill No: ' . htmlspecialchars($row['forwordingno']) . '</b><br/>
                  Customer Name: ' . htmlspecialchars($row['cust_name']) . '<br/>
                  Pickup Date: ' . htmlspecialchars($row['booking_date']) . '<br/>
                  From: ' . htmlspecialchars($row['pickuplocation']) . '<br/>
                  To: ' . htmlspecialchars($row['deliverylocation']) . '<br/>';

            // Additional query to fetch the expecteddeliverydate from the bookinglog table
            $bookingno_escaped = mysqli_real_escape_string($con, $bookingno);
            $logQuery = "SELECT expecteddeliverydate FROM bookinglog WHERE bookingno = '$bookingno_escaped' ORDER BY id DESC LIMIT 1";
            $logResult = mysqli_query($con, $logQuery);

            if ($logResult) {
                if (mysqli_num_rows($logResult) == 1) {
                    $logRow = mysqli_fetch_assoc($logResult);
                    $expectedDate = $logRow['expecteddeliverydate'];

                    // Format date to display only the date part (YYYY-MM-DD)
                    $formattedDate = $expectedDate ? date('Y-m-d', strtotime($expectedDate)) : 'Not set';

                    // Display status and formatted expected delivery date with one line break
                     echo 'Status: ' . htmlspecialchars($row['status']) . '<br/>
                          Expected Delivery Date: ' . htmlspecialchars($formattedDate) . '<br/>
                          POD Copy: <br/>
                          <img src="https://track.sbexpresscargo.com/storage/'.htmlspecialchars($row['pod']).'" 
                               alt="POD Image" 
                               style="width: auto; height: 500px;" /></p>';
                } else {
                     echo 'Status: ' . htmlspecialchars($row['status']) . '<br/>
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
        echo '<p style="font-size:18px;color:red">Query failed: ' . mysqli_error($con) . '</p>';
    }
}
?>




                       
                    </div><!-- .col-md-6 end -->

                    <div class="col-md-6">
                        <div class="custom-heading">
                            <h3>Status And Scan</h3>
                        </div><!-- .custom-heading end -->
                        <div class="panel panel-default">
                        <div class="panel panel-heading">
                            <h5 class="panel-title" style="font-family: 'Open Sans', Arial, sans-serif;">Waybill No : <?php echo htmlspecialchars($id); ?></h5>
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
if ($useAPI && !empty($eventsData)) {
    // Display events from API
    $index = 1;
    foreach ($eventsData as $event) {
        $eventDate = $event['EventDate1'] ?? $event['EventDate'] ?? 'N/A';
        $eventTime = $event['EventTime1'] ?? $event['EventTime'] ?? '';
        $location = $event['Location'] ?? 'N/A';
        $status = $event['Status'] ?? 'N/A';
        
        // Format date and time
        $dateTime = $eventDate;
        if (!empty($eventTime)) {
            $dateTime .= ' ' . $eventTime;
        }
        
        echo '<tr>
                <td>' . $index . '</td>
                <td>' . htmlspecialchars($location) . '</td>
                <td>-</td>
                <td>' . htmlspecialchars($status) . '</td>
                <td>' . htmlspecialchars($dateTime) . '</td>
              </tr>';
        $index++;
    }
} else {
    // Fallback to database query
    if ($bookingno > 0) {
        // Query to fetch matching records from the "bookinglog" table
        $bookingno_escaped = mysqli_real_escape_string($con, $bookingno);
        $query = "SELECT * FROM bookinglog WHERE bookingno = '$bookingno_escaped' ORDER BY id DESC";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Check if any matching records were found
            if (mysqli_num_rows($result) > 0) {
                $index = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                     echo '<tr>
                                    <td>' . $index . '</td> 
                                    <td>' . htmlspecialchars($row['currentstatus']) . '</td>
                                     <td>' . htmlspecialchars($row['remark']) . '</td>
                                    <td>' . htmlspecialchars($row['status']) . '</td>
                                     <td>' . date('d-m-Y H:i:s', strtotime($row['deliverydate'])) . '</td>
                                  
                                    
                        </tr>';
                        $index++;
                }
            } else {
                echo '<tr><td colspan="5" style="text-align:center;color:red;">No tracking events found.</td></tr>';
            }
            // Free the result set
            mysqli_free_result($result);
        }
    } else {
        echo '<tr><td colspan="5" style="text-align:center;color:red;">No tracking information available.</td></tr>';
    }
}

if (!$useAPI) {
    mysqli_close($con);
}
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
