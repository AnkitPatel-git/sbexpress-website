<?php include '../../core/int.php';
$ID =  $_POST['ID'];
?>
<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <tr>
      <th style="min-width: 120px;" class="text-center">Date of Pick up</th>
      <th style="min-width: 200px;"  class="text-center">Consignor Name</th>
      <th style="min-width: 120px;" class="text-center">From Location</th>
      <th style="min-width: 120px;" class="text-center">Sender Name</th>
      <th style="min-width: 170px;" class="text-center">Sender Department</th>
      <th style="min-width: 150px;" class="text-center">Consignee Name</th>
      <th style="min-width: 100px;" class="text-center">Destination</th>
      <th class="text-center">Mode</th>
      <th class="text-center">AWB No</th>
      <th style="min-width: 100px;" class="text-center">SB Ref No</th>
      <th style="min-width: 120px;" class="text-center">Courier Name</th>
      <th class="text-center">Qty</th>
      <th class="text-center">Weight</th>
      <th style="min-width: 130px;" class="text-center">Content</th>
      <th class="text-center">L</th>
      <th class="text-center">B</th>
      <th class="text-center">H</th>
      <th style="min-width: 120px;" class="text-center">Delivery Date</th>
      <th style="min-width: 120px;" class="text-center">Delivery Time</th>
      <th style="min-width: 150px;" class="text-center">Received By</th>
      <th style="min-width: 200px;" class="text-center">Statu Remarks</th>
    </tr>
    <?php
    $get = mysqli_query($con, "select * from tracking_details where AWB_No = '$ID' order by TD_ID desc");
    while ($show = mysqli_fetch_array($get)) { ?>
    <tr>
      <td class="text-center"><?php echo $show['Date_of_Pick_Up']; ?></td>
      <td class="text-center"><?php echo $show['Consignor_Name']; ?></td>
      <td class="text-center"><?php echo $show['From_Location']; ?></td>
      <td class="text-center"><?php echo $show['Sender_Name']; ?></td>
      <td class="text-center"><?php echo $show['Sender_Department']; ?></td>
      <td class="text-center"><?php echo $show['Consignee_Name']; ?></td>
      <td class="text-center"><?php echo $show['Destination']; ?></td>
      <td class="text-center"><?php echo $show['Mode']; ?></td>
      <td class="text-center"><?php echo $show['AWB_No']; ?></td>
      <td class="text-center"><?php echo $show['SB_Ref_No']; ?></td>
      <td class="text-center"><?php echo $show['Courier_Name']; ?></td>
      <td class="text-center"><?php echo $show['Qty']; ?></td>
      <td class="text-center"><?php echo $show['Weight']; ?></td>
      <td class="text-center"><?php echo $show['Content']; ?></td>
      <td class="text-center"><?php echo $show['L']; ?></td>
      <td class="text-center"><?php echo $show['B']; ?></td>
      <td class="text-center"><?php echo $show['H']; ?></td>
      <td class="text-center"><?php echo $show['Delivery_Date']; ?></td>
      <td class="text-center"><?php echo $show['Delivery_Time']; ?></td>
      <td class="text-center"><?php echo $show['Received_By']; ?></td>
      <td class="text-center"><?php echo $show['Statu_Remarks']; ?></td>
    </tr>
    <?php } ?>
  </table>
</div>
