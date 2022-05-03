<?php
session_start();
if (isset($_SESSION['info']))
    $info = $_SESSION['info'];
else {
    $info = "";
}
session_destroy();
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/style.css" rel="stylesheet">
<link href="css/font-style.css" rel="stylesheet">
</head>
<body >
	<nav>
		<div class="buttons">
			<a class="login">I've got an account</a>
			<a class="register" href="create.php">Register</a>
		</div>
	</nav>
	<form class ="myfirstform" action="connect.php" method="post">
		<h1>Connexion</h1>
		<hr>
		<?php if (!empty($info)) { ?>
		<div class="alert">
		<?php echo $info ?>
		</div>
		<?php } ?>
		<input type="text" placeholder="Username" name="username" required>
		<input type="password" placeholder="Password" name="password" required>
		<button type="submit" class="btn">Log in</button>
	</form>
	<footer>
		<h5>Gestion d'une parfumerie</h5>
		<p>&copy; 2022 , L2CS01</p>
	</footer>

	
</body>
</html>