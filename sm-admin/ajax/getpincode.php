<?php 
include('../core/int.php');

if(isset($_POST['id']) === true ) {

	$id =  $_POST['id'];
	

	
	$get = mysqli_query($con,"select * from service where Pincode = '$id' ");
  	
	if(mysqli_num_rows($get) > 0) { 
	

  
  	$display = mysqli_fetch_array($get);
	
	 ?>
	<table class="table table-bordered table-striped"  id="example1">
                            <thead>
                                <tr>
                                    <th >Pincode</th>
                                    <th data-type="html" data-breakpoints="xs sm md ">S/C Description </th>
                                    <th data-type="html" data-breakpoints="xs sm md ">Product</th>
                                    <th data-type="html" data-breakpoints="xs sm md ">APEX Service</th>
                                    <th data-type="html" data-breakpoints="xs sm md ">APEX EDL Serviice</th>
                                    <th data-type="html" data-breakpoints="xs sm md ">Transit Time 1</th>
                                    <th data-type="html" data-breakpoints="xs sm md ">Surface Service </th>
                                    <th data-type="html" data-breakpoints="xs sm md ">Surface EDL Service</th>
                                    <th data-type="html" data-breakpoints="xs sm md ">Transit Time 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?Php echo $display['Pincode']; ?></td>
                                    <td><?Php echo $display['Description']; ?></td>
                                    <td><?Php echo $display['Product']; ?></td>
                                    <td><?Php echo $display['Apex_Service']; ?></td>
                                    <td><?Php echo $display['Apex_EDL_Service']; ?></td>
                                    <td><?Php echo $display['Transit_Time1']; ?></td>
                                    <td><?Php echo $display['Surface_Service']; ?></td>
                                    <td><?Php echo $display['Surface_EDL_Service']; ?></td>
                                    <td><?Php echo $display['Transit_Time2']; ?></td>
                                </tr>
                            </tbody>
                            
                        </table>

	
    
<?php

	} else { ?>
		
		<script>
			alert("No Data Found");
		</script>
		
	<?php }
 }

?>
 <script>
jQuery(function($){
    $('#example1').footable();
     
   
  });
</script>