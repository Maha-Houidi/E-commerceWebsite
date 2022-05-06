<?php
require_once "../securite.php";
require_once "../config.inc.php";
$request1 = "update produits set dispo = 'Indisponible' where qtte=0";
$request2 = "update produits set dispo = 'disponible' where qtte>0";
$link->query($request1);
$link->query($request2);
$username = $_SESSION['user']['username'];
$user_id = $_SESSION['user']['user_id']; 
$search=isset($_GET['search'])?$_GET['search']:"";
$page=isset($_GET['page'])?$_GET['page']:1;
$results_per_page = 5;  

//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($page-1) * $results_per_page;  
// $sql = "select * from produits where qtte like '%$search%' LIMIT " . $page_first_result . ',' . $results_per_page;
// $link->query("SET NAMES 'utf8'");
// $res = $link->query($sql);

// $query = "select *from produits where qtte like '%$search%'";  
// $result = mysqli_query($link, $query);  
// $row_count = mysqli_num_rows($result);  
// $number_of_page = ceil ($row_count / $results_per_page);  	
 

$query="select *  from produits P , cart C where id in (select product_id from cart where user_id=$user_id  and C.product_id=P.id)";
$link->query("SET NAMES 'utf8'");
$res = $link->query($query);
$row_count = mysqli_num_rows($res);
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
            <div class="mytable">
					<?php if (!empty($info)) { ?>		
					<div class="alert">
						<?php echo $info; ?>
					</div>
					<?php } ?>
					<table>
						<tr>
							
							<th>image</th>
							<th>Description</th>
							<th>Price</th>
							<th>Quantity</th> 
							<th>Subtotal</th> 
							<th>Actions</th> 
						</tr>
						<?php
						if ($row_count>0)
						{
                            $total=0;
						while ($rows = $res->fetch_assoc()){ 
                            $total=$total+$rows['subtotal'];
						?>   
						<tr>
							<td>
                                <?php echo'<img src="../images/'.$rows['image_produit'].'" alt="Product Image" class="product-cart-img">';?>
                                <br> <h2><?php echo $rows['lib_produit']; ?></h2>
                            </td>				
							<td width="30%"><?php echo $rows['description']; ?></td> 				 		
							<td><?php echo $rows['prix']; ?> </td> 
							<td><?php echo $rows['qte']; ?></td> 
							<td><?php echo $rows['subtotal']; ?></td>
							<td>
							
							<a onclick="return confirm('Are you sure you want to delete this product from cart ?')" 
							href="delete-from-cart.php?cart_id=<?php echo $rows['cart_id']; ?>" title="Supprimer">
							<img class="icon" src="../images/icons/supprimer.png"></a>
							</td>
                        
						</tr>
						<?php 
						}
                        ?>
                        <tr class="total-prix">
							<td></td>
							<td></td>
                        <td colspan='2'> <b> Total :</b> </td>
                         <td><?php echo $total; ?> dt</td>   
                        </tr>
                        <?php
						}
						else
							echo "<tr><td colspan='9'><h3>Pas d'enregistrmemts en cours</h3></td></tr>";

						?> 
						
					</table>
					
                    <button class="btn"> <a href="order.php">Order</a></button> 
					<?php
					//display the link of the pages in URL  
						for($page = 1; $page<= $number_of_page; $page++) {  
							echo '<a class= pagination href = "g-produits.php?page=' . $page . '">page ' .$page. ' </a>';  
						}  
					?>
				</div>
		</div>
</div>

<script src="../index.js"></script>
</body>
</html>
