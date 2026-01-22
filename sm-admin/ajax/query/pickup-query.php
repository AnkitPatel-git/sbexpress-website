<?php  include('../../core/int.php');  

$re_name = $_POST['requester_name'];
$re_company = $_POST['requester_company'];
$re_mobile = $_POST['requester_mobile'];
$re_city = $_POST['requester_city'];
$pi_company = $_POST['pickup_company'];
$pi_address1 = $_POST['pickup_address1'];
$pi_address2 = $_POST['pickup_address2'];
$pi_city = $_POST['pickup_city'];
$pi_pincode = $_POST['pickup_pincode'];
$pi_person = $_POST['pickup_person'];
$pi_mobile = $_POST['pickup_mobile'];
$pi_landline = $_POST['pickup_landline'];
$content = $_POST['content'];
$quantity = $_POST['quantity'];
$value = $_POST['value'];
$pi_boxes = $_POST['pickup_boxes'];
$weight = $_POST['weight'];
$dimensions = $_POST['dimensions'];
$pi_date = $_POST['pickup_date'];
$pi_time = $_POST['pickup_time'];
if(!mysqli_query($con, "insert into pickup (re_name,re_company,re_mobile,re_city,pi_company,pi_address1,pi_address2,pi_city,pi_pincode,pi_person,pi_mobile,pi_landline,content,quantity,value,pi_boxes,weight,dimensions,pi_date,pi_time) VALUES ('$re_name','$re_company','$re_mobile','$re_city','$pi_company','$pi_address1','$pi_address2','$pi_city','$pi_pincode','$pi_person','$pi_mobile','$pi_landline','$content','$quantity','$value','$pi_boxes','$weight','$dimensions','$pi_date','$pi_time')")) {
	echo 'Error :- '.mysqli_error($con);
}

 
 ?>
      
