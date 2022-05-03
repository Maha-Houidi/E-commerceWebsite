<?php
require_once "../securite.php";
require_once "../config.inc.php";
$info="";
if($_GET)
{
	extract($_GET);
	$sql = "delete from produits where id = '$id'";
	$result = $link->query($sql);
	if ($result == true)
	$info =  "Produit supprimé avec succès";
	else
	$info = "Ce produit est lié à une commande";
}
$_SESSION['info'] = $info;
header('location:g-produits.php'); 
mysqli_close($link);
?>