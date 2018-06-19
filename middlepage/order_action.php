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
	$method=$_POST['method'];
	$type=$_POST['type'];
	$number=$_POST['number'];
	$date=$_POST['date'];
	$cvv=$_POST['cvv'];
	$name=$_POST['name'];
	
	$user_id=$_SESSION['user_id'];
	$sql1=mysqli_query($con,"select * from cart where user_id='$user_id'");
	while($row1=mysqli_fetch_array($sql1))
	{
		$pid=$row1['pid'];
		$product_name=$row1['product_name'];
		$price=$row1['price'];
		$quantity=1;
		
		$sql2=mysqli_query($con,"select * from product where pid='$pid'");
		$row2=mysqli_fetch_array($sql2);
		
		$stock=$row2['stock'];
		$pname=$row2['product_name'];
		
		if($stock>0)
		{
			$stock1=$stock-1;
			$sql8=mysqli_query($con,"update product set stock='$stock1' where pid='$pid'");
			
			$product_category=$row2['category_name'];
			$seller_name=$row2['seller_name'];
			$sql3=mysqli_query($con,"insert into order_detail(user_id,pid,product_category,product_name,quantity,price,seller_name)values('$user_id','$pid','$product_category','$product_name','$quantity','$price','$seller_name')");
			$count=mysqli_insert_id($con);
			
			$sql4=mysqli_query($con,"select * from order_detail where order_id='$count'");
			while($row4=mysqli_fetch_array($sql4))
			{
				$order_id=$row4['order_id'];
				$amount=$row4['price'];
				$sql5=mysqli_query($con,"insert into payment(order_id,user_id,amount,payment_method,card_type,card_number,card_date,cvv,card_name)values('$order_id','$user_id','$amount','$method','$type','$number','$date','$cvv','$name')");
			}
			
			$sql6=mysqli_query($con,"select * from order_detail where order_id='$count'");
			while($row5=mysqli_fetch_array($sql6))
			{
				$order_id=$row5['order_id'];
				$sql7=mysqli_query($con,"insert into track_order(order_id,user_id,approval_date,approval_status)values('$order_id','$user_id',now(),'Your Order has been placed.')");
			}
		}
		else
		{
			echo "<script> alert('$pname is Currently Out Of Stock!'); </script>";
		}
	}
	$sql7=mysqli_query($con,"delete from cart where user_id='$user_id'");
	if($sql7)
	{ 
		header("location:index.php?page=order_place");
	}
	else
	{
		echo "<script> alert('Order Not Placed'); </script>";
	}
}
?>