<!-- //footer -->
<div class="footer" style="padding:1em;">
	<div class="container">
		<div class="w3_footer_grids">
			<div class="col-md-3 w3_footer_grid" style="width:35%;margin-left:100px;">
				<h3 style="margin-bottom:1em;">Contact</h3>		
				<ul class="address">
					<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Naranpura, Ahmedabad City.</li>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@electronicsshop.com">info@electronicsshop.com</a></li>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+91 7405179376</li>
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid" style="width:30%;">
				<h3 style="margin-bottom:1em;">Information</h3>
				<ul class="info"> 
					<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="index.php?page=contact">Contact Us</a></li>
					<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="index.php?page=faq">FAQ's</a></li>
					<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Special Products</a></li>
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid" style="width:20%;">
				<h3 style="margin-bottom:1em;">Profile</h3>
				<ul class="info">
					<?php
					if(isset($_SESSION['seller_id']))
					{
					?>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="index.php?page=seller_account">My Account</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="index.php?page=seller_account&sub=seller_order">My Orders</a></li>
					<?php }
					if(isset($_SESSION['user_id']))
					{
					?>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="index.php?page=user_account">My Account</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="index.php?page=checkout">My Cart</a></li>
					<?php }
					if(!isset($_SESSION['user_id']) && !isset($_SESSION['seller_id']))
					{
					?>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="index.php?page=login">Login</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="index.php?page=register">Create Account</a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="footer-copy">
		<div class="container">
			<p style="margin:1em;">© 2018 Electronics Shop. All rights reserved | Developed by <a>Nisharg Prajapati</a></p>
		</div>
	</div>
</div>	
<div class="footer-botm">
	<div class="container">
		<div class="w3layouts-foot">
			<ul>
				<li><a class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				<li><a class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		<div class="payment-w3ls">	
			<img src="images/card.png" alt=" " class="img-responsive">
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //footer -->