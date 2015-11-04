<?php

function connect(){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=exercice_php;charset=utf8', 'root', 'root');
		return $bdd;
	}

	catch(Exception $e) {
		die($e->getMessage());
	}
	
}
?>
