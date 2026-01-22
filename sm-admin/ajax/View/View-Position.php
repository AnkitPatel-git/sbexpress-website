<?php include '../../core/int.php';
$sponser = 'RILAN00'.$_POST['ID'];
$ID = $_POST['ID'];
 ?>
 <select class="form-control" name="position">
 	<option value="">Select Position</option>
 	<?php
 	$getposition = mysqli_query($con, "select * from position_details where Sponser_ID = '$sponser' AND User_ID = '$ID'");
 	while ($showposition = mysqli_fetch_array($getposition)) {
 		if(empty($showposition['Assign_User_ID'])) {
 			echo '<option value="'.$showposition[0].'">'.$showposition['Position'].'</option>';
 		}
 	}
 	?>
 </select>
