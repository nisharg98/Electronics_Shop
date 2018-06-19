<?php
if(isset($_POST['submit']))
{
	$pass=$_POST['password'];
	$cpass=$_POST['cpassword'];

	$result1=mysqli_query($con,"update admin set password='$pass',cpassword='$cpass' where id='$id'");
	if($result1)
	{
		$_SESSION['password']=$pass;
		echo "<script> alert('Password Change Successfully'); </script>";
	}	
	else
	{
		echo "<script> alert('Password Does Not Change'); </script>";
	}
}
?>
<div id="content">
		
	<div class="container">

		<div class="row">
			
			<div class="span12">
	      		
	      		<div id="horizontal" class="widget widget-form">
	      			
	      			<div class="widget-header">	      				
	      				<h3>
	      					<i class="icon-pencil"></i>
	      					Change Password	      					
      					</h3>	
      				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<form class="form-horizontal" action="" method="post" onsubmit="return password_form();">
					        <fieldset>
					          <div class="control-group">
					          <label class="control-label" for="input01">New Password</label>
					            <div class="controls">
					              <input type="password" class="input-large" id="pass" name="password">
					              <span style="display:none; color:#FF0000;" id="req_pass">Enter Password</span>
                                  <span style="display:none; color:#FF0000;" id="valid_pass">Enter Valid Password</span>
								</div>
					          </div>
							  
							  <div class="control-group">
					            <label class="control-label" for="input02">Confirm New Password</label>
					            <div class="controls">
					              <input type="password" class="input-large" id="cpass" name="cpassword">
								  <span style="display:none; color:#FF0000;" id="req_cpass">Enter Password</span>
                                  <span style="display:none; color:#FF0000;" id="valid_cpass">Password Not Match</span>
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