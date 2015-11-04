<?php 
require_once 'config.php';
?>










<html>
<head> 
		<title>Formulaire inscription</title>
</head>

<body>
	<form action="#" method="post">
	<div>
		<label for="last_name">Nom</label>
		<input type="text" id="last_name" name="last_name" required>
	</div>
	<br/>
	<div>
		<label for="first_name">Prénom</label>
		<input type="text" id="first_name" name="first_name" required>
	</div>
	<br/>
	<div>
		<label for="age">Âge</label>
		<input type="number" id="age" name="age" required>
	</div>
	<br/>
		<button type="submit">Valider</button>
	</form>
	</body>
</html>