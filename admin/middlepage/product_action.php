<?php
if(isset($_POST['submit']))
{
	$pid=$_POST['pid'];
	$pname=$_POST['pname'];
	$pdes=$_POST['pdes'];
	$subcat=$_POST['subcategory'];
	$stock=$_POST['stock'];
	$price=$_POST['price'];
	$seller=$_POST['seller'];
	$image=$_FILES['image']['name'];
	
	//get category name from database by id
	$sql=mysqli_query($con,"select * from subcategory where id='$subcat'");
	while($row=mysqli_fetch_array($sql))
	{
		$cname=$row['category_name'];
		$sname=$row['subcategory_name'];
		$catname="$cname"."-"."$sname";
		$cid=$row['category_id'];
	}
	//get seller name from database by id
	$sql1=mysqli_query($con,"select * from seller where id='$seller'");
	while($row1=mysqli_fetch_array($sql1))
	{
		$sellname=$row1['fname'];
		$selllname=$row1['lname'];
		$sellername="$sellname"." "."$selllname";
	}
	
	if($pid!='')
	{
		$sql1=mysqli_query($con,"select * from product where pid='$pid'");
		while($row3=mysqli_fetch_array($sql1))
		{
			$image1="img/product_image/".$row3['image'];
		}
		unlink($image1);
		move_uploaded_file($_FILES['image']['tmp_name'],"img/product_image/".$_FILES['image']['name']);
		$sql=mysqli_query($con,"update product set product_name='$pname',product_description='$pdes',category_id='$cid',category_name='$catname',subcategory_id='$subcat',stock='$stock',price='$price',seller='$seller',seller_name='$sellername',image='$image' where pid='$pid'");
		header("location:index.php?page=product_list");
	}
	else
	{
		move_uploaded_file($_FILES['image']['tmp_name'],"img/product_image/".$_FILES['image']['name']);
		$sql=mysqli_query($con,"insert into product(product_name,product_description,category_id,category_name,subcategory_id,stock,price,seller,seller_name,image)values('$pname','$pdes','$cid','$catname','$subcat','$stock','$price','$seller','$sellername','$image')");
		header("location:index.php?page=product_list");
	}
}
else
{
	$pid=$_GET['pid'];
	$sql=mysqli_query($con,"select * from product where pid='$pid'");
	while($row2=mysqli_fetch_array($sql))
	{
		$image2="img/product_image/".$row2['image'];
	}
	unlink($image2);
	$sql1=mysqli_query($con,"delete from product where pid='$pid'");
	header("location:index.php?page=product_list");
}
?>