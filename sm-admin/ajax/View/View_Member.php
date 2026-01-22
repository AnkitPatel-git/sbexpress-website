<?php include '../../core/int.php'; ?>
<table class="table table-xs table-bordered " id="example1" data-paging="true" data-sorting="true" data-filtering="true">
<thead>
  <tr class="bg-teal-400">
    <th>#</th>
    <th>Sponser ID</th>
    <th data-type="html">Name</th>
    <th data-type="html">Username</th>
    <th data-type="html" data-breakpoints="xs sm md">Product</th>
    <th data-type="html" data-breakpoints="xs sm md">Date of Joining</th>
    <th data-type="html" data-breakpoints="xs sm md">Earn (Amount)</th>
    <th data-type="html" data-breakpoints="xs sm md">Action</th>
  </tr>
</thead>
<tbody>
<?php 
$count = 1;
$get = mysqli_query($con, "select * from users");
while ($show = mysqli_fetch_array($get)) { ?>
  <tr>
    <td><?php echo $count++; ?></td>
    <td><?php echo 'RILAN00'.$show[0]; ?></td>
    <td><?php echo $show['First_Name'].' '.$show['Last_Name']; ?></td>
    <td><?php echo $show['Username']; ?></td>
    <td><?php echo Get_Product_Name($con, $show['Product_ID']); ?></td>
    <td> <?php echo date('d M Y', strtotime($show['Date_of_Joint'])); ?></td>
    <td><i class="fa fa-rupee"></i> <?php echo level_matrix($show[0]); ?></td>
    <td>
      <a href="edit-user.php?ID=<?php echo $show[0]; ?>" style="padding:5px;" class="label label-primary label-icon" title="Update Product"><i class="icon-pencil4"></i></a>
      <a onclick="Delete_Member(<?php echo $show[0]; ?>)" style="padding:5px;" class="label label-danger label-icon" title="Update Product"><i class="icon-close2"></i></a>
    </td>
  </tr>
<?php } ?>
</tbody>
</table>
<script>
  jQuery(function($){
    $('#example1').footable();
  });
</script>