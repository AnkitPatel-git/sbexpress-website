<?php  include('../../core/int.php');  

$track_id = $_POST['track_id'];
if(!mysqli_query($con, "insert into tackid (Track_ID) VALUES ('$track_id')")) {
	echo 'Error :- '.mysqli_error($con);
}

 
 ?>
      
