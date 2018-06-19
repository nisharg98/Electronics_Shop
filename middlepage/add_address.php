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
	$add_id=$_POST['add_id'];
	$id=$_POST['id'];
	$uname=$_POST['user_name'];
	$mobile=$_POST['mobile'];
	$add=$_POST['address'];
	$landmark=$_POST['landmark'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$pincode=$_POST['pincode'];
	if($add_id!='')
	{
		//update
		$sql2=mysqli_query($con,"update user_address set user_id='$id',user_name='$uname',mobile='$mobile',address='$add',landmark='$landmark',city='$city',state='$state',pincode='$pincode' where id='$add_id'");
		if($sql2)
		{
			echo "<script> alert('Address Update Successfully'); </script>";
		}
		else
		{
			echo "<script> alert('Address Not Update'); </script>";
		}
	}
	else
	{
		//insert
		$sql=mysqli_query($con,"insert into user_address(user_id,user_name,mobile,address,landmark,city,state,pincode)values('$id','$uname','$mobile','$add','$landmark','$city','$state','$pincode')");
		if($sql)
		{
			echo "<script> alert('Address Insert Successfully'); </script>";
		}	
		else
		{
			echo "<script> alert('Address Not Insert'); </script>";
		}
	}
}

$id=$_SESSION['user_id'];
$sql=mysqli_query($con,"select * from user where id='$id'");
$row=mysqli_fetch_array($sql);
?>
<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s" style="float:left;margin:0px;width:45%;">
	<h3 style="margin-bottom:10px;">Add Address</h3>
	<br/>
	<form action="" method="post">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	<input type="hidden" name="user_name" value="<?php echo $row['fname']." ".$row['lname']; ?>">
	<input type="hidden" name="mobile" value="<?php echo $row['mobile']; ?>">
	<?php
	$sql2=mysqli_query($con,"select * from user_address where user_id='$id'");
	$row2=mysqli_fetch_array($sql2);
	?>
	<input type="hidden" name="add_id" value="<?php echo $row2['id']; ?>">
	<div style="width:115px;float:left;">Street Address:</div>
	<textarea name="address" rows="4" style="width:70%;"><?php echo $row2['address']; ?></textarea>
	<div style="width:115px;float:left;margin-top:10px;">Landmark:</div>
	<input type="text" name="landmark" style="width:70%;margin-top:10px;" value="<?php echo $row2['landmark']; ?>">
	<div style="width:115px;float:left;margin-top:10px;">City:</div>
	<input type="text" name="city" style="width:70%;margin-top:10px;" value="<?php echo $row2['city']; ?>">
	<div style="width:115px;float:left;margin-top:10px;">State:</div>
	<input type="text" name="state" style="width:70%;margin-top:10px;" value="<?php echo $row2['state']; ?>">
	<div style="width:115px;float:left;margin-top:10px;">Pincode:</div>
	<input type="text" name="pincode" style="width:70%;margin-top:10px;" value="<?php echo $row2['pincode']; ?>">
	<input type="submit" value="Save" name="submit" style="width:45%; margin-left:115px;">
	</form>
</div>