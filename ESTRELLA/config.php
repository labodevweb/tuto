<?php 
//permet de se connecter à la bdd

function Connect() {
	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root'); //Connexion à la BDO
		return $bdd;
	}catch(Exception $e) { 
			die('Erreur : '.$e->getMessage());
	}

}