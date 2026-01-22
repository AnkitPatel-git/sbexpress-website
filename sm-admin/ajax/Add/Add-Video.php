<?php  include('../../core/int.php');  



if(isset($_FILES['product_video'])){	

$image = rand().$_FILES['product_video']['name'];
$image_tmp = $_FILES['product_video']['tmp_name'];	

$title = $_POST['title'];

$des = $_POST['des'];
$p_id = $_POST['p_id'];

$image_path = '../../assets/videos/product-videos/'.$image;
	

move_uploaded_file($image_tmp, $image_path);


if(!mysqli_query($con, "insert into product_videos(Title, Des, P_ID,Video) VALUES ('$title', '$des',  '$p_id','$image')")) {
	echo 'Error :- '.mysqli_error($con);
}
}
 ?>
      
