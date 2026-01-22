<?php  include('../../core/int.php');  

$name = $_POST['name'];
$commission = $_POST['commission'];
$sales = $_POST['sales'];

if(!mysqli_query($con, "insert into level_income (Name, Comission, Sales) VALUES ('$name', '$commission', '$sales')")) {
	echo 'Error :- '.mysqli_error($con);
}

 
 ?>
      
