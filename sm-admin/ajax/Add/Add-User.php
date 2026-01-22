<?php  include('../../core/int.php');  

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pancard = $_POST['pancard'];
$account_name = $_POST['account_name'];
$bank_name = $_POST['bank_name'];
$branch = $_POST['branch'];
$account_number = $_POST['account_number'];
$ifsc_number = $_POST['ifsc_number'];
$state = $_POST['state'];
$city = $_POST['city'];
$address = $_POST['address'];
$pin = $_POST['pin'];
$nominee_name = $_POST['nominee_name'];
$nominee_relation = $_POST['nominee_relation'];
$product = $_POST['product'];
$epin = $_POST['epin'];
$sponser_id = 'RILAN00'.$_POST['sponser_id'];
$select_user_id = $_POST['sponser_id'];
$position = $_POST['position'];
$password = random_password(8);
$pass = md5($password);
$date = date('Y-m-d');
$month = date('M');
$year = date('Y');
$username = strtolower($first_name.rand());

$get = mysqli_query($con, "select * from users where Pan_Card = '$pancard' AND Product_ID = '$product'");
$count = mysqli_num_rows($get);
if( ! empty($count) ) {
	echo '<i style="color:red;" class="fa fa-close fa-5x"></i><br /><br /><p class="btn btn-danger" style="cursor: auto;">Already exists this product '.Get_Product_Name($con, $product).'</p><script>setTimeout(function() { $("#loading_modal").modal("hide"); }, 4000);';
} else {

	echo '<i style="color:green;" class="fa fa-check fa-5x"></i><br /><br /><p class="btn btn-success" style="cursor: auto;">Successfully Registred</p>';
	// if(!mysqli_query($con, "insert into users(First_Name, Last_Name, Email, Mobile, Address, State, City, Pincode, Pan_Card, Account_Name, Bank_Name, Branch, Account_Number, IFSC_Number, Nominee_Name, Nominee_Relation, Product_ID, Date_of_Joint, E_PIN, Username, Password) values ('$first_name', '$last_name', '$email', '$phone', '$address', '$state', '$city', '$pin', '$pancard', '$account_name', '$bank_name', '$branch', '$account_number', '$ifsc_number', '$nominee_name', '$nominee_relation', '$product', NOW(), '$epin', '$username', '$pass')")) {
	// 	echo 'Error :- '.mysqli_error($con);
	// }
	// $last_id = mysqli_insert_id($con);
	// $sponser = 'RILAN00'.$last_id;
	// mysqli_query($con, "insert into position_details (User_ID, Sponser_ID, Position, Date_Of_Joining, Date, Month, Year) VALUES ('$last_id', '$sponser', 'Left', '$date', '$date', '$month', '$year')");
	// mysqli_query($con, "insert into position_details (User_ID, Sponser_ID, Position, Date_Of_Joining, Date, Month, Year) VALUES ('$last_id', '$sponser', 'Middle', '$date', '$date', '$month', '$year')");
	// mysqli_query($con, "insert into position_details (User_ID, Sponser_ID, Position, Date_Of_Joining, Date, Month, Year) VALUES ('$last_id', '$sponser', 'Right', '$date', '$date', '$month', '$year')");
	// mysqli_query($con, "update position_details set Assign_User_ID = '$last_id', Assign_Sponser_ID = '$sponser' where User_ID = '$select_user_id' AND Sponser_ID = '$sponser_id' AND P_ID = '$position'");
	// mysqli_query($con, "update epin set User_ID = '$last_id', P_ID = '$product', Active = 0 where EPIN = '$epin'");

}



 
 ?>
      
