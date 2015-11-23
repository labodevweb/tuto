
<!DOCTYPE html>
<html>
	<head>
		<title>User | Profil</title>
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<meta charset="UTF-8">
	</head>

	<body>
	<div class="generale">
		<h1>Bienvenue <?php echo $currUser->name; ?> !</h1>
		<form method="POST" action="#">
			<input type="hidden" name="decoUser"> <br />
			<input type="submit" value="Se déconnecter" >
		</form>

		<h2>Voici vos informations actuelles :</h2>

		<li>Login : <?php echo $currUser->login; ?></li>
		<li>Email : <?php echo $currUser->mail; ?></li>
		<li>Nom : <?php echo $currUser->name; ?></li><br/>
		<br/>

		<h2>Vous souhaitez supprimer votre compte ?</h2>
		<form method="POST" action="#">
			<input type="hidden" name="supprUser"> <br />
			<input type="submit" value="Supprimer mon compte" >
		</form>
		<p>Attention : cette action est irréversible !</p>
		<br/>
		<br/>

		<h2>Modifier mes informations</h2>
		<h4>Un ou plusieurs éléments simultanément</h4>
		<form method="POST" action="#">
			<label>Nom : </label><input type="text" name="name" placeholder="Votre nouveau nom"> <br />
			<label>Email : </label><input type="email" name="mail" placeholder="Votre nouveau mail"> <br />
			<label>Mot de passe : </label><input type="password" name="password" placeholder="Votre mot de passe"><br />
			<p id="mdp">le mot de passe doit contenir au minimum une minuscule, une majuscule, un chiffre et doit être de longeur au moins 6 caractères.</p>
			<input type="submit" value="Modifier" >
		</form>

		<?php
		if(isset($msg_error)) {
			echo '<p id="error">'.$msg_error.'</p> ';
		}

		?>

		<!--<p><a id="detail" href="index.php">Retour à l'accueil</a></p>-->
	</div>
	</body>
</html>