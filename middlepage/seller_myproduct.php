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
	<h3 style="margin-bottom:10px;">My Products</h3>
	<br/>
	<?php
		$id=$_SESSION['seller_id'];
		$sql5=mysqli_query($con,"select * from seller where id='$id'");
		$row5=mysqli_fetch_array($sql5);
		$seller=$row5['fname']." ".$row5['lname'];
		
		$sql=mysqli_query($con,"select * from product where seller_name='$seller' ORDER BY pid DESC");
		$count=mysqli_num_rows($sql);
		if($count==0)
		{
			echo '<h3 style="margin:0 0 0 200px; font-size:18px;">You Have Not Added Any Products</h3>';
		}
		else
		{
		while($row=mysqli_fetch_array($sql))
		{
			$pid=$row['pid'];
	?>
	<div class="myorder">
		<div class="orderdetail">
			<b>Product Id:</b> <?php echo $row['pid']; ?>
			<br/>
			<b>Product Category:</b> <?php echo $row['category_name']; ?>
			<br/>
			<b>Stock:</b> <?php echo $row['stock']; ?>
			<br/>
			<b>Price:</b> ₹<?php echo $row['price']; ?>
			<br/>
		</div>
		<div class="myaddress">
		<b>Product Description:</b><br/>
		<?php echo $row['product_description']; ?>
		</div>
		<div class="myproduct">
			<div style="height:120px;width:100px;float:left;">
				<img src="<?php echo "admin/img/product_image/".$row['image']; ?>" height="120" width="100" />
			</div>
			<div style="height:120px;;width:40%;float:left;">
				<b><?php echo "&nbsp;&nbsp;".$row['product_name']; ?></b><br/>
			</div>
		</div>
	</div>
		<?php } } ?>
</div>