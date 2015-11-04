<?php
//Permet de se connecter a la bdd
function Connect() {
  try
	{
		$db = new PDO('mysql:host=localhost;dbname=exercice_php;charset=utf8','root',''); // Connexion a la BDD
		return $db;
	} catch(Exception $e) {
	        die('Erreur : '.$e->getMessage());
	}
}