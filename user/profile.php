<?php
require_once "../securite.php";
require_once "../config.inc.php";

	$id=$_SESSION['user_id'];
    $username=$_SESSION["username"];
	$query = "select * from utilisateurs where user_id =$id";
	$link->query("SET NAMES 'utf8'");
	$result = $link->query($query);
	$data = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PARFUMERIE</title>
    <link rel="stylesheet" href="../css/font-style.css">
    <link rel="stylesheet" href="../style/style.css">
 

, 
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
            
                <div class="entete">
                    <?php echo $username ; ?>'s profile 
                </div>
                <form class="form-out" action="home.php" method="post">
                    <label>Name</label>
                    <input type="text" value="<?php echo $data['name']?>" disabled>
                    <label>E-Mail</label>
                    <input type="text" value="<?php echo $data['email']?>" name="lib" disabled>
                    <label>Username</label>
                    <input type="text" value="<?php echo $data['username']?>" disabled>
                    <label>Role</label>
                    <input type="text" value="<?php echo $data['role']?>" disabled>
                    <label>Status</label>
                    <input type="text" value="<?php echo $data['status']?>" disabled>
                    <button type="submit" class="btn">Close profile </button>

                </form>
        </div>
</div> 

<script src="../index.js"></script>
</body>
</html>

<?php

mysqli_close($link);
?>