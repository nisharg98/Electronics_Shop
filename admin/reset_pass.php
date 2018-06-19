<?php
include("include/config.php");
session_start();
if(isset($_SESSION['uname']))
{
	header("location:index.php");
}
if(isset($_POST['submit']))
{
	$uname=$_POST['username'];
	$mobile=$_POST['mobile'];
	$pass=$_POST['password'];
	$cpass=$_POST['cpassword'];

	$sql1=mysqli_query($con,"select * from admin where email='$uname' and mobile='$mobile'");
	$row=mysqli_fetch_array($sql1);
	if($row)
	{
		$id=$row['id'];
		$sql=mysqli_query($con,"update admin set password='$pass',cpassword='$cpass' where id='$id'");
		if($sql)
		{
			header("location:login.php");
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">   
    
    <!-- Styles -->
    
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap-overrides.css" rel="stylesheet">
    
	<link href="css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet">
        
    <link href="css/slate.css" rel="stylesheet">
    
	<link href="css/components/signin.css" rel="stylesheet" type="text/css">   
    
    <!-- Javascript -->
    
    <script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/jquery-ui-1.8.18.custom.min.js"></script>    
	<script src="js/jquery.ui.touch-punch.min.js"></script>
	<script src="js/bootstrap.js"></script>

	<script src="js/demos/signin.js"></script>
	
	<script src="js/validate.js"></script>
	
</head>
<body>
<div class="account-container login">
	<div class="content clearfix">
		<form action="" method="post" onSubmit="return forgot_form();">
			<h1>Forgot Password</h1>
			<div class="login-fields">
				<p>Forgot password using your registered mobile:</p>
				<div class="field">
					<input type="email" id="username" name="username"  placeholder="Username" class="login username-field" />
					<span style="display:none; color:#FF0000;" id="req_login_email">Enter Email</span>
				</div> <!-- /field -->
				<div class="field">
					<input type="text" id="mobile"  name="mobile"  placeholder="What Is Your Mobile Number ?" style="padding:11px 55px 10px 10px; font-size:14px;"/>
					<span style="display:none; color:#FF0000;" id="req_mobile">Enter Mobile</span>
                    <span style="display:none; color:#FF0000;" id="valid_mobile">Enter Valid Mobile</span>
				</div> <!-- /field -->
				<div class="field">
					<input type="password" id="pass"  name="password"  placeholder="Enter New Password" style="padding:11px 55px 10px 10px; font-size:14px;"/>
					<span style="display:none; color:#FF0000;" id="req_pass">Enter Password</span>
					<span style="display:none; color:#FF0000;" id="valid_pass">Enter Valid Password</span>
				</div> <!-- /field -->
				<div class="field">
					<input type="password" id="cpass"  name="cpassword"  placeholder="Confirm New Password" style="padding:11px 55px 10px 10px; font-size:14px;"/>
					<span style="display:none; color:#FF0000;" id="req_cpass">Enter Password</span>
                    <span style="display:none; color:#FF0000;" id="valid_cpass">Password Not Match</span>
				</div> <!-- /field -->
			</div> <!-- /login-fields -->
			<div class="login-actions">
				<input type="submit" name="submit" value="Forgot" class="button btn btn-secondary btn-large" style="margin-right:25px;">
			</div> <!-- .actions -->
		</form>
	</div> <!-- /content -->
</div> <!-- /account-container -->
</body>
</html>