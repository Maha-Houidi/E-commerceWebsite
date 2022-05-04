<?php
require_once "../securite.php";
require_once "../config.inc.php";
require_once "../tab-produit.php";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$info="";
	$lib = trim($_POST["lib"]);
    $type = trim($_POST["type"]);
	$description = trim($_POST["description"]);
	$prix = trim($_POST["prix"]);
	$qtte = trim($_POST["qtte"]);

	$filename=$_FILES["image"]['name'];
	$temp_name=$_FILES["image"]['tmp_name'];
	$ok = move_uploaded_file($temp_name, $_SERVER["DOCUMENT_ROOT"] .  "/e-commerceTest/images/" . $filename);

	if ($ok == false) {
		$info = "##### false";
	}
	if(empty($info)){
		$sql = "insert into produits (lib_produit,type_produit,description,prix,qtte,image_produit) values ('$lib','$type','$description','$prix','$qtte','$filename')";
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
	header('location:g-produits.php');

	error_log(print_r($_FILES, true));
  
   
}
mysqli_close($link);
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
				Nouveau produit
			</div>
			<form class ="form-out" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"  enctype="multipart/form-data">
				
				<input type="text" placeholder="Libellé" name="lib" required>
				<select name="type" required>
					<option value="" selected>Type</option>
					<?php
					foreach($type_produit as $x=>$y)
					echo "<option value = '$y'> $y </option>";
					?>
					</select>
					<textarea type="text" placeholder="Description" name="description" required></textarea>
					<input type="number" placeholder="Prix" min = "0" max="1000" step="1" name="prix" required>
					<input type="number" placeholder="Quantité" min = "0" max="50" name="qtte" required>
					<input type="file" placeholder="Image" name="image" >
					<button type="submit" class="btn">Créer produit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>