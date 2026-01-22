<?php 
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set("Asia/Kolkata");
require 'database.php';
require 'users.php';
require 'general.php';

if(logged_in() === true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($con, $session_user_id, 'user_id', 'Username', 'Rights', 'Active', 'Type', 'First_Name', 'Last_Name');
	if(user_active($con, $user_data['Username']) === false) {
		session_destroy();
		header('Location: index.php');
		exit();	
	}
}



$errors = array();


?>