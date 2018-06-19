<?php
if(!isset($_SESSION['user_id']) and isset($_SESSION['seller_id']))
{
	header("location:index.php");
}
elseif(!isset($_SESSION['user_id']) and !isset($_SESSION['seller_id']))
{
	header("location:index.php?page=login");
}
?>
<div class="products">
	<div class="container">
	<div class="order">
		<div class="title">
			<h3 style="color:#fff;line-height:40px;margin-left:10px;">ORDER DETAILS</h3>
		</div>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Order Date</th>
							<th>Product</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Seller Name</th>
							<th>Address</th>
							<th>Track</th>
						</tr>
					</thead>
					<?php
						$user_id=$_SESSION['user_id'];
						$sql=mysqli_query($con,"select * from order_detail where user_id='$user_id' ORDER BY order_id DESC");
						while($row=mysqli_fetch_array($sql))
						{
					?>
					<tr class="rem1">
						<td class="invert"><?php echo $row['order_id']; ?></td>
						<td class="invert"><?php echo $row['order_date']; ?></td>
						<td class="invert-image" >
							<?php
								$pid=$row['pid'];
								$sql2=mysqli_query($con,"select * from product where pid='$pid'");
								$row2=mysqli_fetch_array($sql2);
							?>
							<a href="index.php?page=single&pid=<?php echo $pid; ?>"><img style="height:90px; width:70px;" src="<?php echo "admin/img/product_image/".$row2['image']; ?>" alt=" " class="img-responsive" /></a>
						</td>
						<td class="invert"><?php echo $row['product_name']; ?></td>
						<td class="invert"><?php echo $row['quantity']; ?></td>
						<td class="invert">₹<?php echo $row['price']; ?></td>
						<td class="invert"><?php echo $row['seller_name']; ?></td>
						<td class="invert">
						<?php
							$sql3=mysqli_query($con,"select * from user_address where user_id='$user_id'");
							$row3=mysqli_fetch_array($sql3);
							echo "<p>".$row3['user_name']."</p>"."<br/>";
							echo $row3['address']."<br/>";
							echo $row3['landmark']."<br/>";
							echo $row3['city']."<br/>";
							echo $row3['state']."-".$row3['pincode']."<br/><br/>";
							echo $row3['mobile']."<br/>";
						?>						
						</td>
						<td class="invert">
							<a href="index.php?page=track_order&order_id=<?php echo $row['order_id']; ?>">Track Order</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>