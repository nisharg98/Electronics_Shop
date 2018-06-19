<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	
	//insert
	$sql=mysqli_query($con,"insert into feedback(name,email,message)values('$name','$email','$message')");
	if($sql)
	{
		echo "<script> alert('Feedback Submited'); </script>";
	}
	else
	{
		echo "<script> alert('Feedback Not Submited'); </script>";
	}
}
?>
<!-- contact -->
	<div class="about" style="padding:2em 0;">
		<div class="w3_agileits_contact_grids">
			<div class="col-md-6 w3_agileits_contact_grid_left">
				<div class="agile_map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6956.990874083515!2d72.55429971768999!3d23.06100199068317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1491077619845" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class="agileits_w3layouts_map_pos">
					<div class="agileits_w3layouts_map_pos1">
						<h3>Contact Info</h3>
						<p>Naranpura, Ahmedabad City.</p>
						<ul class="wthree_contact_info_address">
							<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@electronicsshop.com">info@electronicsshop.com</a></li>
							<li><i class="fa fa-phone" aria-hidden="true" style="padding-right:0em;"></i>+(91) 7405179376</li>
						</ul>
						<div class="w3_agile_social_icons w3_agile_social_icons_contact">
							<ul>
								<li><a class="icon icon-cube agile_facebook"></a></li>
								<li><a class="icon icon-cube agile_rss"></a></li>
								<li><a class="icon icon-cube agile_t"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 w3_agileits_contact_grid_right">
				<h2 class="w3_agile_header">Leave a<span> Message</span></h2>
				<form action="" method="post">
					<span class="input input--ichiro">
						<input class="input__field input__field--ichiro" type="text" id="input-25" name="name" placeholder=" " required="" />
						<label class="input__label input__label--ichiro" for="input-25">
							<span class="input__label-content input__label-content--ichiro">Your Name</span>
						</label>
					</span>
					<span class="input input--ichiro">
						<input class="input__field input__field--ichiro" type="email" id="input-26" name="email" placeholder=" " required="" />
						<label class="input__label input__label--ichiro" for="input-26">
							<span class="input__label-content input__label-content--ichiro">Your Email</span>
						</label>
					</span>
					<textarea name="message" placeholder="Your message here..." required=""></textarea>
					<input type="submit" value="Submit" name="submit">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- contact -->