<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$result=mysqli_query($con,"select * from seller where id='$id'");
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
	      					Seller Form	      					
      					</h3>	
      				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<form class="form-horizontal" action="index.php?page=seller_action" method="post" enctype="multipart/form-data" onsubmit="return seller_form();">
					        <fieldset>
					        	<input type="hidden" name="id" value="<?php echo $row['id'];?>">
					          <div class="control-group">
					            <label class="control-label" for="input01">First Name</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="fname" name="fname" value="<?php echo $row['fname'];?>">
					              <span style="display:none; color:#FF0000;" id="req_fname">Enter First Name</span>
                                  <span style="display:none; color:#FF0000;" id="valid_fname">Enter Valid First Name</span>
								</div>
					          </div>
							  
							  <div class="control-group">
					            <label class="control-label" for="input02">Last Name</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="lname" name="lname" value="<?php echo $row['lname'];?>">
					              <span style="display:none; color:#FF0000;" id="req_lname">Enter Last Name</span>
                                  <span style="display:none; color:#FF0000;" id="valid_lname">Enter Valid Last Name</span>
								</div>
					          </div>

					          <div class="control-group">
					            <label class="control-label" for="input03">Email</label>
					            <div class="controls">
					              <input type="email" class="input-large" id="email" name="email" value="<?php echo $row['email'];?>">
					              <span style="display:none; color:#FF0000;" id="req_email">Enter email id</span>
								</div>
					          </div>

					          <div class="control-group">
					            <label class="control-label" for="input04">Password</label>
					            <div class="controls">
					              <input type="password" class="input-large" id="pass" name="password" value="<?php echo $row['password'];?>">
					              <span style="display:none; color:#FF0000;" id="req_pass">Enter Password</span>
                                  <span style="display:none; color:#FF0000;" id="valid_pass">Enter Valid Password</span>
								</div>
					          </div>
							  
							  <div class="control-group">
					            <label class="control-label" for="input05">Confirm Password</label>
					            <div class="controls">
					              <input type="password" class="input-large" id="cpass" name="cpassword" value="<?php echo $row['cpassword'];?>">
					              <span style="display:none; color:#FF0000;" id="req_cpass">Enter Password</span>
                                  <span style="display:none; color:#FF0000;" id="valid_cpass">Password Not Match</span>
								</div>
					          </div>
							  
							  <div class="control-group">
					            <label class="control-label" for="input06">Mobile No.</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="mobile" name="mobile" value="<?php echo $row['mobile'];?>">
					              <span style="display:none; color:#FF0000;" id="req_mobile">Enter Mobile</span>
                                  <span style="display:none; color:#FF0000;" id="valid_mobile">Enter Valid Mobile</span>
								</div>
					          </div>
							  
							  <div class="control-group">
					            <label class="control-label" for="input07">Profile Photo</label>
					            <div class="controls">
					              <input type="file" class="input-large" id="input07" name="profile" value="<?php echo $row['profile'];?>">
					            </div>
					          </div>

					          <div class="control-group">
					            <label class="control-label">Status</label>
					            <div class="controls">
					              <label class="radio">
					                <input type="radio" name="status" id="optionsRadios1" <?php if($row['status']=='active' || $row['status']==''){ ?> checked="checked" <?php } ?> value="active">
					                Active
					              </label>
					              <label class="radio">
					                <input type="radio" name="status" id="optionsRadios2" <?php if($row['status']=='inactive'){ ?> checked="checked" <?php } ?> value="inactive">
					                Inactive
					              </label>
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