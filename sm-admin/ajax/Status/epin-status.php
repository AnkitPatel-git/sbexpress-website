+<?php  include('../../core/int.php');  

if(isset($_GET['active']) === true) {
	$id = $_GET['active'];
	mysqli_query($con, "update epin set Active = 1 where E_ID = '$id'");
	header('Location: ../../epin-genrate.php');
}

if(isset($_GET['deactive']) === true) {
	$id = $_GET['deactive'];
	mysqli_query($con, "update epin set Active = 0 where E_ID = '$id'");
	header('Location: ../../epin-genrate.php');
}
 
 ?>
      
