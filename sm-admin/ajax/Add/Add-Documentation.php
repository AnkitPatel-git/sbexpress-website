<?php  include('../../core/int.php');  

$State = $_POST['state'];
$In_Vat = $_POST['in_vat'];
$Validity_Form = $_POST['val_form'];
$Tax = $_POST['tax'];
$Octroi = $_POST['octroi'];
$Out_Vat = $_POST['out_vat'];
$Remark = $_POST['remarks'];
$Link= $_POST['link'];
if(!mysqli_query($con, "insert into domestic_doc (State,IN_Vat,Validity_Form,Tax,Octroi,Out_Vat,Remark,Link) VALUES ('$State','$In_Vat','$Validity_Form','$Tax','$Octroi','$Out_Vat','$Remark','$Link')")) {
	echo 'Error :- '.mysqli_error($con);
}

 
 ?>
      
