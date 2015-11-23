<?php

	$bdd = connexion();
	#if login
	if(isset($_POST["login"]) AND isset($_POST["password"])) {
		$error = 0;
		$msg_error=0;
		$login = htmlspecialchars($_POST["login"]);
		$pass = htmlspecialchars($_POST["password"]);
		
		$exist = checkUser($login, null); #check if user exist

		if ($exist == false) {
			$msg_error=1;
			$error = 1;
		}
		else{
			#create session
			$_SESSION["login"] = $login;
			header('Location: index.php');
		}
		
	}

	include_once './view/user_login.php';




?>