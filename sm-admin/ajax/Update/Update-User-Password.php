<?php  include('../../core/int.php');  

$password = $_POST['password'];

$userid = $_POST['id'];


$pass = md5($password);
	if(!mysqli_query($con, "update users set Password = '$pass', Original_Password = '$password'  where user_id = '$userid'")) {
	echo 'Error :- '.mysqli_error($con);
}




 
 ?>
      
