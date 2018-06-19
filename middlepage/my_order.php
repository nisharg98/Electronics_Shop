<?php
if(!isset($_SESSION['user_id']) and isset($_SESSION['seller_id']))
{
	header("location:index.php");
}
elseif(!isset($_SESSION['user_id']) and !isset($_SESSION['seller_id']))
{
	header("location:index.php?page=login");
}

if(isset($_GET['order_id']))
{
	$order_id=$_GET['order_id'];
	$sql=mysqli_query($con,"update track_order set status='Cancelled' where order_id='$order_id'");
	
	$sql1=mysqli_query($con,"select * from order_detail where order_id='$order_id'");
	$row1=mysqli_fetch_array($sql1);
	$pid1=$row1['pid'];
	$sql2=mysqli_query($con,"select * from product where pid='$pid1'");
	$row2=mysqli_fetch_array($sql2);
	$stock=$row2['stock'];
	$stock1=$stock+1;
	$sql3=mysqli_query($con,"update product set stock='$stock1' where pid='$pid1'");
	
	if($sql)
	{
		header("location:index.php?page=user_account&sub=my_order");
	}	
	else
	{
		echo "<script> alert('Your Order Cancellation Fail'); </script>";
	}
}
?>
<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s" style="float:left;margin:0px;width:70%;">
	<h3 style="margin-bottom:10px;">My Orders</h3>
	<br/>
	<?php
		$id=$_SESSION['user_id'];
		$sql=mysqli_query($con,"select * from order_detail where user_id='$id' ORDER BY order_id DESC");
		$count=mysqli_num_rows($sql);
		if($count==0)
		{
			echo '<h3 style="margin:0 0 0 150px; font-size:18px;">You Have No Orders Yet, Continue Shopping</h3>';
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
			<b>Amount:</b> ₹<?php echo $row['price']; ?>
		</div>
		<div class="myaddress">
		<b>Address:</b><br/>
		<?php
			$sql2=mysqli_query($con,"select * from user_address where user_id='$id'");
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
				<?php echo "&nbsp;&nbsp;Seller:".$row['seller_name']; ?><br/>
				<?php echo "&nbsp;&nbsp;Qty:".$row['quantity']; ?>
			</div>
			<div style="height:120px;width:45%;float:left;padding-top:40px;">
				<center>
				<a href="index.php?page=track_order&order_id=<?php echo $order_id; ?>" style="font-size:17px;">Track Order</a><br/>
				<?php
				$sql4=mysqli_query($con,"select * from track_order where order_id='$order_id'");
				$row4=mysqli_fetch_array($sql4);
				$status=$row4['status'];
				if($status=='')
				{
				?>
				<a href="index.php?page=user_account&sub=my_order&order_id=<?php echo $order_id; ?>" style="font-size:17px;">Cancel/Return</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php }
				elseif($status=='Delivered')
				{?>
					<a>Delivered on <?php echo $row4['delivery_date']; ?></a><br/>
				<?php }
				elseif($status=='Cancelled')
				{ ?>
					<a>Your Order has been Cancelled</a>
				<?php }
				?>
				<?php
				if(!($status=='Cancelled'))
				{
				?>
				<a href="index.php?page=order_invoice&order_id=<?php echo $order_id ?>" style="font-size:17px;">View Invoice</a>
				<?php } ?>
				</center>
			</div>
		</div>
	</div>
		<?php } } ?>
</div>