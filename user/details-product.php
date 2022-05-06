<?php
require_once "../securite.php";
require_once "../config.inc.php";
$request1 = "update produits set dispo = 'Indisponible' where qtte=0";
$request2 = "update produits set dispo = 'disponible' where qtte>0";
$link->query($request1);
$link->query($request2);
$username= $_SESSION['user']['username'];
$userid= $_SESSION['user']['user_id'];
if($_GET)
{
	extract($_GET);
	$sql = "select * from produits where id=$id";
	$link->query("SET NAMES 'utf8'");
	$res = $link->query($sql);
    $result = mysqli_query($link, $sql);  
    $row_count = mysqli_num_rows($result);  

}
mysqli_close($link);
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
            <?php if($username=="admin"){
                include_once "../admin/navbar-admin.php";
            }else{
                include_once "navbar-user.php";
            }
            ?> 
        </div>
        <div class="main_container ">
            <div class="cols-25">
				<?php include_once "sidebar-user.php" ?>
            </div>
            <div class="cols-75">
                
				<div class="current">
					<div class="search">
						<form action="" method="">
							<input type="text" placeholder="search" name="search">
							<button type="submit" class="btn">Search</button>
						</form>
					</div>
				</div>
               
                <div class="products-container">
                    
                    <?php
						if ($row_count>0)
						{
						while ($rows = $res->fetch_assoc()){  
                            ?>
                        <table>
                            <tr></tr>
                            <tr>
                                <td><?php echo'<img src="../images/'.$rows['image_produit'].'" alt="Product Image" class="product-cart-img">';?> </td>
                                <td>
                                    <div class="info">
                                        <h2> <?php echo $rows['lib_produit']?> </h2>
                                        <p>
                                        <?php echo $rows['type_produit']?>
                                        </p> <br>
                                        <div class="price">
                                            Price : <?php echo $rows['prix']?> dt
                                        </div>
                                        <p ><?php echo $rows['description']?></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            <?php 
                            if($rows['dispo']=="disponible"){
                            ?>
                            
                            <td><form class="form-out" action="commander.php" method="post">
                                    <label> Quantity </label>
                                    <input type="hidden" name="product_id" value="<?php echo $rows['id']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $rows['prix']; ?>">
                                    <input type="number" value="1" min="1" max="10" name="qte" required>
                                    <button class="btn" type="submit" >commander</button>
                                </form>
                            </td>
                            <?php
                            }else{
                            ?>
                            <td colspan='5'><p class="warning">This product is not available </p>
                            </td>
                            <?php
                            }
                            ?>
                            </tr>
                        </table>
                            
                        
                        <?php
						}
						}
						else
							echo "<h3>Product does'nt exist</h3>";

						?>   

			    </div>
                
 					
                </div>
</div>


<script src="../index.js"></script>
</body>
</html>               