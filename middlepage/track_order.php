<?php
if(!isset($_SESSION['user_id']) and !isset($_SESSION['seller_id']))
{
	header("location:index.php?page=login");
}

if(isset($_GET['order_id']))
{
	$order_id=$_GET['order_id'];
}
else
{
	$order_id='';
}
$sql=mysqli_query($con,"select * from track_order where order_id='$order_id'");
$row=mysqli_fetch_array($sql);
?>
<div class="products">
	<div class="container">
	<div class="order">
		<div class="title">
		<h3 style="color:#fff;line-height:40px;margin-left:10px;">ORDER TRACKING</h3>
		</div>
		<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Date</th>
							<th>Status</th>
						</tr>
					</thead>
					<tr class="rem1">
						<td class="invert" rowspan="4"><?php echo $row['order_id']; ?></td>
						<td class="invert"><?php echo $row['approval_date']; ?></td>
						<td class="invert"><?php echo $row['approval_status']; ?></td>
					</tr>
					<?php
					$status=$row['status'];
					if($status=='Cancelled')
					{
					?>
					<tr>
						<td colspan="2"><?php echo "Your Order has been Cancelled"; ?></td>
					</tr>
					<?php } 
					else
					{
					?>
					<tr>
						<td><?php echo $row['processing_date']; ?></td>
						<td><?php echo $row['processing_status']; ?></td>
					</tr>
					<tr>
						<td><?php echo $row['shipping_date']; ?></td>
						<td><?php echo $row['shipping_status']; ?></td>
					</tr>
					<tr>
						<td><?php echo $row['delivery_date']; ?></td>
						<td><?php echo $row['delivery_status']; ?></td>
					</tr>
					<?php } ?>
				</table>
		</div>
	</div>
	</div>
</div>