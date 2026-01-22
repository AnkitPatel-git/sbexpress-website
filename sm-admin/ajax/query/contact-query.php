<?php  include('../../core/int.php');  

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$message = $_POST['message'];

if(!mysqli_query($con, "insert into contact (Name,Mobile,Email,Message) VALUES ('$name','$mobile','$email ','$message')")) {
	echo 'Error :- '.mysqli_error($con);
}

 
 ?>
      
