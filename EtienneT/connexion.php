<?php 
function connexion(){	
	$host='localhost';
	$user='root';
	$password='';
	$basename='test';
		
	try
	{
        // On se connecte à MySQL
  		$bdd = new PDO('mysql:host='.$host.';dbname='.$basename, $user, $password);
	}
	catch(Exception $e)
	{
        // En cas d'erreur, on affiche un message et on arrête tout
        //die('Erreur : '.$e->getMessage());
		echo"Erreur de connexion à la base de données en ligne.";
	}

	return $bdd;
}

/*check if user exist*/
function checkUser($login, $mail){
	$ret = false;
	$bdd = connexion();

    $req = $bdd->prepare('SELECT * from users where Email = ? or Login = ?');
    $req->execute(array($mail, $login));

    if($req->fetch()) {
		$ret = true;//exist
	}

	$req->closeCursor();
    return $ret;
}


?>