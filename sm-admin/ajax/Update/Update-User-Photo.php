<?php  include('../../core/int.php');  
include('../../abeautifulsite/SimpleImage.php');

if(isset($_FILES["photo"]["type"])) {
	
$img = new abeautifulsite\SimpleImage();
	
$image = rand().$_FILES["photo"]["name"];
$image_tmp = $_FILES["photo"]["tmp_name"];
$id = $_POST['id'];
$img_id = $_POST['img_id'];

$image_path = '../../dist/img/user-images/'.$image;
$imgae_delete = '../../dist/img/user-images/'.$img_id;
unlink($imgae_delete);
	
	$img->load($image_tmp);
	$img->resize(400, 400);
	$img->save($image_path);


if(!mysqli_query($con, "update users set Profile_Pic = '$image' where user_id = '$id'")) {
	echo 'Error :- '.mysqli_error($con);
}

}

if(isset($_FILES["cover_photo"]["type"])) {
	
$img = new abeautifulsite\SimpleImage();
	
$image = rand().$_FILES["cover_photo"]["name"];
$image_tmp = $_FILES["cover_photo"]["tmp_name"];
$cover_id = $_POST['cover_id'];
$cover_img = $_POST['cover_img'];

$image_path = '../../dist/img/user-images/'.$image;
$imgae_delete = '../../dist/img/user-images/'.$cover_img;
unlink($imgae_delete);
	
	$img->load($image_tmp);
	$img->resize(1500, 600);
	$img->save($image_path);


if(!mysqli_query($con, "update users set Cover_Photo = '$image' where user_id = '$cover_id'")) {
	echo 'Error :- '.mysqli_error($con);
}

}
 
 ?>
      
