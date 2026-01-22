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

// Function to call the new API
function callTrackingAPI($awbNo) {
    $url = 'https://xpresion.sbexpresscargo.com/api/v1/Tracking/Tracking';
    $data = json_encode([
        'UserID' => 'CARD',
        'Password' => 'CARD',
        'AWBNo' => $awbNo
    ]);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data)
    ]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    // Check if API call was successful
    if ($httpCode == 200 && !empty($response) && empty($curlError)) {
        $result = json_decode($response, true);
        if ($result && isset($result['Response']) && 
            isset($result['Response']['ResponseCode']) && 
            $result['Response']['ResponseCode'] == 'RT01' &&
            isset($result['Response']['Tracking']) && 
            !empty($result['Response']['Tracking'])) {
            return $result['Response'];
        }
    }
    
    return null;
}

// Try API first
$apiData = callTrackingAPI($id);
$useAPI = ($apiData !== null);
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
$trackingFound = false;

if ($useAPI && isset($apiData['Tracking'][0])) {
    // Use API data
    $tracking = $apiData['Tracking'][0];
    $trackingFound = true;
    
    echo '<p style="font-size:14px"><b>Waybill No: ' . htmlspecialchars($tracking['AWBNo']) . '</b><br/>';
    
    if (!empty($tracking['Shipper_Name'])) {
        echo 'Customer Name: ' . htmlspecialchars($tracking['Shipper_Name']) . '<br/>';
    }
    
    if (!empty($tracking['BookingDate1'])) {
        echo 'Pickup Date: ' . htmlspecialchars($tracking['BookingDate1']) . ' ' . (!empty($tracking['BookTime']) ? htmlspecialchars($tracking['BookTime']) : '') . '<br/>';
    } elseif (!empty($tracking['BookingDate'])) {
        echo 'Pickup Date: ' . htmlspecialchars($tracking['BookingDate']) . '<br/>';
    }
    
    if (!empty($tracking['Origin'])) {
        echo 'From: ' . htmlspecialchars($tracking['Origin']) . '<br/>';
    }
    
    if (!empty($tracking['Destination'])) {
        echo 'To: ' . htmlspecialchars($tracking['Destination']) . '<br/>';
    }
    
    if (!empty($tracking['Consignee'])) {
        echo 'Consignee: ' . htmlspecialchars($tracking['Consignee']) . '<br/>';
    }
    
    if (!empty($tracking['Weight'])) {
        echo 'Weight: ' . htmlspecialchars($tracking['Weight']) . ' kg<br/>';
    }
    
    echo 'Status: <strong>' . htmlspecialchars($tracking['Status']) . '</strong><br/>';
    
    if (!empty($tracking['ExpectedDeliveryDate'])) {
        echo 'Expected Delivery Date: ' . htmlspecialchars($tracking['ExpectedDeliveryDate']) . '<br/>';
    }
    
    if (!empty($tracking['DeliveryDate1']) && !empty($tracking['DeliveryTime1'])) {
        echo 'Delivery Date: ' . htmlspecialchars($tracking['DeliveryDate1']) . ' ' . htmlspecialchars($tracking['DeliveryTime1']) . '<br/>';
    }
    
    if (!empty($tracking['ReceiverName'])) {
        echo 'Receiver Name: ' . htmlspecialchars($tracking['ReceiverName']) . '<br/>';
    }
    
    if (!empty($tracking['Remark'])) {
        echo 'Remark: ' . htmlspecialchars($tracking['Remark']) . '<br/>';
    }
    
    // POD Image handling
    if (!empty($tracking['PODImage']) && $tracking['PODImage'] != 'No') {
        echo 'POD Copy: <br/>
              <img src="' . htmlspecialchars($tracking['PODImage']) . '" 
                   alt="POD Image" 
                   style="width: auto; max-height: 500px;" /></p>';
    } else {
        echo 'POD Copy: Not available</p>';
    }
    
} else {
    // Fallback to database query
    $stmt = mysqli_prepare($con, "SELECT * FROM booking WHERE forwordingno = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        // Check if a matching record was found
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $bookingno = $row['id'];
            $trackingFound = true;
            
            echo '<p style="font-size:14px"><b>Waybill No: ' . htmlspecialchars($row['forwordingno']) . '</b><br/>
                  Customer Name: ' . htmlspecialchars($row['cust_name']) . '<br/>
                  Pickup Date: ' . htmlspecialchars($row['booking_date']) . '<br/>
                  From: ' . htmlspecialchars($row['pickuplocation']) . '<br/>
                  To: ' . htmlspecialchars($row['deliverylocation']) . '<br/>';

            // Additional query to fetch the expecteddeliverydate from the bookinglog table (using prepared statement)
            $logStmt = mysqli_prepare($con, "SELECT expecteddeliverydate FROM bookinglog WHERE bookingno = ? ORDER BY id DESC LIMIT 1");
            mysqli_stmt_bind_param($logStmt, "i", $bookingno);
            mysqli_stmt_execute($logStmt);
            $logResult = mysqli_stmt_get_result($logStmt);

            if ($logResult) {
                if (mysqli_num_rows($logResult) == 1) {
                    $logRow = mysqli_fetch_assoc($logResult);
                    $expectedDate = $logRow['expecteddeliverydate'];

                    // Format date to display only the date part (YYYY-MM-DD)
                    $formattedDate = $expectedDate ? date('Y-m-d', strtotime($expectedDate)) : 'Not set';

                    // Display status and formatted expected delivery date with one line break
                     echo 'Status: <strong>' . htmlspecialchars($row['status']) . '</strong><br/>
                          Expected Delivery Date: ' . htmlspecialchars($formattedDate) . '<br/>
                          POD Copy: <br/>
                          <img src="https://track.sbexpresscargo.com/storage/'.htmlspecialchars($row['pod']).'" 
                               alt="POD Image" 
                               style="width: auto; max-height: 500px;" /></p>';
                } else {
                     echo 'Status: <strong>' . htmlspecialchars($row['status']) . '</strong><br/>
                          Expected Delivery Date: Not available<br/>
                          POD Copy: <br/>
                          <img src="https://track.sbexpresscargo.com/storage/image/pod/2024/11/1732942364_1732940512_scouttrek.jpeg" 
                               alt="POD Image" 
                               style="width: auto; max-height: 500px;" /></p>';
                }

                // Free the result set for the log query
                mysqli_free_result($logResult);
                mysqli_stmt_close($logStmt);
            } else {
                echo 'Status: <strong>' . htmlspecialchars($row['status']) . '</strong></p>';
            }

        } else {
            echo '<p style="font-size:18px;color:red">No matching record found.</p>';
        }

        // Free the result set for the initial query
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
    } else {
        echo '<p style="font-size:18px;color:red">Database query failed: ' . htmlspecialchars(mysqli_error($con)) . '</p>';
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
if ($useAPI && isset($apiData['Events']) && !empty($apiData['Events'])) {
    // Use API Events data
    $events = $apiData['Events'];
    $index = 1;
    foreach ($events as $event) {
        $eventDate = !empty($event['EventDate1']) ? $event['EventDate1'] : (!empty($event['EventDate']) ? $event['EventDate'] : '-');
        $eventTime = !empty($event['EventTime1']) ? $event['EventTime1'] : (!empty($event['EventTime']) ? $event['EventTime'] : '');
        $location = !empty($event['Location']) ? htmlspecialchars($event['Location']) : '-';
        $status = !empty($event['Status']) ? htmlspecialchars($event['Status']) : '-';
        $remark = !empty($event['Remark']) ? htmlspecialchars($event['Remark']) : (!empty($event['FlightCode']) ? 'Flight: ' . htmlspecialchars($event['FlightCode']) : '-');
        
        echo '<tr>
                <td>' . $index . '</td>
                <td>' . $location . '</td>
                <td>' . $remark . '</td>
                <td>' . $status . '</td>
                <td>' . htmlspecialchars($eventDate) . ' ' . htmlspecialchars($eventTime) . '</td>
              </tr>';
        $index++;
    }
} elseif ($trackingFound && $bookingno > 0) {
    // Fallback to database query
    $logQueryStmt = mysqli_prepare($con, "SELECT * FROM bookinglog WHERE bookingno = ? ORDER BY id DESC");
    mysqli_stmt_bind_param($logQueryStmt, "i", $bookingno);
    mysqli_stmt_execute($logQueryStmt);
    $result = mysqli_stmt_get_result($logQueryStmt);

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
            echo '<tr><td colspan="5" style="text-align:center;color:#999;">No tracking events found.</td></tr>';
        }
        // Free the result set
        mysqli_free_result($result);
        mysqli_stmt_close($logQueryStmt);
    }
} else {
    echo '<tr><td colspan="5" style="text-align:center;color:#999;">No tracking information available.</td></tr>';
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
