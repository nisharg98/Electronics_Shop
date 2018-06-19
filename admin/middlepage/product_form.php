<?php
if(isset($_GET['pid']))
{
$pid=$_GET['pid'];
$result=mysqli_query($con,"select * from product where pid='$pid'");
$row=mysqli_fetch_array($result);
}
?>
<div id="content">
		
	<div class="container">
		
		<div id="page-title" class="clearfix">
			
			<ul class="breadcrumb">
			  <li>
			    <a href="index.php">Home</a>
			  </li>
			</ul>
			
		</div> <!-- /.page-title -->
		
		<div class="row">
			
			<div class="span12">
	      		
	      		<div id="horizontal" class="widget widget-form">
	      			
	      			<div class="widget-header">	      				
	      				<h3>
	      					<i class="icon-pencil"></i>
	      					Product Form	      					
      					</h3>	
      				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<form class="form-horizontal" action="index.php?page=product_action" method="post" enctype="multipart/form-data" onsubmit="return product_form();">
					        <fieldset>
					        	<input type="hidden" name="pid" value="<?php echo $row['pid'];?>">
					          <div class="control-group">
					            <label class="control-label" for="input01">Product Name</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="pname" name="pname" value="<?php echo $row['product_name']; ?>">
					              <span style="display:none; color:#FF0000;" id="req_pname">Enter Product Name</span>
                                  <span style="display:none; color:#FF0000;" id="valid_pname">Enter Valid Product Name</span>
								</div>
					          </div>
							 
							  <div class="control-group">
					            <label class="control-label" for="textarea">Product Description</label>
					            <div class="controls">
					              <textarea class="input-large" id="pdes" rows="4" name="pdes"><?php echo $row['product_description'];?></textarea>
					              <span style="display:none; color:#FF0000;" id="req_pdes">Enter Description</span>
								</div>
					          </div>
							
					          <!--<div class="control-group">
					            <label class="control-label" for="select01">Category</label>
					            <div class="controls">
					              <select name="category">
								  <?php 
								  $sql=mysqli_query($con,"select * from category");
								  while($row1=mysqli_fetch_array($sql))
								  {
								  ?>
					                <option value="<?php echo $row1['id']; ?>"><?php echo $row1['category_name']; ?></option>
					              <?php } ?></select>
					            </div>
					          </div>-->
							  
					          <div class="control-group">
					            <label class="control-label" for="select02">SubCategory</label>
					            <div class="controls">
					              <select name="subcategory">
									<option value="">--Select SubCategory--</option>
								  <?php 
								  $sql=mysqli_query($con,"select * from subcategory");
								  while($row2=mysqli_fetch_array($sql))
								  {
								  ?>
					                <option <?php if($row['subcategory_id']==$row2['id']){?> selected="selected" <?php } ?> value="<?php echo $row2['id']; ?>"><?php echo $row2['category_name']; echo "-".$row2['subcategory_name']; ?></option>
					              <?php } ?></select>
					            </div>
					          </div>
							 
							  <div class="control-group">
					            <label class="control-label" for="input03">Stock</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="stock" name="stock" value="<?php echo $row['stock'];?>">
					              <span style="display:none; color:#FF0000;" id="req_stock">Enter Stock</span>
								</div>
					          </div>
							  
							  <div class="control-group">
					            <label class="control-label" for="input04">Price</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="price" name="price" value="<?php echo $row['price'];?>">
					              <span style="display:none; color:#FF0000;" id="req_price">Enter Price</span>
								</div>
					          </div>
							  
							  <div class="control-group">
					            <label class="control-label" for="select03">Seller</label>
					            <div class="controls">
					              <select name="seller">
									<option value="">--Select Seller--</option>
								  <?php 
								  $sql=mysqli_query($con,"select * from seller");
								  while($row3=mysqli_fetch_array($sql))
								  {
								  ?>
					                <option <?php if($row['seller']==$row3['id']){?> selected="selected" <?php } ?> value="<?php echo $row3['id']; ?>"><?php echo $row3['fname']; echo " ".$row3['lname']; ?></option>
					              <?php } ?></select>
					            </div>
					          </div>
							  
							  <div class="control-group">
					            <label class="control-label" for="input06">Product Image</label>
					            <div class="controls">
					              <input type="file" class="input-large" id="input06" name="image" value="<?php echo $row['image'];?>">
					            </div>
					          </div>
							
					          <div class="form-actions">
					            <button type="submit" class="btn btn-primary btn-large" name="submit" value="submit">Submit</button>
					            <button class="btn btn-large">Cancel</button>
					          </div>
					        </fieldset>
					      </form>	
						
					</div> <!-- /widget-content -->
						
				</div>	
					
		    </div> <!-- /span8 -->
		       
		</div> <!-- /row -->
			
	</div> <!-- /.container -->
	
</div> <!-- /#content -->