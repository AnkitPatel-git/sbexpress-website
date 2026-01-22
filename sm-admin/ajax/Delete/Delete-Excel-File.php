<?php include('../../core/int.php'); 

	$ID = $_POST['ID'];
	$TI = '../../dist/file/'.$_POST['TI'];
	
	
	mysqli_query($con, "delete from excel where id = '$ID'");
	unlink($TI);

?>