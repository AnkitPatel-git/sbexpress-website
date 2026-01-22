<?php include('../core/int.php');

$now = time();
		  $time = $now - 2;
		  $get_user = mysqli_query($con, "select username from users where online>'$time'");
		  if(mysqli_num_rows($get_user) == 0){
			echo "Nobody's Currently Online";  
		  } else {
			while($user = mysqli_fetch_assoc($get_user)) {
				echo "<p><i class='fa fa-circle' style='color:green;'></i>&nbsp;&nbsp;".$user['username']."</p>";	
			}
		  }


 ?>