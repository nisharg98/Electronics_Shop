<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql=mysqli_query($con,"select * from category where id='$id'");
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
	      					Category Form	      					
      					</h3>	
      				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<form class="form-horizontal" action="index.php?page=category_action" method="post">
					        <fieldset>
					        	<input type="hidden" name="id" value="<?php echo $row['id'];?>">
					          <div class="control-group">
					            <label class="control-label" for="input01">Category Name</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="input01" name="category" required="" value="<?php echo $row['category_name'];?>">
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