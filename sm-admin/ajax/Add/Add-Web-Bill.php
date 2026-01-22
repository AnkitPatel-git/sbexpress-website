<?php  include('../../core/int.php');
$Date_of_Pick_Up =  $_POST['Date_of_Pick_Up'];
$Consignor_Name =  $_POST['Consignor_Name'];
$From_Location =  $_POST['From_Location'];
$Sender_Name =  $_POST['Sender_Name'];
$Sender_Department =  $_POST['Sender_Department'];
$Consignee_Name =  $_POST['Consignee_Name'];
$Destination =  $_POST['Destination'];
$Mode =  $_POST['Mode'];
$AWB_No =  $_POST['AWB_No'];
$SB_Ref_No =  $_POST['SB_Ref_No'];
$Courier_Name =  $_POST['Courier_Name'];
$Qty =  $_POST['Qty'];
$Weight =  $_POST['Weight'];
$Content =  $_POST['Content'];
$L =  $_POST['L'];
$B =  $_POST['B'];
$H =  $_POST['H'];
$Delivery_Date =  $_POST['Delivery_Date'];
$Delivery_Time =  $_POST['Delivery_Time'];
$Received_By =  $_POST['Received_By'];
$Statu_Remarks =  $_POST['Statu_Remarks'];
mysqli_query($con, "INSERT INTO tracking_details(Date_of_Pick_Up, Consignor_Name, From_Location, Sender_Name, Sender_Department, Consignee_Name, Destination, Mode, AWB_No, SB_Ref_No, Courier_Name, Qty, Weight, Content, L, B, H, Delivery_Date, Delivery_Time, Received_By, Statu_Remarks) VALUES ('$Date_of_Pick_Up', '$Consignor_Name', '$From_Location', '$Sender_Name', '$Sender_Department', '$Consignee_Name', '$Destination', '$Mode', '$AWB_No', '$SB_Ref_No', '$Courier_Name', '$Qty', '$Weight', '$Content', '$L', '$B', '$H', '$Delivery_Date', '$Delivery_Time', '$Received_By', '$Statu_Remarks')");
mysqli_query($con, "INSERT INTO tracking_id(Track_ID) VALUES ('$AWB_No')");
 ?>
      
