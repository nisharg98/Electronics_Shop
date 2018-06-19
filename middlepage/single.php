<?php
if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
	$sql=mysqli_query($con,"select * from product where pid='$pid'");
	$row=mysqli_fetch_array($sql);
}
else
{
	header("location:index.php");
}
?>
	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				<div class="col-md-4 agileinfo_single_left" style="height:430px;">
					<img style="height:100%" src="<?php echo "admin/img/product_image/".$row['image']; ?>" alt=" " class="img-responsive">
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2><?php echo $row['product_name']; ?></h2>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p><?php echo $row['product_description']; ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 class="m-sing" style="font-size:25px;">₹<?php echo " ".$row['price']; ?></h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form action="index.php?page=single_action" method="post">
								<fieldset>
									<input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
									<input type="submit" name="submit" value="Buy Now" class="button">
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>