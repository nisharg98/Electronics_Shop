<?php 
$id=$_SESSION['id'];
$result=mysqli_query($con,"select * from admin where id='$id'");
while($row=mysqli_fetch_array($result))
{
?>
<div id="header">
	<div class="container">
		<h1><a href="index.php">Electronic Shop</a></h1>
		<div id="info">
			<a href="javascript:;" id="info-trigger">
				<i class="icon-cog"></i>
			</a>
			<div id="info-menu">
				<div class="info-details">
					<h4>Welcome, <?php echo $row['fname']." ".$row['lname']; ?>
					</h4>
					<p>
						Logged in as Admin.
						<br/>
						<a href="index.php?page=changepass">Change Password</a>
					</p>
				</div> <!-- /.info-details -->
				<div class="info-avatar">
						<?php
						if($row['profile']!=NULL)
						{ ?>
							<img src="<?php echo "img/admin_profile/".$row['profile']; ?>" height="70" width="70">
						<?php }
						else 
						{?>
							<img src="img/avatar.jpg">
						<?php } }?>
				</div> <!-- /.info-avatar -->
			</div> <!-- /#info-menu -->
		</div> <!-- /#info -->
	</div> <!-- /.container -->
</div> <!-- /#header -->