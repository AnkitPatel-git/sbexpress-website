<?php include('../../core/int.php'); 

	$ID = $_POST['ID'];
	
	$get = mysqli_query($con, "select * from product_list where P_ID = '$ID'");
	$show = mysqli_fetch_array($get);
	$image = '../../assets/images/product-images/'.$show['Image'];
	unlink($image);
	
	mysqli_query($con, "delete from product_list where P_ID = '$ID'");


?>