<?php 

include('../core/int.php');


$web_bill = $_POST['bill_no'];
// Check its existence (for example, execute a query from the database) ...

if(web_bill_exists($con, $web_bill) === true ) {
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