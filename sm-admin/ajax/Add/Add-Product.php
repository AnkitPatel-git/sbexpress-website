<?php  include('../../core/int.php');  
include('../../abeautifulsite/SimpleImage.php');

if(isset($_FILES["product_image"]["type"])) {
	
$img = new abeautifulsite\SimpleImage();
	
$image = rand().$_FILES["product_image"]["name"];
$image_tmp = $_FILES["product_image"]["tmp_name"];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$des = $_POST['des'];

$image_path = '../../assets/images/product-images/'.$image;
	
$img->load($image_tmp);
$img->save($image_path);


if(!mysqli_query($con, "insert into product_list(Name, Price, Des, Image) VALUES ('$product_name', '$price', '$des', '$image')")) {
	echo 'Error :- '.mysqli_error($con);
}
}
 
 ?>
      
