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
		<h3 style="color:#fff;line-height:40px;margin-left:10px;">ORDER SUMMARY</h3>
		</div>
		<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>item</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Subtotal</th>
							<th>Remove</th>
						</tr>
					</thead>
					<?php
						$user_id=$_SESSION['user_id'];
						$sql=mysqli_query($con,"select * from cart where user_id='$user_id'");
						$count=mysqli_num_rows($sql);
						if($count!='')
						{
						while($row=mysqli_fetch_array($sql))
						{
							if(!isset($total))
							{
								$total=null;
							}
							$all=$row['price'];
							$i=$total+$all;
							$total=$i;
					?>
					<tr class="rem1">
						<td class="invert-image" style="height:100px; width:400px;">
							<?php
								$pid=$row['pid'];
								$sql2=mysqli_query($con,"select * from product where pid='$pid'");
								$row2=mysqli_fetch_array($sql2);
							?>
							<a href="index.php?page=single&pid=<?php echo $pid; ?>"><img style="height:150px; width:100px; float:left;margin-left:20px;" src="<?php echo "admin/img/product_image/".$row2['image']; ?>" alt=" "/></a>
							<?php echo $row2['product_name']; ?><br/>
							<?php echo $row2['product_description']; ?><br/>
							<u>Seller:<?php echo $row2['seller_name']; ?></u><br/>
						</td>
						<td class="invert">₹<?php echo $row['price']; ?></td>
						<td class="invert">1</td>
						<td class="invert">₹<?php echo $row['price']; ?></td>
						<td class="invert">
							<div class="rem">
								<a href="index.php?page=single_action&id=<?php echo $row['id']; ?>"><div class="close1"></div></a>
							</div>
							<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<td colspan="5" height="50" style="font-size:20px;padding-left:60%;"><b>Amount Payable: ₹<?php echo $total; ?></b></td>
					</tr>
					<?php }
					else {?>
						<tr>
							<td colspan="6">Your cart is Empty</td>
						</tr>
					<?php } ?>
					<!--quantity-->
					<script>
						$('.value-plus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
							divUpd.text(newVal);
						});

						$('.value-minus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
							if(newVal>=1) divUpd.text(newVal);
						});
					</script>
					<!--quantity-->
				</table>
				<div class="checkout-right-basket" style="width:230px;margin:5em 0 0 0">
				<?php
				if($count!='')
				{ ?>
					<a href="index.php?page=order_confirm" style="padding:10px 70px">Continue</a>
				<?php }
				else
				{ ?>
					<a href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				<?php } ?>
				</div>
		</div>
	</div>
	</div>
</div>