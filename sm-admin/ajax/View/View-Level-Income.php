<?php include '../../core/int.php'; ?>

<table class="table table-xs table-bordered">
<thead>
  <tr class="bg-teal-400">
    <th>#</th>
    <th>Name</th>
    <th>Commission</th>
    <th>Sales</th>
    <th class="text-center">Action</th>
  </tr>
</thead>
<tbody>
<?php 
$count = 1;
$get = mysqli_query($con, "select * from level_income");
while ($show = mysqli_fetch_array($get)) { ?>
	<tr>
		<td><?php echo $count++; ?></td>
		<td><?php echo $show['Name']; ?></td>
		<td><i class="fa fa-rupee"></i> <?php echo $show['Comission']; ?></td>
		<th><?php echo $show['Sales']; ?></th>
		<td class="text-center">
			<a href="manage-level-income.php?id=<?php echo $show[0]; ?>" style="padding:1px 5px;" class="btn bg-slate"><i class="fa fa-pencil"></i></a>
			<a style="padding:1px 5px;" class="btn bg-danger"><i class="fa fa-close"></i></a>
		</td>
	</tr>
<?php } ?>
</tbody>
</table>