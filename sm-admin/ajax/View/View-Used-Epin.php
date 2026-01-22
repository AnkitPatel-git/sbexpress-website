<?php include '../../core/int.php'; ?>
<div class="">
<table class="table table-xs table-bordered " id="example1" data-paging="true" data-sorting="true" data-filtering="true">
<thead>
  <tr class="bg-teal-400">
    <th>#</th>
    <th>E-Pin</th>
    <th data-type="html">Price</th>
    <th data-type="html" data-breakpoints="xs sm md">Product</th>
    <th data-type="html" data-breakpoints="xs sm md">Date</th>
    <th data-type="html" data-breakpoints="xs sm md">Time</th>
    <th data-type="html" data-breakpoints="xs sm md">Used By</th>
  </tr>
</thead>
<tbody>
<?php 
$count = 1;
$get = mysqli_query($con, "select * from epin where active = 0");
while ($show = mysqli_fetch_array($get)) { ?>
	<tr>
		<td><?php echo $count++; ?></td>
		<td><?php echo $show['EPIN']; ?></td>
    <td><i class="fa fa-rupee"></i> <?php echo $show['Price']; ?></td>
    <td><?php $PID = $show['P_ID'];
    $getproduct = mysqli_query($con, "select * from product_list where P_ID = '$PID'");
    $showproduct = mysqli_fetch_array($getproduct);
    echo $showproduct['Name']; ?></td>
    <td> <?php echo date('d M Y', strtotime($show['Date'])); ?></td>
    <td> <?php echo date('h:i A', strtotime($show['Time'])); ?></td>
    <td> <?php echo Get_User_Name($con, $show['User_ID']); ?></td>
	</tr>
<?php } ?>
</tbody>
</table>
</div>
<script type="text/javascript">
	function Delete_Epin(id) {

		var ID = id;
		
		$.ajax({
			type:"POST",
			url:"ajax/Delete/Delete-Epin.php",
			data:"ID="+ID,
			success: function (data) {
				location.reload();
			}
		});

	}
</script>
<script>
jQuery(function($){
    $('#example1').footable();
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>