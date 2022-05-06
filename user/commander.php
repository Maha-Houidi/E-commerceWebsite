<?php
require_once "../securite.php";
require_once "../config.inc.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// var_dump($_POST);
$user_id=$_SESSION['user']['user_id'];
$id_produit = trim($_POST['product_id']);
$quantite = trim($_POST['qte']);
$prix =$_POST['price'] ;

$total=$prix*$quantite;
$date= date("Y-m-d");

if(!isset($_SESSION['panier'])){
    $_SESSION['panier']=array( $user_id, 0, $date, array() ); //creation de panier
}
$_SESSION['panier'][1] += $total;
$_SESSION['panier'][3][]= array( $id_produit, $quantite, $total , $date, $date );// ajouter commande 

// echo 'panier';
// var_dump($_SESSION['panier']);
header("location:panier.php");
}
?>