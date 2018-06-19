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
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$profile=$_FILES['profile']['name'];
	if($profile=='')
	{
		$sql2=mysqli_query($con,"select * from seller where id='$id'");
		$row2=mysqli_fetch_array($sql2);
		$profile=$row2['profile'];
	}
	
	//update
	if($_FILES['profile']['name']!='')
	{
		$res=mysqli_query($con,"select * from seller where id='$id'");
		while($row=mysqli_fetch_array($res))
		{
			$img="admin/img/seller_profile/".$row['profile'];
		}
		unlink($img);
	}
	move_uploaded_file($_FILES['profile']['tmp_name'],"admin/img/seller_profile/".$_FILES['profile']['name']);
	$sql=mysqli_query($con,"update seller set fname='$fname',lname='$lname',profile='$profile' where id='$id'");
	if($sql)
	{
		echo "<script> alert('Account Update Successfully'); </script>";
	}
	else
	{
		echo "<script> alert('Account Not Update'); </script>";
	}
}

$id=$_SESSION['seller_id'];
$sql=mysqli_query($con,"select * from seller where id='$id'");
$row=mysqli_fetch_array($sql);
?>
<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s" style="float:left;margin:0px;">
	<h3 style="margin-bottom:10px;">Personal Information</h3>
	<br/>
	<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	<div style="width:100px;float:left;">Profile:</div>
	<div style="margin:10px;">
	<img src="<?php echo "admin/img/seller_profile/".$row['profile']; ?>" height="100" width="90">
	</div>
	<div style="width:100px;float:left;">First Name:</div>
	<input type="text" name="fname" value="<?php echo $row['fname']; ?>" style="width:70%;">
	<div style="width:100px;float:left;margin-top:10px;">Last Name:</div>
	<input type="text" name="lname" value="<?php echo $row['lname']; ?>" style="width:70%;margin-top:10px;">
	<br/>
	<div style="width:100px;float:left;">Profile:</div>
	<input type="file" name="profile">
	<br/>
	<input type="submit" value="Save" name="submit" style="width:50%; margin-left:100px;">
	</form>
</div>