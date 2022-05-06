<?php
require_once "../securite.php";
require_once "../config.inc.php";

$userid= $_SESSION['user']['user_id'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$erreur="";
	$product_id = trim($_POST["product_id"]);
    $qte= trim($_POST["qte"]);
    $price = trim($_POST["price"]);
	

	$query="select qtte from produits where id=$product_id)";
	$link->query("SET NAMES 'utf8'");
	$resultat = $link->query($query);
	
	while($resultat){
		if((int)$qte > $resultat['qtte']){
			$erreur = "Quantity not available ! ";
	}
	};
	
	if(empty($erreur)){
		 $subtotal=$qte*$price;
		$sql = "insert into cart (product_id,user_id,qte,subtotal) values ('$product_id','$userid','$qte','$subtotal')";
		$link->query("SET NAMES 'utf8'");
		$result = $link->query($sql);
        
	
		if ($result == true)
		{		
			$_SESSION['info']=  "Product added successfully";	
		}
		else
		{
			$_SESSION['info'] = "Error";
		}
	
	}else{
		$_SESSION['info'] = $erreur;
	}
	header('location:products.php');
}
mysqli_close($link);
?>