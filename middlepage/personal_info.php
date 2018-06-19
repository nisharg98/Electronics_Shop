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
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$profile=$_FILES['profile']['name'];
	if($profile=='')
	{
		$sql2=mysqli_query($con,"select * from user where id='$id'");
		$row=mysqli_fetch_array($sql2);
		$profile=$row['profile'];
	}
	if(isset($_POST['newsletter']))
	{
		$news=$_POST['newsletter'];
	}
	else
	{
		$news="no";
	}
	
	//update
	if($_FILES['profile']['name']!='')
	{
		$res=mysqli_query($con,"select * from user where id='$id'");
		while($row=mysqli_fetch_array($res))
		{
			$img="admin/img/user_profile/".$row['profile'];
		}
		unlink($img);
	}
	move_uploaded_file($_FILES['profile']['tmp_name'],"admin/img/user_profile/".$_FILES['profile']['name']);
	$sql=mysqli_query($con,"update user set fname='$fname',lname='$lname',gender='$gender',profile='$profile',newsletter='$news' where id='$id'");
	if($sql)
	{
		echo "<script> alert('Account Update Successfully'); </script>";
	}
	else
	{
		echo "<script> alert('Account Not Update'); </script>";
	}
}

$id=$_SESSION['user_id'];
$sql=mysqli_query($con,"select * from user where id='$id'");
$row=mysqli_fetch_array($sql);
?>
<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s" style="float:left;margin:0px;">
	<h3 style="margin-bottom:10px;">Personal Information</h3>
	<br/>
	<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	<div style="width:100px;float:left;">Profile:</div>
	<div style="margin:10px;">
	<img src="<?php echo "admin/img/user_profile/".$row['profile']; ?>" height="100" width="90">
	</div>
	<div style="width:100px;float:left;">First Name:</div>
	<input type="text" name="fname" value="<?php echo $row['fname']; ?>" style="width:70%;">
	<div style="width:100px;float:left;margin-top:10px;">Last Name:</div>
	<input type="text" name="lname" value="<?php echo $row['lname']; ?>" style="width:70%;margin-top:10px;">
	<br/>
	<div style="width:100px;float:left;">Gender:</div>
	<div>
	<input type="radio" name="gender" value="male" <?php if($row['gender']=='male' || $row['gender']==''){ ?> checked="checked" <?php } ?>> Male &nbsp;
	<input type="radio" name="gender" value="female" <?php if($row['gender']=='female'){ ?> checked="checked" <?php } ?>> Female
	</div>
	<br/>
	<div style="width:100px;float:left;">Profile:</div>
	<input type="file" name="profile">
	<br/>
	<div style="width:100px;float:left;">Subscribe:</div>
	<input type="checkbox" name="newsletter" value="yes" <?php if($row['newsletter']=='yes'){ ?> checked="checked" <?php } ?>> Newsletter
	<input type="submit" value="Save" name="submit" style="width:50%; margin-left:100px;">
	</form>
</div>