<?php
    session_start();
    if(!isset($_SESSION['user'])) {
		$_SESSION['info'] = "Vous n'etes pas autorisé à accéder <br> Veuillez contacter l'administrateur du site.";
        header('location:index.php');
        exit();
    }
?>
