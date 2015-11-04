<?php
session_start();
function connect()
{
//Tentative de connexion à la db : 
try
	{
		$db = new PDO('mysql:host=localhost;dbname=exercices_php;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
catch (Exception $e)
		{
		die('Erreur : ' . $e->getMessage());
		}
return $db;
}
?>