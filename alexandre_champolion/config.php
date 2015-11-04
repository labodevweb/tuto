<?php
session_start();
function connect()
{
//Tentative de connexion à la db : 
try
	{
		$db = new PDO('mysql:host=localhost;dbname=exercice_php;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
catch (Exception $e)
		{
		die('Erreur : ' . $e->getMessage('Une erreur sest produite lors de la connexion à la base'));
		}
return $db;
}