<?php
require_once "../securite.php";
require_once "../config.inc.php";
if($_GET)
{
	
	extract($_GET);
	$sql = "select * from produits where id = '$id'";
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
               Product's informations 
            </div>
            <form class="form-out" action="g-produits.php" method="post">

                <label>Number</label>
                <input type="text" value="<?php echo $data['id']?>" disabled>
                <label>Label</label>
                <input type="text" value="<?php echo $data['lib_produit']?>" disabled>
                <label>Type</label>
                <input type="text" value="<?php echo $data['type_produit']?>" name="lib" disabled>
                <label>Description</label>
                <textarea name="description" disabled><?php echo $data['description']?></textarea>
                <label>Price</label>
                <input type="number" value="<?php echo $data['prix']?>" disabled>
                <label>Quantity</label>
                <input type="number" value="<?php echo $data['qtte']?>" disabled>
                <button type="submit" class="btn">Products list</button>

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