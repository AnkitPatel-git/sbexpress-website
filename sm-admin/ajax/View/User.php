<?php include('../../core/int.php');
?>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
    <tr>
        <th>#</th>
        <?php if($filename == 'View-All-Quick-Entry.php') { echo '<th>User</th>'; } ?>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Remarks</th>
        <th>Date</th>
        <th>Time</th>
        <?php if($filename == 'View_Quick_Entry.php') { ?>
        <th>#</th>
        <?php } ?>
    </tr>
</thead>
<tbody>
  <?php 
  $count = 1;
  while ($show = mysqli_fetch_array($get)) { ?>
    <tr>
    	<td><?php echo $count++; ?></td>
      <?php if($filename == 'View-All-Quick-Entry.php') {
        $user_id = $show['User_ID'];
        echo '<td>'.Get_Name($con, $user_id).'</td>';
      } ?>
    	<td><?php echo $show['Name']; ?></td>
    	<td><?php echo $show['Contact']; ?></td>
    	<td><?php echo $show['Email']; ?></td>
    	<td><?php echo $show['Remarks']; ?></td>
    	<td><?php echo date('d M Y', strtotime($show['Date'])); ?></td>
    	<td><?php echo date('h:i A', strtotime($show['Time'])); ?></td>
      <?php if($filename == 'View_Quick_Entry.php') { ?>
    	<td><a onclick="Entry_Edit(<?php echo $show[0]; ?>)" class="label label-primary"><i class="fa fa-pencil"></i></a></td>
      <?php } ?>
    </tr>
  <?php } ?>
</tbody>
</table>
<script type="text/javascript">
$(document).ready(function() {
	$('#example').DataTable();
});
</script>