<div id="content">
		
	<div class="container">
		
		<div id="page-title" class="clearfix">
			
			<ul class="breadcrumb">
			  <li>
			    <a href="index.php?page=product_form">Add New Product</a>
			  </li>
			</ul>
			
		</div> <!-- /.page-title -->
	
		<div class="row">
		    
		    <div class="span12">
	      		
	      		<div class="widget widget-table">
						
					<div class="widget-header">						
						<h3>
							<i class="icon-th-list"></i>
							Product List							
						</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<table class="table table-striped table-bordered table-highlight" id="example">
							<thead>
								<tr>
									<th>Id</th>
									<th>Product Name</th>
									<th>Product Description</th>
									<th>Category Name</th>
									<th>Subcategory</th>
									<th>Stock</th>
									<th>Price</th>
									<th>Seller Id</th>
									<th>Seller Name</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$result=mysqli_query($con,"select * from product");
									while($row=mysqli_fetch_array($result))
									{
								?>
								<tr class="odd gradeX">
									<td><?php echo $row['pid'];?></td>
									<td><?php echo $row['product_name'];?></td>
									<td><?php echo $row['product_description'];?></td>
									<td><?php echo $row['category_name'];?></td>
									<td><?php echo $row['subcategory_id'];?></td>
									<td><?php echo $row['stock'];?></td>
									<td><?php echo $row['price'];?></td>
									<td><?php echo $row['seller'];?></td>
									<td><?php echo $row['seller_name'];?></td>
									<td><?php if($row['image']!=NULL)
									{ ?>
									<img src="<?php echo "img/product_image/".$row['image']; ?>" height="70" width="70">
									<?php } ?></td>
									<td>
										<a href="index.php?page=product_form&pid=<?php echo $row['pid'];?>" class="btn btn-info">Edit</a> |
										<a href="index.php?page=product_action&pid=<?php echo $row['pid'];?>" class="btn btn-danger">Delete</a>
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