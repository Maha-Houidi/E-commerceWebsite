<?php
session_start();
require_once "config.inc.php";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $erreur = "";
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);   
	$username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);
    if($password != $confirm_password){
    $erreur = "Passwords do not match";
    }
    if(empty($erreur))
    {
        $request="INSERT INTO utilisateurs(name,email,username,password) values
        ('$fullname','$email','$username',md5('$password'))";
        $link->query("SET NAMES 'utf8'");
        if ($link->query($request) === TRUE) {
            $_SESSION['info']  = "Account created pending approval.";
            header('location:create.php');
        } 
		else {
            $_SESSION['info'] = "Username or email taken ! Try again ";
		    header('location:create.php');
        }
    }
	else
	{
    $_SESSION['info'] = $erreur;
	header('location:create.php');
	}

}
// Close connection
    mysqli_close($link);
?>