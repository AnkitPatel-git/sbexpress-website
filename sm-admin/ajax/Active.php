<?php include('../core/int.php'); 

if(isset($_POST['AID']) === true) {

	$AID = $_POST['AID'];
	
	mysqli_query($con, "update users set Active = 1 where user_id = '$AID'");
	
}

if(isset($_POST['DID']) === true) {

	$DID = $_POST['DID'];
	
	mysqli_query($con, "update users set Active = 0 where user_id = '$DID'");
	
}

?>