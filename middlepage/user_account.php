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
		<div class="col-md-4 products-left">
			<div class="categories">
				<h2>My Account</h2>
				<ul class="cate">
					<li><a>ORDERS</a></li>
					<ul>
						<li><a href="index.php?page=user_account&sub=my_order"><i class="fa fa-arrow-right" aria-hidden="true"></i>My Orders</a></li>
					</ul>
					<li><a>SETTINGS</a></li>
					<ul>
						<li><a href="index.php?page=user_account&sub=personal_info"><i class="fa fa-arrow-right" aria-hidden="true"></i>Personal Information</a></li>
						<li><a href="index.php?page=user_account&sub=change_pass"><i class="fa fa-arrow-right" aria-hidden="true"></i>Change Password</a></li>
						<li><a href="index.php?page=user_account&sub=add_address"><i class="fa fa-arrow-right" aria-hidden="true"></i>My Addresses</a></li>
						<li><a href="index.php?page=user_account&sub=update_mob"><i class="fa fa-arrow-right" aria-hidden="true"></i>Update Email/Mobile</a></li>
					</ul>
				</ul>
			</div>																																												
		</div>
		<?php
			if(isset($_REQUEST['sub']))
			{
				$sub=$_REQUEST['sub'];
			}
			else
			{
				$sub='';
			}
			if(basename($_SERVER['PHP_SELF']) == 'index.php' && $sub == '')
			{
				$sub='personal_info';
			}
			if($sub != '' && file_exists('middlepage/'.$sub.'.php'))
			{
				include('middlepage/'.$sub.'.php');
			}
			else
			{
				//$page="404";
				include('middlepage/error.php');
			}
		?>
	</div>
</div>	