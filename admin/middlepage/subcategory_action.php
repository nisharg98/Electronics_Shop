<?php
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$sname=$_POST['sname'];
	$category=$_POST['category'];
	$sql=mysqli_query($con,"select * from category where id='$category'");
	$row=mysqli_fetch_array($sql);
	$cat=$row['category_name'];
	if($id!='')
	{
		$sql=mysqli_query($con,"update subcategory set subcategory_name='$sname',category_id='$category',category_name='$cat' where id='$id'");
		header("location:index.php?page=subcategory_list");
	}
	else
	{
		$sql=mysqli_query($con,"insert into subcategory (subcategory_name,category_id,category_name) values ('$sname','$category','$cat')");
		header("location:index.php?page=subcategory_list");
	}
}
else
{
	$id=$_GET['id'];
	$sql=mysqli_query($con,"delete from subcategory where id='$id'");
	header("location:index.php?page=subcategory_list");
}
?>