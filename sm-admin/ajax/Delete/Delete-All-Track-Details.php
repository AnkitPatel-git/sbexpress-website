<?php include('../../core/int.php'); 

	$ID = $_POST['ID'];
	
	mysqli_query($con, "delete from tracking_details where AWB_No = '$ID'");
	mysqli_query($con, "delete from tracking_id where Track_ID = '$ID'");


?>