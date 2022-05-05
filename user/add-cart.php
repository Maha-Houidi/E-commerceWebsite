<?php
require_once "../securite.php";
require_once "../config.inc.php";

$userid= $_SESSION['user']['user_id'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$info="";
	$product_id = trim($_POST["product_id"]);
    $qte= trim($_POST["qte"]);
    $price = trim($_POST["price"]);
    $subtotal=$qte*$price;

	if(empty($info)){
		$sql = "insert into cart (product_id,user_id,qte,subtotal) values ('$product_id','$userid','$qte','$subtotal')";
		$link->query("SET NAMES 'utf8'");
		$result = $link->query($sql);
        
	
		if ($result == true)
		{		
			$info =  "Produit ajouté avec succès";	
		}
		else
		{
			$info = "Produit déjà existe";
		}
	
	}
	$_SESSION['info'] = $info;
	header('location:products.php');
}
mysqli_close($link);
?>