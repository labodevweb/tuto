<?php
require_once 'conf.php';
require_once 'header.php';

$error = "";
$succes = "";
//Vérifie si l'utilisateur a envoyé des infos
if (!empty($_POST)) {
	if (!empty($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['age'])) { // vérifie que les champs obligatoiree ne sont pas vides
		$db = Connect();
		try {
			$req = $db->prepare("INSERT INTO users(first_name, last_name, age) VALUES(:first_name, :last_name, :age)");
			$req->execute(array(
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'age' => $_POST['age'] 
				));
		$req->closeCursor();
		$succes = "Votre inscription s'est déroulée avec succès";
		$error = "";
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
	} else {
		$error = "Vous n'avez pas rempli tout les champs obligatoires";
	}
}
?>
<html>
<head>
	<title>Inscription</title>
</head>
<body>
	<div class="container">
		<form class="form form-horizontal" action="#" method="post">
			<p style="color:red">* = champs obligatoires</p>
			<?php if($error): ?>
				<p style="color:red"><?php echo $error; ?></p>
			<?php endif; ?>
			<?php if($succes): ?>
				<p style="color:green"><?php echo $succes; ?></p>
			<?php endif; ?>
			<div class="form-group">
				<label for="last_name">Nom*</label>
				<input type="text" class="form-control" id="last_name" name="last_name" required>
			</div>
			<div class="form-group">
				<label for="first_name">Prénom*</label>
				<input type="text" class="form-control" id="first_name" name="first_name" required>
			</div>
			<div class="form-group">
				<label for="age">Age*</label>
				<input type="number" class="form-control" id="age" name="age" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Valider</button>
			</div>
		</form>
	</div>
</body>
</html>