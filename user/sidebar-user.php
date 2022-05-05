<?php
require_once "../securite.php";
require_once "../config.inc.php";
require_once "../tab-produit.php";
?>
<div class="sidebar">
	
	<ul>
	  <a href="products.php" class="sidebar-title">Categories</a>
      <?php
		foreach($type_produit as $x=>$y){
	  ?>
		<li><a href="products-by-type.php?type=<?php echo $y; ?>"><?php echo $y; ?> </a></li>
	  <?php
		}
	  ?> 
	</ul>
</div>