<?php
if(isset($_GET['order_id']) || isset($_GET['user_id']))
{
	$order_id=$_GET['order_id'];
	$user_id=$_GET['user_id'];
}
else
{
	$order_id='';
	$user_id='';
}

$sql=mysqli_query($con,"select * from track_order where order_id='$order_id'");
$row=mysqli_fetch_array($sql);

if($row['status']=='Cancelled')
{
	echo "<script> alert('This Order Has Been Cancelled'); </script>";
}
elseif($row['status']=='Delivered')
{
	echo "<script> alert('This Order Has Been Delivered'); </script>";
}
else
{
	if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
		$order=$_POST['order'];
		$user=$_POST['user'];
		//$approval=$_POST['approval'];
		$processing=$_POST['processing'];
		$shipping=$_POST['shipping'];
		$delivery=$_POST['delivery'];
		
		if($processing!='')
		{
			if($processing==$row['processing_status'])
			{
				$date=$row['processing_date'];
			}
			else
			{
				date_default_timezone_set('Asia/Kolkata');
				$date=date("Y-m-d H:i:s");
			}
			$sql1=mysqli_query($con,"update track_order set processing_date='$date',processing_status='$processing' where id='$id'");	
		}
		
		if($shipping!='')
		{
			if($shipping==$row['shipping_status'])
			{
				$date=$row['shipping_date'];
			}
			else
			{
				date_default_timezone_set('Asia/Kolkata');
				$date=date("Y-m-d H:i:s");
			}
			$sql2=mysqli_query($con,"update track_order set shipping_date='$date',shipping_status='$shipping' where id='$id'");
		}
		
		if($delivery!='')
		{
			$sql3=mysqli_query($con,"update track_order set delivery_date=now(),delivery_status='$delivery',status='Delivered' where id='$id'");
		}
		header("location:index.php?page=view_order");
	}
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
	      					Order Status	      					
      					</h3>	
      				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<form class="form-horizontal" action="" method="post">
					        <fieldset>
					        	<input type="hidden" name="id" value="<?php echo $row['id'];?>">
								
								<div class="control-group">
					            <label class="control-label" for="select01">Order Id</label>
					            <div class="controls">
					              <select name="order">
									<option value="">--Select Id--</option>
								  <?php 
								  $sql2=mysqli_query($con,"select * from order_detail");
								  while($row2=mysqli_fetch_array($sql2))
								  {
								  ?>
					                <option <?php if($order_id==$row2['order_id']){?> selected="selected" <?php } ?> value="<?php echo $row2['order_id']; ?>"><?php echo $row2['order_id']; ?></option>
					              <?php } ?></select>
					            </div>
					          </div>
								
								<div class="control-group">
					            <label class="control-label" for="select01">User Id</label>
					            <div class="controls">
					              <select name="user">
									<option value="">--Select Id--</option>
								  <?php 
								  $sql3=mysqli_query($con,"select * from user");
								  while($row3=mysqli_fetch_array($sql3))
								  {
								  ?>
					                <option <?php if($user_id==$row3['id']){?> selected="selected" <?php } ?> value="<?php echo $row3['id']; ?>"><?php echo $row3['id']; ?></option>
					              <?php } ?></select>
					            </div>
					          </div>
								
					          <div class="control-group">
					            <label class="control-label" for="input01">Approval Status</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="approval" name="approval" value="<?php echo $row['approval_status'];?>">
								</div>
					          </div>
							  
							  <div class="control-group">
					            <label class="control-label" for="input01">Processing Status</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="processing" name="processing" value="<?php echo $row['processing_status'];?>">
								</div>
					          </div>
							  
							  <div class="control-group">
					            <label class="control-label" for="input01">Shipping Status</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="shipping" name="shipping" value="<?php echo $row['shipping_status'];?>">
								</div>
					          </div>
							  
							  <div class="control-group">
					            <label class="control-label" for="input01">Delivery Status</label>
					            <div class="controls">
					              <input type="text" class="input-large" id="delivery" name="delivery" value="<?php echo $row['delivery_status'];?>">
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