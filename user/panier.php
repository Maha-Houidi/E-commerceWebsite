<?php
require_once "../securite.php";
require_once "../config.inc.php";
$username = $_SESSION['user']['username'];

if(isset($_SESSION['panier'])){
    if( count($_SESSION['panier'][3]) >0 ){
        $commandes = $_SESSION['panier'][3];
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parfumerie</title>
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
            <div class="cils-75">
            <h1>panier utilisateur </h1>
            <div class="mytable">
					<?php if (!empty($info)) { ?>		
					<div class="alert">
						<?php echo $info; ?>
					</div>
					<?php } ?>
					<table>
						<tr>
							
							<th></th>
							<th>Produit</th>
							<th>Quantity</th> 
							<th>Subtotal</th> 
							<th>Actions</th> 
						</tr>
						<?php
						 foreach($commandes as $index=> $commande){
						?>   
						<tr>
							<td>
                                <?php echo $index+1; ?>
                            </td>				
							<td ><?php echo $commande[0]; ?></td> 				 		
							<td><?php echo $commande[1]; ?> </td> 
							<td><?php echo $commande[2]; ?></td> 
							<td>
							
							<a onclick="return confirm('Are you sure you want to delete this product from cart ?')" 
							href="delete-from-cart.php?cart_id=<?php echo $commande[0]; ?>" title="Supprimer">
							<img class="icon" src="../images/icons/supprimer.png"></a>
							</td>
                        
						</tr>
						<?php 
						}
                        ?>
                        <!-- <tr class="total-prix">
							<td></td>
							<td></td>
                        <td colspan='2'> <b> Total :</b> </td>
                         <td><?php echo $total; ?> dt</td>   
                        </tr> -->
                        <?php
						// }
						// else
							// echo "<tr><td colspan='9'><h3>Pas d'enregistrmemts en cours</h3></td></tr>";

						?> 
						
					</table>
					
                     
					<?php
					// //display the link of the pages in URL  
					// 	for($page = 1; $page<= $number_of_page; $page++) {  
					// 		echo '<a class= pagination href = "g-produits.php?page=' . $page . '">page ' .$page. ' </a>';  
					// 	}  
					?>
				</div>
            <button class="btn" type="submit">Valider</button>
            </div>
        </div> 
</div>


<script src="../index.js"></script>
</body>
</html>