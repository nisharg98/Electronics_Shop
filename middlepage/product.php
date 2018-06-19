<?php
if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
	$sql=mysqli_query($con,"select * from product where subcategory_id='$pid'");
	$count=mysqli_num_rows($sql);
}
else
{
	header("location:index.php");
}
?>
<!--- products --->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Categories</h2>
					<ul class="cate">
						<li><a><i class="fa fa-arrow-right" aria-hidden="true"></i>Mobiles</a></li>
							<ul>
								<li><a href="index.php?page=product&pid=1"><i class="fa fa-arrow-right" aria-hidden="true"></i>Apple</a></li>
								<li><a href="index.php?page=product&pid=3"><i class="fa fa-arrow-right" aria-hidden="true"></i>Oneplus</a></li>
								<li><a href="index.php?page=product&pid=2"><i class="fa fa-arrow-right" aria-hidden="true"></i>Samsung</a></li>
								<li><a href="index.php?page=product&pid=7"><i class="fa fa-arrow-right" aria-hidden="true"></i>Google</a> </li>
								<li><a href="index.php?page=product&pid=4"><i class="fa fa-arrow-right" aria-hidden="true"></i>Motorola</a> </li>
								<li><a href="index.php?page=product&pid=9"><i class="fa fa-arrow-right" aria-hidden="true"></i>Lenovo</a></li>
							</ul>
						<li><a><i class="fa fa-arrow-right" aria-hidden="true"></i>Laptops</a></li>
							<ul>
								<li><a href="index.php?page=product&pid=19"><i class="fa fa-arrow-right" aria-hidden="true"></i>Dell</a> </li>
								<li><a href="index.php?page=product&pid=22"><i class="fa fa-arrow-right" aria-hidden="true"></i>Acer</a> </li>
								<li><a href="index.php?page=product&pid=17"><i class="fa fa-arrow-right" aria-hidden="true"></i>Apple</a> </li>
								<li><a href="index.php?page=product&pid=23"><i class="fa fa-arrow-right" aria-hidden="true"></i>Microsoft</a> </li>
								<li><a href="index.php?page=product&pid=18"><i class="fa fa-arrow-right" aria-hidden="true"></i>HP</a> </li>
								<li><a href="index.php?page=product&pid=20"><i class="fa fa-arrow-right" aria-hidden="true"></i>Micromax</a> </li>
								<li><a href="index.php?page=product&pid=21"><i class="fa fa-arrow-right" aria-hidden="true"></i>Lenovo</a> </li>
							</ul>
						<li><a><i class="fa fa-arrow-right" aria-hidden="true"></i>Cameras</a></li>
							<ul>
								<li><a href="index.php?page=product&pid=30"><i class="fa fa-arrow-right" aria-hidden="true"></i>Canon</a> </li>
								<li><a href="index.php?page=product&pid=31"><i class="fa fa-arrow-right" aria-hidden="true"></i>Nikon</a> </li>
								<li><a href="index.php?page=product&pid=32"><i class="fa fa-arrow-right" aria-hidden="true"></i>Olympus</a> </li>
								<li><a href="index.php?page=product&pid=33"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sony</a> </li>
								<li><a href="index.php?page=product&pid=34"><i class="fa fa-arrow-right" aria-hidden="true"></i>Fujifilm</a> </li>
								<li><a href="index.php?page=product&pid=35"><i class="fa fa-arrow-right" aria-hidden="true"></i>Samsung</a> </li>
								<li><a href="index.php?page=product&pid=36"><i class="fa fa-arrow-right" aria-hidden="true"></i>Kodak</a> </li>
								<li><a href="index.php?page=product&pid=37"><i class="fa fa-arrow-right" aria-hidden="true"></i>Panasonic</a></li>
							</ul>
					</ul>
				</div>																																												
			</div>
			<div class="col-md-8 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids">
						<div class="sorting">
							<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Default sorting</option>
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by popularity</option> 
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by average rating</option>					
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by price</option>								
							</select>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<?php
				while($row=mysqli_fetch_array($sql))
				{
				?>
				<div class="agile_top_brands_grids" >
					<div class="col-md-4 top_brand_left" >
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos">
									<img src="images/offer.png" alt=" " class="img-responsive">
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="index.php?page=single&pid=<?php echo $row['pid']; ?>">
													<img src="admin/img/product_image/<?php echo $row['image']; ?>" height="130" width="90">
												</a>		
												<p><?php echo $row['product_name']; ?></p>
												<h4>₹<?php echo $row['price']; ?></h4>
											</div>
											<div class="snipcart-details top_brand_home_details">
												<form action="index.php?page=single_action" method="post">
													<fieldset>
														<input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
														<input type="submit" name="submit" value="Add to cart" class="button">
													</fieldset>
												</form>
											</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="clearfix"> </div>
				<?php
				if($count==0)
				{
				?>
				<h3 style="margin:30px 0 0 130px;">Sorry, No products found right now!!!</h3>
				<?php } ?>
				<nav class="numbering">
					<ul class="pagination paging">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--- products --->