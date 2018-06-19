<?php
include("include/config.php");
session_start();
if(isset($_SESSION['uname']))
{
	header("location:index.php");
}

if(isset($_POST['username']))
{
	$uname=$_POST['username'];
	$pass=$_POST['password'];

	$result=mysqli_query($con,"select * from admin where email='$uname' and password='$pass' and status='active'");
	$row = mysqli_fetch_array($result);
	if($row['password']==$pass)
	{
		$_SESSION['id']=$row['id'];
		$_SESSION['uname']=$uname;
		$_SESSION['password']=$pass;
		if(isset($_POST['chk']) && $_POST['chk']=='yes')
		{
			setcookie('user',$uname,time()+3600);
			setcookie('pass',$pass,time()+3600);
		}
		header("location:index.php");
	}
	else 
	{
		echo "<script> alert('Username and Password is Incorrect'); </script>";
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
		<form action="" method="post" onSubmit="return login_form();">
			<h1>Sign In</h1>
			<div class="login-fields">
				<p>Sign in using your registered account:</p>
				<div class="field">
					<label for="username">Username:</label>
					<input type="email" id="username" name="username" value="<?php if(isset($_COOKIE['user'])) { echo $_COOKIE['user']; } ?>" placeholder="Username" class="login username-field" />
					<span style="display:none; color:#FF0000;" id="req_login_email">Enter Email</span>
				</div> <!-- /field -->
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="<?php if(isset($_COOKIE['pass'])) { echo $_COOKIE['pass']; } ?>" placeholder="Password" class="login password-field"/>
					<span style="display:none; color:#FF0000;" id="req_login_pass">Enter Password</span>
                    <span style="display:none; color:#FF0000;" id="valid_login_pass">Enter Valid Password</span>
				</div> <!-- /password -->
			</div> <!-- /login-fields -->
			<div class="login-actions">
				<span class="login-checkbox">
					<input id="Field" name="chk" type="checkbox" class="field login-checkbox" value="yes" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
				<button class="button btn btn-secondary btn-large">Sign In</button>	
			</div> <!-- .actions -->
			<div class="login-social">
				<!-- Text Under Box -->
				<div class="login-extra" style="margin:0px auto;">
					Remind <a href="reset_pass.php">Password</a>
				</div> <!-- /login-extra -->
			</div>
		</form>
	</div> <!-- /content -->
</div> <!-- /account-container -->
</body>
</html>