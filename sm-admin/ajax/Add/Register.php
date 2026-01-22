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
$username = $_POST['username '];
$password = $_POST['confirmpassword'];
$pass = md5($password);
$date = date('Y-m-d');
$month = date('M');
$year = date('Y');

if(!mysqli_query($con, "insert into users(First_Name, Last_Name, Email, Mobile, Address, State, City, Pincode, Pan_Card, Account_Name, Bank_Name, Branch, Account_Number, IFSC_Number, Nominee_Name, Nominee_Relation,  Date_of_Joint,Password,Original_Password,Username) values ('$first_name', '$last_name', '$email', '$phone', '$address', '$state', '$city', '$pin', '$pancard', '$account_name', '$bank_name', '$branch', '$account_number', '$ifsc_number', '$nominee_name', '$nominee_relation',  NOW(), '$password','$password','$username')")) {
	echo 'Error :- '.mysqli_error($con);
}

 
 ?>
      
