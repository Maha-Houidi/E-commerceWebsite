<?php
require_once "../securite.php";
require_once "../config.inc.php";
if(isset($_SESSION['info']))
$info = $_SESSION['info'];
else
$info="";
unset($_SESSION['info']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parfumerie</title>
	<link rel="stylesheet" href="../css/icon.css">
    <link rel="stylesheet" href="../css/font-style.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="page_container">
        <div class="nav_container">
            <?php include_once "navbar-admin.php"; ?>  
        </div>
        <div class="main_container">
            <div class="col-25">

            </div>
            <div class="col-75">
                
            </div>
        </div>
    </div>
    
</body>
</html>