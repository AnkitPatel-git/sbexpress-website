<?php include '../../core/int.php';
$track_id = $_POST['track_id'];
$get = mysqli_query($con, "select * from tracking_details where AWB_No = '$track_id'");
$gettid = mysqli_Query($con, "select * from tracking_details where AWB_No = '$track_id' order by TD_ID desc LIMIT 1");
$showtid = mysqli_fetch_array($gettid);
$reslut = mysqli_num_rows($get);
if(empty($reslut)) {
  echo 'Wrong Tracking ID';
} else { ?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">33555316071</div>
  <div class="panel-body">

    <div class="waybill_block">
      <label>Pickup Date</label>
      <p><?php echo $showtid['Date_of_Pick_Up']; ?></p>
    </div>

    <div class="waybill_block">
      <label>From</label>
      <p><?php echo $showtid['From_Location']; ?></p>
    </div>

    <div class="waybill_block">
      <label>To</label>
      <p><?php echo $showtid['Destination']; ?></p>
    </div>

    <div class="waybill_block">
      <label>Status</label>
      <p><?php echo $showtid['Statu_Remarks']; ?></p>
    </div>

    <div class="waybill_block">
      <label>Date of Delivery</label>
      <p><?php echo $showtid['Delivery_Date']; ?></p>
    </div>

    <div class="waybill_block">
      <label>Time of Delivery</label>
      <p><?php echo $showtid['Delivery_Time']; ?></p>
    </div>

    <div class="waybill_block">
      <label>Recipient</label>
      <p><?php echo $showtid['Received_By']; ?></p>
    </div>

  </div>

  <!-- Table -->
  <table class="table table-bordered">
    <tr>
      <th colspan="4" class="text-center">Status and Scans</th>
    </tr>
    <tr>
      <th>Location</th>
      <th>Details</th>
      <th>Date</th>
      <th>Time</th>
    </tr>
    <tr>
      <th>Waybill No : 33555316071</th>
    </tr>
    <?php 
      while ($show = mysqli_fetch_array($get)) { ?>
       <tr>
         <td><?php echo $show['From_Location']; ?></td>
         <td><?php echo $show['Statu_Remarks']; ?></td>
         <td><?php echo $show['Date_of_Pick_Up']; ?></td>
         <td><?php echo $show['Delivery_Time']; ?></td>
       </tr>
      <?php }
    ?>
  </table>
</div>
<?php } ?>
