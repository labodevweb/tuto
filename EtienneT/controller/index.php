<?php 

	#traitement PHP

	$bdd = connexion();
	createTable($bdd);#check if user table exist

	#form create
	if(isset($_POST["login"]) AND isset($_POST["password"]) AND isset($_POST["nom"]) AND isset($_POST["mail"])) {
		$error = 0;
		$msg_error=0;
		$login = htmlspecialchars($_POST["login"]);
		$pass = htmlspecialchars($_POST["password"]);
		$nom = htmlspecialchars($_POST["nom"]);
		$mail = htmlspecialchars($_POST["mail"]);
		
		$passfi = sha1(($pass));
		
		
		$exist = checkUser($login, $mail); #check if user or mail exist

		if ($exist == true) {
			$msg_error=1;
			$error = 1;
		}
		
		if($error == 0) {
			if (preg_match('#(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}#', $pass)) {
				if (preg_match('#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST["mail"])) {
					
					$tempUser = new User($login, $passfi, $nom, $mail);#new user object
					$tempUser->user_insertBDD();#save in DB

				}
				else{
					$msg_error=3;#mail
					
				}
			}
			else {
				$msg_error=4;#pass
				
			}
		}
	}

	include_once './view/create_user.php';

?>