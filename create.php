<?php
session_start();
if (isset($_SESSION['info']))
    $info = $_SESSION['info'];
else {
    $info = "";
}
session_destroy();
?>
<!DOCTYPE html>
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
            <a class="login" href="index.php">I've got an account</a>
            <a class="register" href="create.php">Register</a>
        </div>
	</nav>
    <form class ="myfirstform" action="verif-create.php" method="post">
        <h1>New account</h1>
        <hr>
        <?php if (!empty($info)) { ?>
        <div class="alert">
        <?php echo $info ?>
        </div>
        <?php } ?>
        <input type="text" placeholder="Full name" name="fullname" required>
        <input type="email" placeholder="E-Mail" name="email" required>
        <input type="text" placeholder="User name" name="username" required>
        <input type="password" placeholder="Password" name="password" required>
        <input type="password" placeholder="Confirm password" name="confirm_password" required>
        <button type="submit" class="btn">Register</button>
	</form>
	<footer>
        <h5>Gestion d'une parfumerie</h5>
        <p>&copy; 2022 , L2CS01</p>
	</footer>
</body>
</html>
