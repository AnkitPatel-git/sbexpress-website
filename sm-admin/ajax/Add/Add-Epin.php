<?php  include('../../core/int.php');  

$epin = $_POST['epin'];
$price = $_POST['price'];
$years = date('Y');
$months = date('M');
$date = date('Y-m-d');
$time = date('h:s:i A');
if(!mysqli_query($con, "insert into epin (EPIN,Price,Time,Date,Month,Year) VALUES ('$epin','$price','$time','$date','$months','$years')")) {
	echo 'Error :- '.mysqli_error($con);
}

 
 ?>
      
