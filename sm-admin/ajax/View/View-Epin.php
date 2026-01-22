<?php include '../../core/int.php'; ?>
<div class="">
<table class="table table-xs table-bordered " id="example1" data-paging="true" data-sorting="true" data-filtering="true">
<thead>
  <tr class="bg-teal-400">
    <th>#</th>
    <th>E-Pin</th>
    <th data-type="html" data-breakpoints="xs sm md">Price</th>
    <th data-type="html" data-breakpoints="xs sm md">Status</th>
    <th class="text-center" data-type="html" data-breakpoints="xs sm md">Action</th>
  </tr>
</thead>
<tbody>
<?php 
$count = 1;
$get = mysqli_query($con, "select * from epin");
while ($show = mysqli_fetch_array($get)) { ?>
	<tr>
		<td><?php echo $count++; ?></td>
		<td><?php echo $show['EPIN']; ?></td>
		<td><i class="fa fa-rupee"></i> <?php echo $show['Price']; ?></td>
		 <td><?php
             if($show['Active'] == 0) {
              echo '<a class="label label-success">Used</a>';
             } elseif ($show['Active'] == 1) {
              echo '<a class="label label-danger">Un-Used</a>';
             } ?></td>
		<td class="text-center">
			
			<a style="padding:1px 5px;" class="btn bg-danger" data-toggle="modal" data-target="#remove_modal<?php echo $show[0]; ?>"><i class="fa fa-close"></i></a>

			 <!-- Remove modal -->
        <div id="remove_modal<?php echo $show[0]; ?>" class="modal fade" role="dialog">
         <div class="modal-dialog modal-sm">
          <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">Confirm action to <?php echo $show['EPIN'].' '.'-'.' '.$showp['Name']; ?></h5>
           </div>
           <div class="modal-body"> You are about to remove this row. Are you sure?
            <input type="hidden" value="<?php echo $show[0]; ?>" id="id<?php echo $show[0]; ?>" />
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="Delete_Epin(<?php echo $show[0]; ?>)" >Yes, remove</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">No, thanks</button>
           </div>
          </div>
         </div>
        </div>
        <!-- /remove modal -->
		</td>
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