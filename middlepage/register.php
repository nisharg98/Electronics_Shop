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
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$cpass=$_POST['cpassword'];
	$mobile=$_POST['mobile'];
	if(isset($_POST['news']))
	{
		$news=$_POST['news'];
	}
	else
	{
		$news="no";
	}
	$sql=mysqli_query($con,"select * from user where email='$email'");
	$row=mysqli_fetch_array($sql);
	if($row['email']==$email)
	{
		echo "<script> alert('Email Id Already Exist!'); </script>";
	}
	else
	{
		$result=mysqli_query($con,"insert into user(fname,lname,email,password,cpassword,mobile,newsletter)values('$fname','$lname','$email','$pass','$cpass','$mobile','$news')");
		if($result)
		{
			echo "<script> alert('Account Created Successfully \\nYour Login Id: $email \\nYour Password: $pass'); </script>";
		}
		else
		{
			echo "<script> alert('Account Not Created'); </script>";
		}
	}
}
?>
<!-- register -->
	<div class="register" style="padding:2em 0;">
		<div class="container">
			<h2>Register Here</h2>
			<div class="login-form-grids">
				<h5>profile information</h5>
				<form action="" method="post" onsubmit="return user_form();">
					<input type="text" name="fname" id="fname" placeholder="First Name...">
						<span style="display:none; color:#FF0000;" id="req_fname">Enter First Name</span>
                        <span style="display:none; color:#FF0000;" id="valid_fname">Enter Valid First Name</span>
					<br/>
					<input type="text" name="lname" id="lname" placeholder="Last Name...">
						<span style="display:none; color:#FF0000;" id="req_lname">Enter Last Name</span>
                        <span style="display:none; color:#FF0000;" id="valid_lname">Enter Valid Last Name</span>
					<br/>
					<input type="text" name="mobile" id="mobile" placeholder="Mobile No...">
						<span style="display:none; color:#FF0000;" id="req_mobile">Enter Mobile</span>
                        <span style="display:none; color:#FF0000;" id="valid_mobile">Enter Valid Mobile</span>
				
				<div class="register-check-box">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="news" value="yes"><i> </i>Subscribe to Newsletter</label>
					</div>
				</div>
				<h6>Login information</h6>
					
					<input type="email" name="email" id="email" placeholder="Email Address">
						<span style="display:none; color:#FF0000;" id="req_email">Enter email id</span>
					<input type="password" name="password" id="pass" placeholder="Password">
						<span style="display:none; color:#FF0000;" id="req_pass">Enter Password</span>
                        <span style="display:none; color:#FF0000;" id="valid_pass">Enter Valid Password</span>
					<input type="password" name="cpassword" id="cpass" placeholder="Password Confirmation">
						<span style="display:none; color:#FF0000;" id="req_cpass">Enter Password</span>
                        <span style="display:none; color:#FF0000;" id="valid_cpass">Password Not Match</span>
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox" required="checked"><i> </i>I accept the terms and conditions</label>
						</div>
					</div>
					<input type="submit" value="Register" name="submit">
				</form>
			</div>
			<div class="register-home">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->