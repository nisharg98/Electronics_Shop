<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql=mysqli_query($con,"select * from subcategory where id='$id'");
	$row=mysqli_fetch_array($sql);
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
	      					SubCategory Form	      					
      					</h3>	
      				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<form class="form-horizontal" action="index.php?page=subcategory_action" method="post">
					        <fieldset>
					        	<input type="hidden" name="id" value="<?php echo $row['id'];?>">
					          <div class="control-group">
					            <label class="control-label" for="input01">SubCategory Name</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="input01" name="sname" required="" value="<?php echo $row['subcategory_name'];?>">
					            </div>
					          </div>
							  
							  <div class="control-group">
					            <label class="control-label" for="select01">Category</label>
					            <div class="controls">
					              <select name="category">
									<option value="">--Select Category--</option>
								  <?php 
								  $sql=mysqli_query($con,"select * from category");
								  while($row1=mysqli_fetch_array($sql))
								  {
								  ?>
					                <option <?php if($row['category_name']==$row1['category_name']){?> selected="selected" <?php } ?> value="<?php echo $row1['id']; ?>"><?php echo $row1['category_name']; ?></option>
					              <?php } ?></select>
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