<?php include('../../core/int.php'); 

	$ID = $_POST['ID'];
	
	mysqli_query($con, "delete from tracking_details where TD_ID = '$ID'");


?>