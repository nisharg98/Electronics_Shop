<?php
if(!isset($_SESSION['user_id']) and isset($_SESSION['seller_id']))
{
	header("location:index.php");
}
elseif(!isset($_SESSION['user_id']) and !isset($_SESSION['seller_id']))
{
	header("location:index.php?page=login");
}

if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	//update
	$sql=mysqli_query($con,"update user set password='$pass',cpassword='$cpass' where id='$id'");
	if($sql)
	{
		$_SESSION['pass']=$pass;
		echo "<script> alert('Password Change Successfully'); </script>";
	}
	else
	{
		echo "<script> alert('Password Not Change'); </script>";
	}
}

$id=$_SESSION['user_id'];
?>
<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s" style="float:left;margin:0px;width:50%;">
	<h3 style="margin-bottom:10px;">Change Password</h3>
	<br/>
	<form action="" method="post">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div style="width:185px;float:left;">Enter New Password:</div>
	<input type="password" name="pass" style="width:60%;" required="">
	<div style="width:185px;float:left;margin-top:10px;">Confirm New Password:</div>
	<input type="password" name="cpass" style="width:60%;margin-top:10px;" required="">
	<input type="submit" value="Save" name="submit" style="width:35%; margin-left:185px;">
	</form>
</div>