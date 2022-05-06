<?php
require_once "../securite.php";
require_once "../config.inc.php";
$info="";
if($_GET)
{
	extract($_GET);
	$sql = "delete from cart where cart_id = '$cart_id'";
	$result = $link->query($sql);
	if ($result == true)
	$info =  "Product removed from cart successfully";
	else
	$info = "";
}
$_SESSION['info'] = $info;
header('location:cart.php'); 
mysqli_close($link);
?>