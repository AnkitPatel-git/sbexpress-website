<?php  include('../../core/int.php');  

$tds = $_POST['tds'];
$donation = $_POST['donation'];

if(!mysqli_query($con, "update account_settings set TDS = '$tds', Donation = '$donation' where AID = 1")) {
	echo 'Error :- '.mysqli_error($con);
}

 
 ?>
      
