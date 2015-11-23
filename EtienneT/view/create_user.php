
<!DOCTYPE html>
<html>
	<head>
		<title>User | Inscription</title>
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<meta charset="UTF-8">
	</head>

	<body>
	<div class="generale">
		<h1>Bienvenue sur la page d'inscription</h1>
		<p> Déjà inscrit ? <a href="index.php?p=login">Connectez-vous.</a> </p>
		<form method="POST" action="#">
			<label>Login : </label><input type="text" name="login" placeholder="Votre login" required> <br />
			<label>Mot de passe : </label><input type="password" name="password" placeholder="Votre mot de passe" required><br />
			<p id="mdp">le mot de passe doit contenir au minimum une minuscule, une majuscule, un chiffre et doit être de longeur au moins 6 caractères.</p>
			<label>Nom et prénom : </label><input type="text" name="nom" placeholder="Votre nom et prénom" required><br />
			<label>Mail : </label><input type="email" name="mail" placeholder="Votre email" required><br />
			<input type="submit" value="S'inscrire" >
		</form>
		<?php
		if(isset($msg_error)) {
			if($msg_error == 0) echo 'Vous avez bien été inscrit, félicitation ! <a href="index.php?p=login">Connectez-vous.</a>';
			if($msg_error == 1) echo '<p id="error">Pseudo ou mail déjà existant !</p> ';
			if($msg_error == 2) echo '<p id="error"> Email déjà existant !</p> ';
			if($msg_error == 3) echo '<p id="error"> L\'adresse mail ne respecte pas le bon format !</p> ';
			if($msg_error == 4) echo '<p id="error">Le mot de passe ne respecte pas le bon format !</p> ';
		}

		?>

		<!--<p><a id="detail" href="index.php">Retour à l'accueil</a></p>-->
	</div>
	</body>
</html>