<?php
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$mobile=$_POST['mobile'];
	$profile=$_FILES['profile']['name'];
	$status=$_POST['status'];
	if($id!='')
	{
		//update
		$res=mysqli_query($con,"select * from user where id='$id'");
		while($row=mysqli_fetch_array($res))
		{
			$img="img/user_profile/".$row['profile'];
		}
		unlink($img);
		move_uploaded_file($_FILES['profile']['tmp_name'],"img/user_profile/".$_FILES['profile']['name']);
		$result=mysqli_query($con,"update user set fname='$fname',lname='$lname',gender='$gender',email='$email',password='$password',cpassword='$cpassword',mobile='$mobile',profile='$profile' where id='$id'");
		if($result)
		{
			header("location:index.php?page=user_list");
		}
		else
		{
			echo "<script> alert('Data Not Update'); </script>";
		}

	}
	else
	{
		//insert
		move_uploaded_file($_FILES['profile']['tmp_name'],"img/user_profile/".$_FILES['profile']['name']);
		$result=mysqli_query($con,"insert into user(fname,lname,gender,email,password,cpassword,mobile,profile,status)values('$fname','$lname','$email','$password','$cpassword','$mobile','$profile','$status')");
		if($result)
		{
			header("location:index.php?page=user_list");
		}
		else
		{
			echo "<script> alert('Data Not Insert'); </script>";
		}

	}			
}
else
{
	//delete
	$id=$_GET['id'];
	$status=$_GET['status'];
	if($status!='')
	{
		if($status=='active')
		{
			mysqli_query($con,"update user set status='inactive' where id='$id'");
			header("location:index.php?page=user_list");
		}
		elseif($status=='inactive')
		{
			mysqli_query($con,"update user set status='active' where id='$id'");
			header("location:index.php?page=user_list");
		}
	}
	else
	{
	if($id!='')
	{
		$res=mysqli_query($con,"select * from user where id='$id'");
		while($row=mysqli_fetch_array($res))
		{
			$img="img/user_profile/".$row['profile'];
		}
		unlink($img);
	}
	$result=mysqli_query($con,"delete from user where id='$id'");
	if($result)
	{
		header("location:index.php?page=user_list");
	}
	else
	{
		echo "<script> alert('Data Not Delete'); </script>";
	}
	}
}
?>