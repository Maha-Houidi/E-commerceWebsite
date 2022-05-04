<?php
require_once "../securite.php";
require_once "../config.inc.php";
if($_GET)
{
	extract($_GET);
	$sql = "select * from utilisateurs where user_id = '$id'";
	$link->query("SET NAMES 'utf8'");
	$result = $link->query($sql);
	$data = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="../css/font-style.css">
    <link rel="stylesheet" href="../style/style.css">
 

, 
</head>
<body>
<div class="page_container">
        <div class="nav_container">
            <?php include_once "navbar-admin.php"; ?>  
        </div>
        <div class="main_container">
            <div class="cols-25">
				<?php include_once "sidebar-admin.php"; ?> 
            </div>
            <div class="cols-75">
                <div class="entete">
                    User's Informations
                </div>
                <form class="form-out" action="g-utilisateurs.php" method="post">
                    <label>ID</label>
                    <input type="text" value="<?php echo $data['user_id']?>" disabled>
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
                    <button type="submit" class="btn">Users list</button>

                </form>
            </div>
        </div>
</div> 

<script src="../index.js"></script>
</body>
</html>

<?php
}
mysqli_close($link);
?>