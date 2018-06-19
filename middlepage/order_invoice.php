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
}
else
{
	$order_id='';
}
?>
<div class="products">
	<div class="container">
	<div class="order">
		<div class="title" style="margin-bottom:20px;">
			<h3 style="color:#fff;line-height:40px;margin-left:10px;">ORDER INVOICE</h3>
		</div>
		<div  style="height:100%;width:100%;border:1px solid;float:left;">
		<div class="add" style="border:1px solid;width:30%;margin-top:30px;">
			<?php
			$id=$_SESSION['user_id'];
			$sql=mysqli_query($con,"select * from order_detail where order_id='$order_id'");
			$row=mysqli_fetch_array($sql);
			echo "Order Id: ".$row['order_id']."<br/>";
			echo "Order Date: ".$row['order_date']."<br/>";
			echo "Amount: ₹".$row['price'];
			?>
		</div>
		
		<div class="add" style="border:1px solid;width:20%;margin-left:30%;margin-top:20px;">
			<?php
			$id=$_SESSION['user_id'];
			$sql2=mysqli_query($con,"select * from user_address where user_id='$id'");
			$row2=mysqli_fetch_array($sql2);
			echo "<h4 style=margin-bottom:5px;><u>Delivery Address:</u></h4>";
			echo "<p>".$row2['user_name']."</p>"."<br/>";
			echo $row2['address']."<br/>";
			echo $row2['landmark']."<br/>";
			echo $row2['city']."<br/>";
			echo $row2['state']."-".$row2['pincode']."<br/><br/>";
			echo $row2['mobile']."<br/>";
			?>
		</div>
		<div  style="height:80px;width:30%;border:1px solid;float:left;margin-left:100px;margin-top:-100px;"> 
		<?php
		echo "Seller Name: ".$row['seller_name']."<br/>";
		$sql3=mysqli_query($con,"select * from payment where order_id='$order_id'");
		$row3=mysqli_fetch_array($sql3);
		echo "Payment Mode: ".$row3['payment_method'];
		?>
		</div>
		<div style="height:100%;width:88%;float:left;margin-top:30px;margin-left:70px;">
			<table style="width:100%;">
				<tr>
					<th style="border:1px solid;padding-left:10px;">Product</th>
					<th style="border:1px solid;padding-left:10px;">Title</th>
					<th style="border:1px solid;padding-left:10px;">Quantity</th>
					<th style="border:1px solid;padding-left:10px;">Price</th>
				</tr>
				<tr>
					<td style="border:1px solid;padding-left:10px;"><?php echo $row['product_category']; ?></td>
					<td style="border:1px solid;padding-left:10px;"><?php echo $row['product_name']; ?></td>
					<td style="border:1px solid;padding-left:10px;"><?php echo $row['quantity']; ?></td>
					<td style="border:1px solid;padding-left:10px;">₹<?php echo $row['price']; ?></td>
				</tr>
			</table>
			<button onclick="myFunction()" style="margin:20px 0 20px 500px;">Print</button>
			<script>
				function myFunction() {
				window.print();
				}
			</script>
		</div>
		</div>
	</div>
	</div>
</div>