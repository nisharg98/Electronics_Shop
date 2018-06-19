<!-- header -->
<div class="agileits_header">
	<div class="container">
		<div class="w3l_offers">
			<!--<p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="products.html">SHOP NOW</a></p>-->
		</div>
		<div class="agile-login">
			<ul>
				<?php if(isset($_SESSION['email'])||isset($_SESSION['pass'])) 
				{
					$email=$_SESSION['email'];
					$pass=$_SESSION['pass'];
					$sql=mysqli_query($con,"select * from user where email='$email' and password='$pass'");
					$row=mysqli_fetch_array($sql);
				?>
					<li><a>Welcome <?php echo $row['fname']; ?></a></li>
					<li><a href="index.php?page=user_account">My Account</a></li>
					<li><a href="index.php?action=logout">Logout</a></li>
				<?php } 
				elseif(isset($_SESSION['seller_email'])||isset($_SESSION['seller_pass']))
				{
					$seller_email=$_SESSION['seller_email'];
					$seller_pass=$_SESSION['seller_pass'];
					$sql2=mysqli_query($con,"select * from seller where email='$seller_email' and password='$seller_pass'");
					$row2=mysqli_fetch_array($sql2);
				?>
					<li><a>Welcome <?php echo $row2['fname']; ?></a></li>
					<li><a href="index.php?page=seller_account">My Account</a></li>
					<li><a href="index.php?action=seller_logout">Logout</a></li>
				<?php } else { ?>
					<li><a href="index.php?page=seller_login"> Seller </a></li>
					<li><a href="index.php?page=register"> Create Account </a></li>
					<li><a href="index.php?page=login">Login</a></li>
				<?php } ?>
					<li><a href="index.php?page=contact">Help</a></li>
			</ul>
		</div>
		<?php
		if(isset($_SESSION['user_id']))
		{
		?>
		<div class="product_list_header">  
			<form action="index.php?page=checkout" method="post" class="last"> 
				<input type="hidden" name="cmd" value="_cart">
				<input type="hidden" name="display" value="1">
				<button class="w3view-cart" type="submit" name="submit" value="">		
				<i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
			</form>  
		</div>
		<?php } ?>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="logo_products">
	<div class="container">
		<div class="w3ls_logo_products_left1">
			<ul class="phone_email">
				<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+91) 7405179376</li>	
			</ul>
		</div>
		<div class="w3ls_logo_products_left">
			<h1><a href="index.php">Electronics Shop</a></h1>
		</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="search" name="Search" placeholder="Search for a Product..." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //header -->