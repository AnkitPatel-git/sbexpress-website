<?php  include('../../core/int.php');
$id = $_POST['id'];
$Date_of_Pick_Up =  $_POST['Date_of_Pick_Up'];
$Consignor_Name =  $_POST['Consignor_Name'];
$From_Location =  $_POST['From_Location'];
$Sender_Name =  $_POST['Sender_Name'];
$Sender_Department =  $_POST['Sender_Department'];
$Consignee_Name =  $_POST['Consignee_Name'];
$Destination =  $_POST['Destination'];
$Mode =  $_POST['Mode'];
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

if(!mysqli_query($con, "update tracking_details set Date_of_Pick_Up = '$Date_of_Pick_Up', Consignor_Name = '$Consignor_Name', From_Location = '$From_Location', Sender_Name = '$Sender_Name', Sender_Department = '$Sender_Department', Consignee_Name = '$Consignee_Name', Destination = '$Destination', Mode = '$Mode', SB_Ref_No = '$SB_Ref_No', Courier_Name = '$Courier_Name', Qty = '$Qty', Weight = '$Weight', Content = '$Content', L = '$L', B = '$B', H = '$H', Delivery_Date = '$Delivery_Date', Delivery_Time = '$Delivery_Time', Received_By = '$Received_By', Statu_Remarks = '$Statu_Remarks' where TD_ID = '$id'")) {
	echo 'Error :- '.mysqli_error($con);
}


?>


      
