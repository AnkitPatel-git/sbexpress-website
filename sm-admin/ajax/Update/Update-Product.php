<?php  include('../../core/int.php');  
include('../../abeautifulsite/SimpleImage.php');

if(isset($_FILES["product_image"]["type"]) === true || isset($_GET['product_name']) === true || isset($_GET['price']) === true || isset($_GET['des']) === true || isset($_GET['id']) === true) {
	
$img = new abeautifulsite\SimpleImage();
	
$image = rand().$_FILES["product_image"]["name"];
$image_tmp = $_FILES["product_image"]["tmp_name"];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$des = $_POST['des'];
$id = $_POST['id'];
$get = mysqli_query($con, "select * from product_list where P_ID = '$id'");
$show = mysqli_fetch_array($get);
$image_delete = '../../assets/images/product-images/'.$show['Image'];
unlink($image_delete);

$image_path = '../../assets/images/product-images/'.$image;
	
$img->load($image_tmp);
$img->save($image_path);


	if(!mysqli_query($con, "update product_list set Name = '$product_name', Price = '$price', Des = '$des', Image = '$image' where P_ID = '$id'")) {
		echo 'Error :- '.mysqli_error($con);
	}

} elseif(isset($_FILES["product_image"]["type"]) === false || isset($_GET['product_name']) === true || isset($_GET['price']) === true || isset($_GET['des']) === true || isset($_GET['id']) === true) {
	
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$des = $_POST['des'];
$id = $_POST['id'];

	if(!mysqli_query($con, "update product_list set Name = '$product_name', Price = '$price', Des = '$des' where P_ID = '$id'")) {
		echo 'Error :- '.mysqli_error($con);
	}

}
 
 ?>
      
