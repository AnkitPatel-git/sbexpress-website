<?php  include('../../core/int.php');  

$name = $_POST['name'];
$commission = $_POST['commission'];
$sales = $_POST['sales'];
$id = $_POST['id'];

if(!mysqli_query($con, "update level_income set Name = '$name', Comission = '$commission', Sales = '$sales' where LI_ID = '$id'")) {
	echo 'Error :- '.mysqli_error($con);
}

 
 ?>
      
