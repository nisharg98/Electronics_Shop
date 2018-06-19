<div id="content">
		
	<div class="container">
		
		<div id="page-title" class="clearfix">
			
			<ul class="breadcrumb">
			  <li>
			    <a href="index.php?page=feedback_form">Add New Feedback</a>
			  </li>
			</ul>
			
		</div> <!-- /.page-title -->
	
		<div class="row">
		    
		    <div class="span12">
	      		
	      		<div class="widget widget-table">
						
					<div class="widget-header">						
						<h3>
							<i class="icon-th-list"></i>
							Feedback List							
						</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<table class="table table-striped table-bordered table-highlight" id="example">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Email</th>
									<th>Message</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$result=mysqli_query($con,"select * from feedback");
									while($row=mysqli_fetch_array($result))
									{
								?>
								<tr class="odd gradeX">
									<td><?php echo $row['id'];?></td>
									<td><?php echo $row['name'];?></td>
									<td><?php echo $row['email'];?></td>
									<td><?php echo $row['message'];?></td>
									<td>
										<a href="index.php?page=feedback_form&id=<?php echo $row['id'];?>" class="btn btn-info">Edit</a> |
										<a href="index.php?page=feedback_action&id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
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