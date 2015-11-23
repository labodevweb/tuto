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

function createTable($pdo){

	$create = "CREATE TABLE IF NOT EXISTS users (
		id INT(11) AUTO_INCREMENT PRIMARY KEY,
		Login VARCHAR(100) NOT NULL, 
		Pass VARCHAR(150) NOT NULL, 
		name VARCHAR(100), 
		Email VARCHAR(100));";

	$res = $pdo->exec($create);
}

?>