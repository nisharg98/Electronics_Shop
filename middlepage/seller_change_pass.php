<?php
if(!isset($_SESSION['seller_id']) and isset($_SESSION['user_id']))
{
	header("location:index.php");
}
elseif(!isset($_SESSION['seller_id']) and !isset($_SESSION['user_id']))
{
	header("location:index.php?page=seller_login");
}

if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	//update
	$sql=mysqli_query($con,"update seller set password='$pass',cpassword='$cpass' where id='$id'");
	if($sql)
	{
		$_SESSION['seller_pass']=$pass;
		echo "<script> alert('Password Update Successfully'); </script>";
	}
	else
	{
		echo "<script> alert('Password Not Update'); </script>";
	}
}

$id=$_SESSION['seller_id'];
$sql=mysqli_query($con,"select * from seller where id='$id'");
$row=mysqli_fetch_array($sql);
?>
<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s" style="float:left;margin:0px;width:50%;">
	<h3 style="margin-bottom:10px;">Change Password</h3>
	<br/>
	<form action="" method="post">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	<div style="width:185px;float:left;">Enter New Password:</div>
	<input type="password" name="pass" style="width:60%;" required="">
	<div style="width:185px;float:left;margin-top:10px;">Confirm New Password:</div>
	<input type="password" name="cpass" style="width:60%;margin-top:10px;" required="">
	<input type="submit" value="Save" name="submit" style="width:35%; margin-left:185px;">
	</form>
</div>