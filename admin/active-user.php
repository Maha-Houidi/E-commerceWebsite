<?php
require_once "../securite.php";
require_once "../config.inc.php";
$info="";
if($_GET)
{
	extract($_GET);
	
	if($status == "Active")
	$info = "Le status est déjà activé";	
	else
	{		
	$sql = "update utilisateurs set status = 'Active' where user_id = '$id'";
	
	$result = $link->query($sql);
	if ($result == true)
	$info =  "Compte utilisateur activé avec succès";
	else
	$info = "Erreur d'activation de compte";
    }
}
$_SESSION['info'] = $info;
header('location:g-utilisateurs.php'); 
mysqli_close($link);
?>