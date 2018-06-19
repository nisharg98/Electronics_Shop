<?php
if(isset($_POST['submit']))
{
	$cname=$_POST['category'];
	$id=$_POST['id'];
	if($id!='')
	{
		$sql=mysqli_query($con,"update category set category_name='$cname' where id='$id'");
		header("location:index.php?page=category_list");
	}
	else
	{
		$sql=mysqli_query($con,"insert into category (category_name) values ('$cname')");
		header("location:index.php?page=category_list");
	}
}
else
{
	$id=$_GET['id'];
	$sql=mysqli_query($con,"delete from category where id='$id'");
	header("location:index.php?page=category_list");
}
?>