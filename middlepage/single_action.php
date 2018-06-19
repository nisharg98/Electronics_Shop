<?php
if(!isset($_SESSION['user_id']) and isset($_SESSION['seller_id']))
{
	header("location:index.php");
}
elseif(!isset($_SESSION['user_id']) and !isset($_SESSION['seller_id']))
{
	header("location:index.php?page=login");
	exit;
}

if(isset($_POST['submit']))
{
	$pid=$_POST['pid'];
	$sql=mysqli_query($con,"select * from product where pid='$pid'");
	$row=mysqli_fetch_array($sql);
	$pname=$row['product_name'];
	$price=$row['price'];
	$stock=$row['stock'];
	$subcatid=$row['subcategory_id'];
	
	if($stock==0)
	{
		echo "<script> alert('$pname is Currently Out Of Stock!'); </script>";
		echo "<script> window.location='index.php?page=product&pid=$subcatid' </script>";
	}
	else
	{
		//insert to cart
		$user_id=$_SESSION['user_id'];
		$sql2=mysqli_query($con,"insert into cart(user_id,pid,product_name,price)values('$user_id','$pid','$pname','$price')");
		if($sql2)
		{
			header("location:index.php?page=checkout");
		}
		else
		{
			echo "<script> alert('Product Not Added In Cart'); </script>";
		}
	}
}
else
{
	if($_GET['cid'])
	{
		$id=$_GET['cid'];
		$sql3=mysqli_query($con,"delete from cart where id='$id'");
		if($sql3)
		{
			header("location:index.php?page=checkout");
		}
		else
		{
			echo "<script> alert('Product Not Deleted From Cart'); </script>";
		}
	}
	else
	{
		$id=$_GET['id'];
		$sql3=mysqli_query($con,"delete from cart where id='$id'");
		if($sql3)
		{
			header("location:index.php?page=order");
		}
		else
		{
			echo "<script> alert('Product Not Deleted From Cart'); </script>";
		}
	}
}
?>