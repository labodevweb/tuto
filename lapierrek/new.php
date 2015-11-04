<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF:-8"/> 
	<title> Formulaire </title>
	<?php include ('config.php');
	include('traitement.php');
?>	<link rel="stylesheet" type="text/css" href="exo.css">
</head>
<body>
	<h1> <p> *-- Veuillez remplir les champs obligatoires --* </p> </h1>
<form action="new.php" method="POST">
<label for="nom"> Nom : </label>
	<input type="text" name="nom" id="nom"/>
	<br>
	<br>
<label for="prenom"> Prenom : </label>
<input type="text" name="prenom" id="prenom"/>
<br>
<br>
<label for="age"> Age : </label>
<input type="text" name="age" id="age"/>
<br>
<br>
<button type="submit" name="send"> Envoyer mes informations ! </button>
</form>
</body>
</html>