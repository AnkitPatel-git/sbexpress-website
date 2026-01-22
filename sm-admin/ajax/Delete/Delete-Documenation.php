<?php include('../../core/int.php'); 

	$ID = $_POST['ID'];
	
	
	
	mysqli_query($con, "delete from domestic_doc where id = '$ID'");


?>