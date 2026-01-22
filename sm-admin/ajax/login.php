<?php  include('../core/int.php');  

	
	if(empty($_POST) === false) {
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(empty($username) === true || empty($password) === true) {
			$errors[] = 'You need to enter a Mobile No. and password';
		} else if(user_exists($con,$username) === false) {
			$errors[] = 'We can\'t find that Mobile No. Have you registered';	
		} else if(user_active($con,$username) === false) {
			$errors[] = 'You haven\'t activated your account';	
		} else {
			
			if(strlen($password) > 32) {
					$errors[] = 'Password too long';	
				}
			$login = login($con, $username, $password);
			if($login === false) {
				$errors[] = 'That username / password combination is incorrect';	
			} else {
				
				$_SESSION['user_id'] = $login;
				echo $sec = "1";
				$userid = $_SESSION['user_id'];
				$years = date('Y');
				$months = date('M');
				$date = date('Y-m-d');
				$session_year = $_SESSION['year_end'];
				mysqli_query($con, "insert into user_logs(User_ID, Year, Months, Date, Time, Log_Type) VALUES ('$userid', '$years', '$months', '$date', NOW(), 'Login')");
				exit();
			}
			
		}
		
		echo output_errors($errors);
		
	}
	
	 ?>
      
