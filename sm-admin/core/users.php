 <?php include 'database.php';


 function trackid_exists($con, $trackid) {
	$trackid = sanitize($trackid);
    $query = "SELECT COUNT(T_ID) FROM `tackid` WHERE `Track_ID` = '$trackid'";
    $result = mysqli_query($con,$query);
    list($count) = mysqli_fetch_row($result);
    return ($count) ? true : false;
}

function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}

function change_password($con, $email, $password) {
	
	$email = $email;
	$password = md5($password);
	mysqli_query($con, "update users set Password = '$password' where Email = '$email'");
}

function Get_Standard($con, $id) {
	
	$id = $id;
	$get = mysqli_query($con, "select * from manage_class where MC_ID = '$id'");
	$show = mysqli_fetch_array($get);
	return $show['Name'];
}

function Get_User_Name($con, $id) {
	
	$id = $id;
	$get = mysqli_query($con, "select * from users where user_id = '$id'");
	$show = mysqli_fetch_array($get);
	return $show['First_Name'].' '.$show['Last_Name'];
}	

function Get_User_First_Name($con, $id) {
	
	$id = $id;
	$get = mysqli_query($con, "select * from users where user_id = '$id'");
	$show = mysqli_fetch_array($get);
	return $show['First_Name'];
}

function is_admin($con, $user_id) {
	$user_id = (int)$user_id;
    $query = "select COUNT(user_id) from users where user_id = '$user_id' AND Type = 1";
    $result = mysqli_query($con,$query);
    list($count) = mysqli_fetch_row($result);
    return ($count) ? true : false;
}


function Get_Student_Data($con, $id) {
	$data = array();
	$id = (int)$id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if($func_num_args > 1) {
		unset($func_get_args[0]);
		unset($func_get_args[1]);
		
		$fields = '`' .  implode('`, `', $func_get_args) . '`';
		$query = "SELECT $fields FROM `manage_student` WHERE `S_ID` = $id";
		$result = mysqli_query($con,$query);
		$data = mysqli_fetch_assoc($result);
				
		return $data;
		
	}
	
}


function user_data($con, $user_id) {
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if($func_num_args > 1) {
		unset($func_get_args[0]);
		unset($func_get_args[1]);
		
		$fields = '`' .  implode('`, `', $func_get_args) . '`';
		$query = "SELECT $fields FROM `users` WHERE `user_id` = $user_id";
		$result = mysqli_query($con,$query);
		$data = mysqli_fetch_assoc($result);
				
		return $data;
		
	}
	
}

function logged_in() {
	return (isset($_SESSION['user_id']) ? true : false);	
}

function user_exists($con, $username) {
	$username = sanitize($username);
    $query = "SELECT COUNT(`user_id`) FROM `users` WHERE `Username` = '$username'";
    $result = mysqli_query($con,$query);
    list($count) = mysqli_fetch_row($result);
    return ($count) ? true : false;
}

function web_bill_exists($con, $web_bill) {
	$web_bill = sanitize($web_bill);
    $query = "SELECT COUNT(`user_id`) FROM `users` WHERE `Bill_No` = '$web_bill'";
    $result = mysqli_query($con,$query);
    list($count) = mysqli_fetch_row($result);
    return ($count) ? true : false;
}



function user_active($con, $username) {
	$username = sanitize($username);
    $query = "SELECT COUNT(`user_id`) FROM `users` WHERE `Username` = '$username' AND `Active` = 1";
    $result = mysqli_query($con,$query);
    list($count) = mysqli_fetch_row($result);
    return ($count) ? true : false;
}

function user_id_from_username($con, $username) {
	$username = sanitize($username);
    $query = "select user_id FROM users WHERE Username = '$username'";
    $result = mysqli_query($con,$query);
    list($count) = mysqli_fetch_row($result);
    return ($count);
}

function login($con, $username, $password) {
	$user_id = user_id_from_username($con, $username);
	
	$username = sanitize($username);
	$password = md5($password); 
	
    $query = "SELECT COUNT(`user_id`) FROM `users` WHERE `Username` = '$username' AND `Password` = '$password'";
    $result = mysqli_query($con,$query);
    list($count) = mysqli_fetch_row($result);
    return ($count) ? $user_id : false;
}

function mobile_exists($con, $mobile) {
	$mobile = sanitize($mobile);
    $query = "SELECT COUNT(user_id) FROM `users` WHERE `Mobile` = '$mobile'";
    $result = mysqli_query($con,$query);
    list($count) = mysqli_fetch_row($result);
    return ($count) ? true : false;
}

function mobile_active($con, $mobile) {
	$username = sanitize($username);
    $query = "SELECT COUNT(`user_id`) FROM `users` WHERE `Mobile` = '$mobile' AND `Active` = 1";
    $result = mysqli_query($con,$query);
    list($count) = mysqli_fetch_row($result);
    return ($count) ? true : false;
}

function user_id_from_mobile($con, $mobile) {
	$mobile = sanitize($mobile);
    $query = "select user_id FROM users WHERE Mobile = '$mobile'";
    $result = mysqli_query($con,$query);
    list($count) = mysqli_fetch_row($result);
    return ($count);
}


function login_mobile($con, $mobile, $password) {
	$user_id = user_id_from_mobile($con, $mobile);
	
	$mobile = sanitize($mobile);
	$password = md5($password); 
	
    $query = "SELECT COUNT(`user_id`) FROM `users` WHERE `Mobile` = '$mobile' AND `Password` = '$password'";
    $result = mysqli_query($con,$query);
    list($count) = mysqli_fetch_row($result);
    return ($count) ? $user_id : false;
}


 ?>