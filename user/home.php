<?php
require_once "../config.inc.php";
require_once "../securite.php";
$username = $_SESSION['user']['username'];
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
            <?php if($username=="admin"){
                    include_once "../admin/navbar-admin.php";
                }else{
                    include_once "navbar-user.php";
                }
            ?>   
        </div>
        <div class="main_container">
            <div class="col-25">

            </div>
            <div class="col-75">
                
            </div>
        </div>
    </div>


    
    <script src="../index.js"></script>
</body>
</html>    