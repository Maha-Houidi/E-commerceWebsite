<?php
require_once "../securite.php";
require_once "../config.inc.php";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$info="";
	$id = trim($_POST["id"]);
	
	$lib = trim($_POST["lib"]);
    $type = trim($_POST["type"]);
	$description = trim($_POST["description"]);
	$prix = trim($_POST["prix"]);
	$qtte = trim($_POST["qtte"]);
	
	if(empty($info)){
	$sql = "update produits 
	set lib_produit = '$lib', type_produit = '$type', description = '$description', prix = '$prix', qtte = '$qtte' where id='$id'";
	
	$link->query("SET NAMES 'utf8'");
	
	$result = $link->query($sql);
	
	if ($result == true)
	{		
	$info =  "Produit mit à jour avec succès";
	
	}
	else
	{
	$info = "Produit existant";
	}
	
	}
	$_SESSION['info'] = $info;

header("refresh: 1; url = g-produits.php");
  
   
}
mysqli_close($link);
?>