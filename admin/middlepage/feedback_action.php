<?php
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	if($id!='')
	{
		//update
		$result=mysqli_query($con,"update feedback set name='$name',email='$email',message='$message' where id='$id'");
		if($result)
		{
			//echo "sucess";
			header("location:index.php?page=feedback_list");
		}
		else
		{
			echo "<script> alert('Feedback Not Update'); </script>";
		}

	}
	else
	{
		//insert
		$result=mysqli_query($con,"insert into feedback(name,email,message)values('$name','$email','$message')");
		if($result)
		{
			//echo "sucess";
			header("location:index.php?page=feedback_list");
		}
		else
		{
			echo "<script> alert('Feedback Not Insert'); </script>";
		}

	}			
}
else
{
	//delete
	$id=$_GET['id'];
	$result=mysqli_query($con,"delete from feedback where id='$id'");
	if($result)
	{
		//echo "sucess";
		header("location:index.php?page=feedback_list");
	}
	else
	{
		echo "<script> alert('Feedback Not Delete'); </script>";
	}
}
?>