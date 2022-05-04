<?php
require_once "../securite.php";
require_once "../config.inc.php";
$request1 = "update produits set dispo = 'Indisponible' where qtte=0";
$request2 = "update produits set dispo = 'disponible' where qtte>0";
$link->query($request1);
$link->query($request2);
$name = $_SESSION['user']['name'];
$username = $_SESSION['user']['username'];
$search=isset($_GET['search'])?$_GET['search']:"";
$page=isset($_GET['page'])?$_GET['page']:1;
$results_per_page = 5;  

//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($page-1) * $results_per_page;  
$sql = "select * from produits where qtte like '%$search%' LIMIT " . $page_first_result . ',' . $results_per_page;
$link->query("SET NAMES 'utf8'");
$res = $link->query($sql);

$query = "select *from produits where qtte like '%$search%'";  
$result = mysqli_query($link, $query);  
$row_count = mysqli_num_rows($result);  
$number_of_page = ceil ($row_count / $results_per_page);  	
 
 
	
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
    <title>Tableau de bord</title>
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
            <div class="cols-25">
				<?php include_once "sidebar-admin.php"; ?> 
            </div>
            <div class="cols-75">
                
				<div class="current">
					<a href="add-produit.php" >New</a>
					<div class="search">
						<form action="" method="">
							<input type="text" placeholder="search" name="search">
							<button type="submit" class="btn">Search</button>
						</form>
					</div>
				</div>
				<div class="mytable">
					<?php if (!empty($info)) { ?>		
					<div class="alert">
						<?php echo $info; ?>
					</div>
					<?php } ?>
					<table>
						<tr>
							<th>N°</th>
							<th>Label</th>
							<th>Type</th>
							<th>Description</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Availability</th>
							<th>Actions</th>
						</tr>
						<?php
						if ($row_count>0)
						{
						while ($rows = $res->fetch_assoc()){ 
						?>   
						<tr>
							<td><?php echo $rows['id']; ?></td>				
							<td><?php echo $rows['lib_produit']; ?></td>
							<td><?php echo $rows['type_produit']; ?></td> 				
							<td width="30%"><?php echo $rows['description']; ?></td> 		
							<td><?php echo $rows['prix']; ?></td>
							<td><?php echo $rows['qtte']; ?></td> 
							<td><?php echo $rows['dispo']; ?>
							<td>
							<a href="view-produit.php?id=<?php echo $rows['id']; ?>" title="Consulter">
							<img class="icon" src="../images/icons/info.png"></a>
							
							<a href="update-produit.php?id1=<?php echo $rows['id']; ?> && id2=<?php echo $rows['type_produit']; ?>" title="Editer">
							<img class="icon" src="../images/icons/modifier.png"></a>
							
							<a onclick="return confirm('Are you sure you want to delete this product?')" 
							href="delete-produit.php?id=<?php echo $rows['id']; ?>" title="Supprimer">
							<img class="icon" src="../images/icons/supprimer.png"></a>
							</td>
							
						</tr>
						<?php 
						}
						}
						else
							echo "<tr><td colspan='9'><h3>Pas d'enregistrmemts en cours</h3></td></tr>";

						?> 
						
					</table>
					<?php
					//display the link of the pages in URL  
						for($page = 1; $page<= $number_of_page; $page++) {  
							echo '<a class= pagination href = "g-produits.php?page=' . $page . '">page ' .$page. ' </a>';  
						}  
					?>
				</div>
			</div>
		</div>
</div>

<script src="../index.js"></script>
</body>
</html>

