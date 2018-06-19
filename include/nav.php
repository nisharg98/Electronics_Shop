<!-- navigation -->
<div class="navigation-agileits">
	<div class="container">
		<nav class="navbar navbar-default">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header nav_2">
				<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div> 
			<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php" class="act">Home</a></li>	
					<!-- Mega Menu -->
					<?php
					$sql1=mysqli_query($con,"select * from category");
					while($row1=mysqli_fetch_array($sql1))
					{
						$count=$row1['id'];
					?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $row1['category_name']; ?><b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
											<h6>All <?php echo $row1['category_name']; ?></h6>
											<?php
											$sql=mysqli_query($con,"select * from subcategory where category_id='$count'");
											while($row=mysqli_fetch_array($sql))
											{
											?>
											<li><a href="index.php?page=product&pid=<?php echo $row['id']; ?>"><?php echo $row['subcategory_name']; ?></a></li>
											<?php } ?>
										</ul>
									</div>	
								</div>
							</ul>
						</li>
					<?php } ?>
					<li><a href="index.php?page=contact">Contact</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<!-- //navigation -->