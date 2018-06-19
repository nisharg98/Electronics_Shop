<?php 
include('include/config.php');
session_start();

if(isset($_GET['action']))
{
	if($_GET['action']=='logout')
	{
		unset($_SESSION['email']);
		unset($_SESSION['pass']);
		unset($_SESSION['user_id']);
		header("location:index.php");	
	}
	elseif($_GET['action']=='seller_logout')
	{
		unset($_SESSION['seller_email']);
		unset($_SESSION['seller_pass']);
		unset($_SESSION['seller_id']);
		header("location:index.php");
	}
	else
	{
		header("location:index.php?page=error.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Elecronics Shop</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<script src="js/bootstrap.min.js"></script>
<script src="js/minicart.min.js"></script>
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script src="js/validate.js"></script>
</head>
<body>
<?php
include('include/header.php');
include('include/nav.php');
	//error_reporting(0);
	if(isset($_REQUEST['page']))
	{
		$page=$_REQUEST['page'];
	}
	else
	{
		$page='';
	}
	if(basename($_SERVER['PHP_SELF']) == 'index.php' && $page == '')
	{
		$page = 'home';
	}
	if($page != '' && file_exists('middlepage/'.$page.'.php'))
	{
		include('middlepage/'.$page.'.php');
	}
	else
	{
		//$page="404";
		include('middlepage/error.php');
	}
?>
<!-- Bootstrap Core JavaScript -->
<!-- top-header and slider -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
	$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/					
		$().UItoTop({ easingType: 'easeOutQuart' });						
	});
</script>
<!-- //here ends scrolling icon -->
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner -->
<?php
include('include/footer.php');
?>
</body>
</html>