<?php include('../../core/int.php'); 

	$ID = $_POST['ID'];
	
	$get = mysqli_query($con, "select * from product_videos where VID_ID = '$ID'");
	$show = mysqli_fetch_array($get);
	$image = '../../assets/videos/product-videos/'.$show['Video'];
	unlink($image);
	
	mysqli_query($con, "delete from product_videos where VID_ID = '$ID'");


?>