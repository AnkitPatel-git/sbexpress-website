<?php include('../../core/int.php'); 

$ID = $_POST['ID'];
$SPID = 'RILAN00'.$ID;
mysqli_query($con, "delete from users where user_id = '$ID'");
mysqli_query($con, "delete from position_details where User_ID = '$ID' AND Sponser_ID = '$SPID'");
mysqli_query($con, "update epin set P_ID = 0, Active = 1, User_ID = 0 where User_ID = '$ID'");


?>