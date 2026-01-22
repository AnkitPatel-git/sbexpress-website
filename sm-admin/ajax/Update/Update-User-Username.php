<?php  include('../../core/int.php');  

$username = $_POST['username'];
$id = $_POST['id'];

if(!mysqli_query($con, "update users set Username = '$username' where user_id = '$id'")) {
	echo 'Error :- '.mysqli_error($con);
}

 
 ?>
      
