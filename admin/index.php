<?php
include("include/config.php");
session_start();
if(!($_SESSION['uname']))
{
	header("location:login.php");
}
if(isset($_GET['action']))
{
	unset($_SESSION['id']);
	unset($_SESSION['uname']);
	unset($_SESSION['password']);
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Electronics Sales & Service</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">

<!-- Styles -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap-overrides.css" rel="stylesheet">

<link href="css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<link href="js/plugins/datatables/DT_bootstrap.css" rel="stylesheet">
<link href="js/plugins/responsive-tables/responsive-tables.css" rel="stylesheet">

<link href="css/slate.css" rel="stylesheet">
<link href="css/slate-responsive.css" rel="stylesheet">

<link href="css/pages/dashboard.css" rel="stylesheet">

<link href="css/components/error.css" rel="stylesheet">

<!-- Javascript -->
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="js/jquery.ui.touch-punch.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/plugins/datatables/jquery.dataTables.js"></script>
<script src="js/plugins/datatables/DT_bootstrap.js"></script>
<script src="js/plugins/responsive-tables/responsive-tables.js"></script>

<script src="js/Slate.js"></script>

<script src="js/demos/demo.tables.js"></script>

<script src="js/plugins/excanvas/excanvas.min.js"></script>
<script src="js/plugins/flot/jquery.flot.js"></script>
<script src="js/plugins/flot/jquery.flot.orderBars.js"></script>
<script src="js/plugins/flot/jquery.flot.pie.js"></script>
<script src="js/plugins/flot/jquery.flot.resize.js"></script>

<script src="js/demos/charts/bar.js"></script>

<script src="js/validate.js"></script>

<!-- Extra Javascript:
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>

<script src="js/plugins/validate/jquery.validate.js"></script>

<script src="js/demos/demo.validate.js"></script>
-->

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>
<body>
<?php
include("include/header.php");
include("include/nav.php");
	//error_reporting(0);
	if(isset($_REQUEST['page']))
	{
		$page = $_REQUEST['page'];
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
include("include/footer.php");
?>
</body>
</html>