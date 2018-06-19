<?php
if(!isset($_SESSION['user_id']) and isset($_SESSION['seller_id']))
{
	header("location:index.php");
}
elseif(!isset($_SESSION['user_id']) and !isset($_SESSION['seller_id']))
{
	header("location:index.php?page=login");
}
?>
<div class="products">
	<div class="container">
	<div class="order">
		<div class="title" style="margin-bottom:50px;">
			<h3 style="color:#fff;line-height:40px;margin-left:10px;">ORDER CONFIRMATION</h3>
		</div>
		<div class="add">
			<?php
			$id=$_SESSION['user_id'];
			$sql=mysqli_query($con,"select * from user_address where user_id='$id'");
			$row=mysqli_fetch_array($sql);
			echo "<h4 style=margin-bottom:5px;><u>Delivery Address:</u></h4>";
			echo "<p>".$row['user_name']."</p>"."<br/>";
			echo $row['address']."<br/>";
			echo $row['landmark']."<br/>";
			echo $row['city']."<br/>";
			echo $row['state']."-".$row['pincode']."<br/><br/>";
			echo $row['mobile']."<br/>";
			?>
		</div>
		<div class="payment" style="margin-left:170px;">
		<h4 style="margin-bottom:5px;"><u>Payment:</u></h4>
		<form action="index.php?page=order_action" method="post">
		Payment Method:
		<select name="method">
			<option value="Credit Card">Credit Card</option>
			<option value="Debit Card">Debit Card</option>
			<option value="Cash On Delivery">Cash On Delivery</option>
		</select><br/>
		Card Type: &nbsp;
		<input type="radio" name="type" value="MasterCard"> MasterCard &nbsp;
		<input type="radio" name="type" value="Visa"> Visa &nbsp;
		<input type="radio" name="type" value="Maestro"> Maestro
		<br/>
		Card Number:
		<input type="text" name="number" placeholder="Card Number">
		<br/>
		Expiry Date:
		<input type="text" name="date" placeholder="MM/YY" style="margin-left:13px;">
		<br/>
		CVV:
		<input type="text" name="cvv" placeholder="CVV" maxlength="3" style="margin-left:63px;">
		<br/>
		Card Name:
		<input type="text" name="name" placeholder="Name on card" style="margin-left:14px;">
		<div class="btnorder" style="margin-top:80px;">
			<input type="submit" value="Make Payment" name="submit" style="width:50%; margin-left:150px;">
		</div>
		</form>
		</div>
	</div>
	</div>
</div>