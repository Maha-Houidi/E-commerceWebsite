<?php
session_start();
require_once "config.inc.php";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		
		$sql = "select * from utilisateurs where username= '$username' and password=md5('$password')
		and status= 'Active'";
		$link->query("SET NAMES 'utf8'");
		$result = $link->query($sql);
		$count = mysqli_num_rows($result);
		if ($count>0) {
		$row = $result->fetch_assoc();
			if($row['role'] == "administrateur")
			{
			$_SESSION['user'] =$row;
			header("location:admin/account-admin.php");
			}
			else
			{
			$_SESSION['user'] =$row;
			
			header("location:user/account-user.php");
			}
		}
		else
		{
		/*récupérer l'erreur dans une session*/
		$_SESSION['info'] = "Code(s) d'accès invalide(s)";
		header("location:index.php");
		}
	}	
mysqli_close($link);
?>