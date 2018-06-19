<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$result=mysqli_query($con,"select * from feedback where id='$id'");
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
	      					Feedback Form	      					
      					</h3>	
      				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<form class="form-horizontal" action="index.php?page=feedback_action" method="post" enctype="multipart/form-data" onsubmit="return feedback_form();">
					        <fieldset>
					        	<input type="hidden" name="id" value="<?php echo $row['id'];?>">
					          <div class="control-group">
					            <label class="control-label" for="input01">Name</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="name" name="name" value="<?php echo $row['name'];?>">
					              <span style="display:none; color:#FF0000;" id="req_name">Enter Name</span>
                                  <span style="display:none; color:#FF0000;" id="valid_name">Enter Valid Name</span>
								</div>
					          </div>
							  
					          <div class="control-group">
					            <label class="control-label" for="input02">Email</label>
					            <div class="controls">
					              <input type="email" class="input-large" id="email" name="email" value="<?php echo $row['email'];?>">
					              <span style="display:none; color:#FF0000;" id="req_email">Enter email id</span>
								</div>
					          </div>

							  <div class="control-group">
					            <label class="control-label" for="textarea">Message</label>
					            <div class="controls">
					              <textarea class="input-large" id="message" rows="4" name="message"><?php echo $row['message'];?></textarea>
					              <span style="display:none; color:#FF0000;" id="req_message">Enter Message</span>
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