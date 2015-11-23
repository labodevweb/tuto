
<!DOCTYPE html>
<html>
	<head>
		<title>User | Login</title>
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<meta charset="UTF-8">
	</head>

	<body>
	<div class="generale">
		<h1>Connectez vous !</h1>
		<form method="POST" action="#">
			<label>Login : </label><input type="text" name="login" placeholder="Votre login" required> <br />
			<label>Mot de passe : </label><input type="password" name="password" placeholder="Votre mot de passe" required><br />
			<input type="submit" value="Se connecter" >
		</form>
		<?php
		if(isset($msg_error)) {
			if($msg_error == 1) echo '<p id="error">Identifiant ou mot de passe incorrect !</p> ';
		}

		?>

		<!--<p><a id="detail" href="index.php">Retour à l'accueil</a></p>-->
	</div>
	</body>
</html>