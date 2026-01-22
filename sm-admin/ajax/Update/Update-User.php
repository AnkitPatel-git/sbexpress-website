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
$userid = $_POST['user_id'];

	if(!mysqli_query($con, "update users set First_Name = '$first_name', Last_Name = '$last_name', Email = '$email', Mobile = '$phone', Address = '$address', State = '$state', City = '$city', Pincode = '$pin', Pan_Card = '$pancard', Account_Name = '$account_name', Bank_Name = '$bank_name', Branch = '$branch', Account_Number = '$account_number', IFSC_Number = '$ifsc_number', Nominee_Name = '$nominee_name', Nominee_Relation = '$nominee_relation' where user_id = '$userid'")) {
		echo 'Error :- '.mysqli_error($con);
	}




 
 ?>
      
