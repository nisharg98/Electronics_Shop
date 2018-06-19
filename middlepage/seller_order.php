<?php
if(!isset($_SESSION['seller_id']) and isset($_SESSION['user_id']))
{
	header("location:index.php");
}
elseif(!isset($_SESSION['seller_id']) and !isset($_SESSION['user_id']))
{
	header("location:index.php?page=seller_login");
}
?>
<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s" style="float:left;margin:0px;width:70%;">
	<h3 style="margin-bottom:10px;">Customer Orders</h3>
	<br/>
	<?php
		$id=$_SESSION['seller_id'];
		$sql5=mysqli_query($con,"select * from seller where id='$id'");
		$row5=mysqli_fetch_array($sql5);
		$seller=$row5['fname']." ".$row5['lname'];
		
		$sql=mysqli_query($con,"select * from order_detail where seller_name='$seller' ORDER BY order_id DESC");
		$count=mysqli_num_rows($sql);
		if($count==0)
		{
			echo '<h3 style="margin:0 0 0 180px; font-size:18px;">You Have No Orders Yet, Continue Selling</h3>';
		}
		else
		{
		while($row=mysqli_fetch_array($sql))
		{
			$order_id=$row['order_id'];
	?>
	<div class="myorder">
		<div class="orderdetail">
			<b>Order Id:</b> <?php echo $row['order_id']; ?>
			<br/>
			<b>Order Date:</b> <?php echo $row['order_date']; ?>
			<br/>
			<?php
			$user_id=$row['user_id'];
			$sql6=mysqli_query($con,"select * from user where id='$user_id'");
			$row6=mysqli_fetch_array($sql6);
			?>
			<b>Customer Id:</b> <?php echo $row6['id']; ?>
			<br/>
			<b>Customer Name:</b> <?php echo $row6['fname']." ".$row6['lname']; ?>
			<br/>
			<b>Amount:</b> ₹<?php echo $row['price']; ?>
		</div>
		<div class="myaddress">
		<b>Customer Address:</b><br/>
		<?php
			$user_id=$row['user_id'];
			$sql2=mysqli_query($con,"select * from user_address where user_id='$user_id'");
			$row2=mysqli_fetch_array($sql2);
			//echo "<p>".$row2['user_name']."</p>"."<br/>";
			echo $row2['address']."<br/>";
			echo $row2['landmark']."<br/>";
			echo $row2['city']."<br/>";
			echo $row2['state']."-".$row2['pincode']."<br/>";
			//echo $row2['mobile']."<br/>";
		?>
		</div>
		<div class="myproduct">
			<div style="height:120px;width:100px;float:left;">
				<?php
				$pid=$row['pid'];
				$sql3=mysqli_query($con,"select * from product where pid='$pid'");
				$row3=mysqli_fetch_array($sql3);
				?>
				<img src="<?php echo "admin/img/product_image/".$row3['image']; ?>" height="120" width="100" />
			</div>
			<div style="height:120px;;width:40%;float:left;">
				<b><?php echo "&nbsp;&nbsp;".$row['product_name']; ?></b><br/>
				<?php echo "&nbsp;&nbsp;Qty:".$row['quantity']; ?>
			</div>
			<div style="height:120px;width:45%;float:left;padding-top:40px;">
				
				<center>
				<a href="index.php?page=track_order&order_id=<?php echo $order_id; ?>" style="font-size:17px;">Track Order</a><br/>
				</center>
			</div>
		</div>
	</div>
		<?php } } ?>
</div>