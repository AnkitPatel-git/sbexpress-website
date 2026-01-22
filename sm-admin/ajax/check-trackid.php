<?php 

include('../core/int.php');


$track_id = $_POST['track_id'];
// Check its existence (for example, execute a query from the database) ...

if(trackid_exists($con, $track_id) === true ) {
	$isAvailable = false;
} else {
	$isAvailable = true;
}



 // or false

// Finally, return a JSON
echo json_encode(array(
    'valid' => $isAvailable,
));

?>