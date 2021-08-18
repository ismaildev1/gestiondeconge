<?php

$user_name = $_POST["user_name"];
$password = $_POST["password"];

$con = new mysqli("localhost","root","","database1");

$req = "select * from admin where user_name='$user_name' and password='$password'";
$res =$con->query($req);
	if($ligne = $res->fetch_assoc())
		{session_start();
			$_SESSION['u'] = $_POST["user_name"];
			$_SESSION['p'] = $_POST["password"];
			header("location:graphe.php");
		}
	else
		{
			echo "<script> 
            window.alert('user_name ou mot de passe incorrect ');
			window.location.href='sign.php';
           </script>"
            ; 
			
		}
?> 