<?php 

include('../core/int.php');


$epin = $_POST['epin'];
// Check its existence (for example, execute a query from the database) ...

if(epin_exists($con, $epin) === true ) {
	$isAvailable = true;
} else {
	$isAvailable = false;
}



 // or false

// Finally, return a JSON
echo json_encode(array(
    'valid' => $isAvailable,
));

?>