
<?php include('../../core/int.php');
if(isset($_POST['first']) === true && isset($_POST['second']) === true) { ?>
<div class="well well-sm" style="padding-bottom:0;">
    <form class="form-horizontal">
    <div class="form-group">
        <div class="col-md-12">
            <a class="btn  btn-primary"><?php echo date('d F Y', strtotime($_POST['first'])); ?> <i class="fa fa-exchange"></i> <?php echo date('d F Y', strtotime($_POST['second'])); ?></a>
            <a class="btn  btn-xs btn-danger pull-right" onclick="clearFilter()">Clear Filter</a>
        </div>
    </div>
    </form>
</div>
<?php } ?>
 <table id="example1" data-paging="true" data-sorting="true" data-filtering="true" class="table table-bordered table-striped" >
                          <thead>
                            <tr>
                             <th>#</th>
                              <th data-type="html" >Sponsor ID</th>
                              <th data-type="html" >Name</th>
                              
                              <th data-type="html" data-breakpoints="xs sm md">Date</th>
                             <th data-type="html" data-breakpoints="xs sm md">Month</th>
                             
                              <th data-type="html" data-breakpoints="xs sm md">Time</th>
                              <th data-type="html" data-breakpoints="xs sm md">Status</th>
                                
                             </tr>
                          </thead>
                          <tbody>
<?php
if(isset($_POST['first']) === true && isset($_POST['second']) === true) {
    $first = date('Y-m-d', strtotime($_POST['first']));
    $second = date('Y-m-d', strtotime($_POST['second']));
    $get = mysqli_query($con, "SELECT users.First_Name,users.Last_Name, user_logs.Date ,user_logs.Months,user_logs.Time ,user_logs.Log_Type,user_logs.User_ID FROM users INNER JOIN user_logs ON users.user_id = user_logs.User_ID AND Date BETWEEN '$first' AND '$second'");
} else {
     $get = mysqli_query($con, "SELECT users.First_Name,users.Last_Name, user_logs.Date ,user_logs.Months,user_logs.Time ,user_logs.Log_Type,user_logs.User_ID FROM users INNER JOIN user_logs ON users.user_id = user_logs.User_ID ");
}

$count = 1;
while ($show = mysqli_fetch_array($get)) { ?>
<tr>
  <td><?php echo $count++; ?></td>
                                   <td><?php echo 'RILAN00'.$show['User_ID']; ?></td>
                                  <td><?php echo $show['First_Name'].' '.$show['Last_Name']; ?></td>
                                   <td><?php echo $show['Date'];?></td>
                                   <td><?php echo $show['Months'];?></td>
                                  <td><?php echo $show['Time'];?></td>
                                  <td><?php echo $show['Log_Type']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>

<script>
jQuery(function($){
    $('#example1').footable();
  });
function clearFilter() {
    $('#searchuserlogs').data('formValidation').resetForm(true);
    View_Donates();
}
</script>
