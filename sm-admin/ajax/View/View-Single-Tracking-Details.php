<?php include '../../core/int.php';
$ID =  $_POST['ID'];
$get = mysqli_query($con, "select * from tracking_details where AWB_No = '$ID' order by TD_ID desc");
$show = mysqli_fetch_array($get);
?>
<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <tr>
      <th>Date of Pick up</th>
      <td><?php echo $show['Date_of_Pick_Up']; ?></td>
    </tr>
    <tr>
      <th >Consignor Name</th>
      <td><?php echo $show['Consignor_Name']; ?></td>
    </tr>
    <tr>
      <th>From Location</th>
      <td><?php echo $show['From_Location']; ?></td>
    </tr>
    <tr>
      <th>Sender Name</th>
      <td><?php echo $show['Sender_Name']; ?></td>
    </tr>
    <tr>
      <th>Sender Department</th>
      <td><?php echo $show['Sender_Department']; ?></td>
    </tr>
    <tr>
      <th>Consignee Name</th>
      <td><?php echo $show['Consignee_Name']; ?></td>
    </tr>
    <tr>
      <th>Destination</th>
      <td><?php echo $show['Destination']; ?></td>
    </tr>
    <tr>
      <th>Mode</th>
      <td><?php echo $show['Mode']; ?></td>
    </tr>
    <tr>
      <th>AWB No</th>
      <td><?php echo $show['AWB_No']; ?></td>
    </tr>
    <tr>
      <th>SB Ref No</th>
      <td><?php echo $show['SB_Ref_No']; ?></td>
    </tr>
    <tr>
      <th>Courier Name</th>
      <td><?php echo $show['Courier_Name']; ?></td>
    </tr>
    <tr>
      <th>Qty</th>
      <td><?php echo $show['Qty']; ?></td>
    </tr>
    <tr>
      <th>Weight</th>
      <td><?php echo $show['Weight']; ?></td>
    </tr>
    <tr>
      <th>Content</th>
      <td><?php echo $show['Content']; ?></td>
    </tr>
    <tr>
      <th>L</th>
      <td><?php echo $show['L']; ?></td>
    </tr>
    <tr>
      <th>B</th>
      <td><?php echo $show['B']; ?></td>
    </tr>
    <tr>
      <th>H</th>
      <td><?php echo $show['H']; ?></td>
    </tr>
    <tr>
      <th>Delivery Date</th>
      <td><?php echo $show['Delivery_Date']; ?></td>
    </tr>
    <tr>
      <th>Delivery Time</th>
      <td><?php echo $show['Delivery_Time']; ?></td>
    </tr>
    <tr>
      <th>Received By</th>
      <td><?php echo $show['Received_By']; ?></td>
    </tr>
    <tr>
      <th>Statu Remarks</th>
      <td><?php echo $show['Statu_Remarks']; ?></td>
    </tr>
  </table>
</div>
