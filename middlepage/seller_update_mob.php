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
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	//update
	$sql=mysqli_query($con,"update seller set email='$email',mobile='$mobile' where id='$id'");
	if($sql)
	{
		$_SESSION['seller_email']=$email;
		echo "<script> alert('Details Updated'); </script>";
	}
	else
	{
		echo "<script> alert('Details Not Update'); </script>";
	}
}

$id=$_SESSION['seller_id'];
$sql=mysqli_query($con,"select * from seller where id='$id'");
$row=mysqli_fetch_array($sql);
?>
<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s" style="float:left;margin:0px;width:45%;">
	<h3 style="margin-bottom:10px;">Update Details</h3>
	<br/>
	<form action="" method="post">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	<div style="width:90px;float:left;">Email Id:</div>
	<input type="email" name="email" style="width:70%;" readonly value="<?php echo $row['email']; ?>">
	<div style="width:90px;float:left;margin-top:10px;">Mobile No:</div>
	<input type="text" name="mobile" style="width:70%;margin-top:10px;" value="<?php echo $row['mobile']; ?>">
	<input type="submit" value="Save" name="submit" style="width:45%; margin-left:90px;">
	</form>
</div>