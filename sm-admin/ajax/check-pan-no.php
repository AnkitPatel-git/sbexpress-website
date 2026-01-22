<?php 

include('../core/int.php');


$pancard = $_POST['pancard'];
// Check its existence (for example, execute a query from the database) ...

if(pancard_exists($con, $pancard) === true ) {
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