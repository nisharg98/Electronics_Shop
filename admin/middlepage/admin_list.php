<div id="content">
	<div class="container">
		<div id="page-title" class="clearfix">
			<ul class="breadcrumb">
			  <li>
			    <a href="index.php?page=admin_form">Add New Admin</a>
			  </li>
			</ul>
		</div> <!-- /.page-title -->
		<div class="row">
		    <div class="span12">
	      		<div class="widget widget-table">
					<div class="widget-header">						
						<h3>
							<i class="icon-th-list"></i>
							Admin List							
						</h3>
					</div> <!-- /widget-header -->
					<div class="widget-content">
						<table class="table table-striped table-bordered table-highlight" id="example">
							<thead>
								<tr>
									<th>Id</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Password</th>
									<th>Mobile No.</th>
									<th>Profile</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$result=mysqli_query($con,"select * from admin");
									while($row=mysqli_fetch_array($result))
									{
								?>
								<tr class="odd gradeX">
									<td><?php echo $row['id'];?></td>
									<td><?php echo $row['fname'];?></td>
									<td><?php echo $row['lname'];?></td>
									<td><?php echo $row['email'];?></td>
									<td><?php echo $row['password'];?></td>
									<td><?php echo $row['mobile'];?></td>
									<td><?php if($row['profile']!=NULL)
									{ ?>
									<img src="<?php echo "img/admin_profile/".$row['profile']; ?>" height="70" width="70">
									<?php } ?></td>
									<td>
										<?php 
	                                    if($_SESSION['id'] == 1 && $row['id']!= 1 )
	                                    {
	                                    ?>
	                                    <a href="index.php?page=admin_action&id=<?php echo $row['id']; ?>&status=<?php echo $row['status']; ?>"><?php echo $row['status']; ?></a>
	                                    <?php 
	                                	}
	                                    else 
	                                    {
	   		                              echo $row['status'];    
	                                    } ?>
									</td>
									<td>
										<a href="index.php?page=admin_form&id=<?php echo $row['id'];?>" class="btn btn-info">Edit</a> |
										<a href="index.php?page=admin_action&id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
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