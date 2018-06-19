<div id="content">
		
	<div class="container">
		
		<div class="row">
		    
		    <div class="span12">
	      		
	      		<div class="widget widget-table">
						
					<div class="widget-header">						
						<h3>
							<i class="icon-th-list"></i>
							Order List							
						</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<table class="table table-striped table-bordered table-highlight" id="example">
							<thead>
								<tr>
									<th>Order Id</th>
									<th>User Id</th>
									<th>Product Id</th>
									<th>Product</th>
									<th>Product Category</th>
									<th>Product Name</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Seller Name</th>
									<th>Order Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sql=mysqli_query($con,"select * from order_detail");
									while($row=mysqli_fetch_array($sql))
									{
										$pid=$row['pid'];
								?>
								<tr class="odd gradeX">
									<td><?php echo $row['order_id'];?></td>
									<td><?php echo $row['user_id'];?></td>
									<td><?php echo $row['pid'];?></td>
									<?php
									$sql2=mysqli_query($con,"select * from product where pid='$pid'");
									$row2=mysqli_fetch_array($sql2);
									?>
									<td><?php if($row2['image']!=NULL)
									{ ?>
									<img src="<?php echo "img/product_image/".$row2['image']; ?>" height="70" width="70">
									<?php } ?></td>
									<td><?php echo $row['product_category'];?></td>
									<td><?php echo $row['product_name'];?></td>
									<td><?php echo $row['quantity'];?></td>
									<td><?php echo $row['price'];?></td>
									<td><?php echo $row['seller_name'];?></td>
									<td><?php echo $row['order_date'];?></td>
									<td>
										<a href="index.php?page=track_form&order_id=<?php echo $row['order_id'];?>&user_id=<?php echo $row['user_id']; ?>" class="btn btn-primary">Add Order Status</a>
									</td>
								</tr>
								<?php } ?>
								
							</tbody>
						</table>
							
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->	
				
		    </div> <!-- /span12 -->
		    
		</div> <!-- /row -->
			
	</div> <!-- /.container -->
	
</div> <!-- /#content -->