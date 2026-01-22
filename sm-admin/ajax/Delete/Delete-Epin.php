<?php include('../../core/int.php'); 

	$ID = $_POST['ID'];
	
	
	
	mysqli_query($con, "delete from epin where E_ID = '$ID'");


?>