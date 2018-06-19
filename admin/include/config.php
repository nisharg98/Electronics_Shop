<?php
ob_start();
$con=mysqli_connect('localhost','root','');
/*if($con)
{
	echo "Server Connected";
}
else
{
	echo "Server Not Connected";
}*/
$db=mysqli_select_db($con,'electronics_shop');
/*if($db)
{
	echo "Database Connected";
}
else
{
	echo "Database Not Connected";
}*/
?>