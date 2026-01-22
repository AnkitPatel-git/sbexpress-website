<?php include('../../core/int.php'); 

	$ID = $_POST['ID'];
	
	
	
	mysqli_query($con, "delete from users where user_id = '$ID'");


?>