<?php
if(!isset($_SESSION['user_id']) and isset($_SESSION['seller_id']))
{
	header("location:index.php");
}
elseif(!isset($_SESSION['user_id']) and !isset($_SESSION['seller_id']))
{
	header("location:index.php?page=login");
}
$user_id=$_SESSION['user_id'];
$sql=mysqli_query($con,"select * from cart where user_id='$user_id'");
$count=mysqli_num_rows($sql);
?>
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h2>Your shopping cart contains: <span><?php echo $count; ?> Products</span></h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quantity</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<?php
						if($count!='')
						{
						while($row=mysqli_fetch_array($sql))
						{
							static $i=1;
					?>
					<tr class="rem1">
						<td class="invert"><?php echo $i; $i++; ?></td>
						<td class="invert-image" style="height:100px; width:300px;">
							<?php
								$pid=$row['pid'];
								$sql2=mysqli_query($con,"select * from product where pid='$pid'");
								$row2=mysqli_fetch_array($sql2);
							?>
							<a href="index.php?page=single&pid=<?php echo $pid; ?>"><img style="height:90px; width:70px;" src="<?php echo "admin/img/product_image/".$row2['image']; ?>" alt=" " class="img-responsive" /></a>
						</td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>1</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert"><?php echo $row['product_name']; ?></td>
						<td class="invert">₹<?php echo $row['price']; ?></td>
						<td class="invert">
							<div class="rem">
								<a href="index.php?page=single_action&cid=<?php echo $row['id']; ?>"><div class="close1"></div></a>
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
					<?php } }
					else { ?>
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
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Price details</h4>
					<ul>
					<?php
						$sql=mysqli_query($con,"select * from cart where user_id='$user_id'");
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
						<li><?php echo $row['product_name']; ?> <i>-</i> <span>₹<?php echo $row['price']; ?> </span></li>
					<?php } ?>
						<li
						style="
							font-size: 1em;
							color: #212121;
							font-weight: 600;
							padding: 1em 0;
							border-top: 1px solid #DDD;
							border-bottom: 1px solid #DDD;
							margin: 0em 0 0;">
						Total <i>-</i> <span>₹<?php if($count!=''){echo $total;}else{echo "0";} ?></span></li>
					</ul>
				</div>
				<div class="checkout-right-basket">
					<a href="index.php?page=order" style="margin-left:10px;">Place Order</a>
				</div>
				<div class="checkout-right-basket">
					<a href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //checkout -->