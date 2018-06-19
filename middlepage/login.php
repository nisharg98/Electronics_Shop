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
	$email=$_POST['email'];
	$pass=$_POST['password'];
	
	$result=mysqli_query($con,"select * from user where email='$email' and password='$pass' and status='active'");
	$row=mysqli_fetch_array($result);
	if($row['password']==$pass)
	{
		$_SESSION['user_id']=$row['id'];
		$_SESSION['email']=$email;
		$_SESSION['pass']=$pass;
		header("location:index.php");
	}
	else
	{
		echo "<script> alert('Username and Password is Incorrect'); </script>";
	}
}
?>
<!-- login -->
	<div class="login" style="padding:2em 0;">
		<div class="container">
			<h2>Login Form</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="" method="post" onSubmit="return login_form();">
					<input type="email" name="email" id="username" placeholder="Email Address">
						<span style="display:none; color:#FF0000;" id="req_login_email">Enter Email</span>
					<input type="password" name="password" id="password" placeholder="Password">
						<span style="display:none; color:#FF0000;" id="req_login_pass">Enter Password</span>
						<span style="display:none; color:#FF0000;" id="valid_login_pass">Enter Valid Password</span>
					<div class="forgot">
						<a href="index.php?page=forgot_pass">Forgot Password?</a>
					</div>
					<input type="submit" value="Login" name="submit">
				</form>
			</div>
			<h4>For New People</h4>
			<p><a href="index.php?page=register">Register Here</a> (Or) go back to <a href="index.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->