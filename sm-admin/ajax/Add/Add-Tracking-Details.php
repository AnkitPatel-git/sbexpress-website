<?php  include('../../core/int.php');

$filename=$_FILES["excel_file"]["tmp_name"];

require_once('PHPExcel.php');
 
//Usage:
convertXLStoCSV($filename,'output.csv');
 
function convertXLStoCSV($infile,$outfile)
{
    $fileType = PHPExcel_IOFactory::identify($infile);
    $objReader = PHPExcel_IOFactory::createReader($fileType);
 
    //$objReader->setReadDataOnly(true);   
    $objPHPExcel = $objReader->load($infile);    
 
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
    $objWriter->save($outfile);
}

$filen = 'output.csv';

if($_FILES["excel_file"]["size"] > 0)
{

$file = fopen($filen, "r");
while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
{
//It wiil insert a row to our subject table from our csv file
$sql = "INSERT INTO tracking_details(Date_of_Pick_Up, Consignor_Name, From_Location, Sender_Name, Sender_Department, Consignee_Name, Destination, Mode, AWB_No, SB_Ref_No, Courier_Name, Qty, Weight, Content, L, B, H, Delivery_Date, Delivery_Time, Received_By, Statu_Remarks) VALUES ('$emapData[0]', '$emapData[1]', '$emapData[2]', '$emapData[3]', '$emapData[4]', '$emapData[5]', '$emapData[6]', '$emapData[7]', '$emapData[8]', '$emapData[9]', '$emapData[10]', '$emapData[11]', '$emapData[12]', '$emapData[13]', '$emapData[14]', '$emapData[15]', '$emapData[16]', '$emapData[17]', '$emapData[18]', '$emapData[19]', '$emapData[20]')";
//we are using mysql_query function. it returns a resource on true else False on error
$result = mysqli_query( $con, $sql );
mysqli_query($con, "insert into tracking_id(Track_ID) values('$emapData[8]')");
}
fclose($file);
//throws a message if data successfully imported to mysql database from excel file
echo "<script type=\"text/javascript\">
alert(\"CSV File has been successfully Imported.\");
</script>";
//close of connection
mysqli_close($con); 
}
unlink($filen);
?> 
      
