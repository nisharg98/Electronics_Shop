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
	$pname=$_POST['pname'];
	$pdes=$_POST['pdes'];
	$subcat=$_POST['subcategory'];
	$stock=$_POST['stock'];
	$price=$_POST['price'];
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
	$seller=$_SESSION['seller_id'];
	$sql1=mysqli_query($con,"select * from seller where id='$seller'");
	while($row1=mysqli_fetch_array($sql1))
	{
		$sellname=$row1['fname'];
		$selllname=$row1['lname'];
		$sellername="$sellname"." "."$selllname";
	}
	//insert
	move_uploaded_file($_FILES['image']['tmp_name'],"admin/img/product_image/".$_FILES['image']['name']);
	$sql=mysqli_query($con,"insert into product(product_name,product_description,category_id,category_name,subcategory_id,stock,price,seller,seller_name,image)values('$pname','$pdes','$cid','$catname','$subcat','$stock','$price','$seller','$sellername','$image')");
	if($sql)
	{
		echo "<script> alert('Product Added Successfully'); </script>";
	}
	else
	{
		echo "<script> alert('Product Not Added'); </script>";
	}
}
?>
<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s" style="width:50%;float:left;margin:0px;">
	<h3 style="margin-bottom:10px;">Add Product</h3>
	<br/>
	<form action="" method="post" enctype="multipart/form-data">
	<div style="width:153px;float:left;">Product Name:</div>
	<input type="text" name="pname" style="width:60%;" required="">
	<div style="width:153px;float:left;">Product Description:</div>
	<textarea name="pdes" style="width:60%;" required=""></textarea>
	<div style="width:153px;float:left;margin-top:10px;">SubCategory:</div>
	<select style="float:left;width:60%;margin-top:10px;" name="subcategory">
		<option value="">--Select SubCategory--</option>
	<?php
	$sql=mysqli_query($con,"select * from subcategory");
	while($row=mysqli_fetch_array($sql))
	{
	?>
		<option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; echo "-".$row['subcategory_name']; ?></option>
	<?php } ?>
	</select><br/><br/>
	<div style="width:153px;float:left;">Stock:</div>
	<input type="text" name="stock" style="width:60%;margin-bottom:10px;" required="">
	<div style="width:153px;float:left;">Price:</div>
	<input type="text" name="price" style="width:60%;margin-bottom:10px;" required="">
	<div style="width:153px;float:left;">Product Image:</div>
	<input type="file" name="image">
	<br/>
	<input type="submit" value="Save" name="submit" style="width:50%; margin-left:100px;">
	</form>
</div>