<?php
if(!isset($_SESSION['user_id']) and isset($_SESSION['seller_id']))
{
	header("location:index.php");
}
elseif(isset($_SESSION['user_id']))
{
	header("location:index.php");
}

if(isset($_POST['submit']))
{
	$uname=$_POST['username'];
	$mobile=$_POST['mobile'];
	$pass=$_POST['password'];
	$cpass=$_POST['cpassword'];

	$sql1=mysqli_query($con,"select * from user where email='$uname' and mobile='$mobile'");
	$row=mysqli_fetch_array($sql1);
	if($row)
	{
		$id=$row['id'];
		$sql=mysqli_query($con,"update user set password='$pass',cpassword='$cpass' where id='$id'");
		if($sql)
		{
			header("location:index.php?page=login");
		}
		else
		{
			echo "<script> alert('Password Not Forgot'); </script>";
		}
	}
	else
	{
		echo "<script> alert('Username and Mobile Does Not Exist'); </script>";
	}
}
?>
<!-- login -->
	<div class="login" style="padding:2em 0;">
		<div class="container">
			<h2>Forgot Password</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="" method="post" onSubmit="return forgot_form();">
					<input type="email" name="username" id="username" placeholder="Email Address">
						<span style="display:none; color:#FF0000;" id="req_login_email">Enter Email</span>
					<input type="text" name="mobile" id="mobile" placeholder="What Is Your Mobile Number ?" style="margin-top:15px;">
						<span style="display:none; color:#FF0000;" id="req_mobile">Enter Mobile</span>
						<span style="display:none; color:#FF0000;" id="valid_mobile">Enter Valid Mobile</span>
					<input type="password" name="password" id="pass" placeholder="Enter New Password">
						<span style="display:none; color:#FF0000;" id="req_pass">Enter Password</span>
					<span style="display:none; color:#FF0000;" id="valid_pass">Enter Valid Password</span>
					<input type="password" name="cpassword" id="cpass" placeholder="Confirm New Password">
						<span style="display:none; color:#FF0000;" id="req_cpass">Enter Password</span>
						<span style="display:none; color:#FF0000;" id="valid_cpass">Password Not Match</span>
					<input type="submit" value="Forgot" name="submit">
				</form>
			</div>
		</div>
	</div>
<!-- //login -->