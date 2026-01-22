<?php  include('../../core/int.php');  


if(isset($_FILES['product_video']) === true || isset($_GET['title']) === true || isset($_GET['des']) === true || isset($_GET['id']) === true) {
	

	
$Video = rand().$_FILES['product_video']['name'];
$Video_tmp = $_FILES['product_video']['tmp_name'];
$title = $_POST['title'];

$des = $_POST['des'];
$id = $_POST['id'];
$get = mysqli_query($con, "select * from product_videos where VID_ID = '$id'");
$show = mysqli_fetch_array($get);
$Video_delete = '../../assets/videos/product-videos/'.$show['Video'];
unlink($Video_delete);

$Video_path = '../../assets/videos/product-videos/'.$Video;
move_uploaded_file($Video_tmp, $Video_path);	


	if(!mysqli_query($con, "update product_videos set Title = '$title',  Des = '$des', Video = '$Video' where VID_ID = '$id'")) {
		echo 'Error :- '.mysqli_error($con);
	}

} elseif(isset($_FILES['product_video']) === false || isset($_GET['title']) === true  || isset($_GET['des']) === true || isset($_GET['id']) === true) {
	
$title = $_POST['title'];

$des = $_POST['des'];
$id = $_POST['id'];

	if(!mysqli_query($con, "update product_videos set Title = '$title',  Des = '$des' where VID_ID = '$id'")) {
		echo 'Error :- '.mysqli_error($con);
	}

}
 
 ?>
      
