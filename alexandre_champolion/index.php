<<html>
	<head>
		<title>Exercice Php</title>
		<meta charset="utf-8">
	</head>
	<body>
	<?php
	include("config.php");
	include("user.class.php");
	$db = connect()
	?>
	<form method="post" action="index.php">
		<p>
			<label for="lastname">Nom :</label><br>
			<input type="text" id="lastname" name="lastname"/>
		</p>

		<p>
			<label for="firstname">Prénom :</label><br>
			<input type="text" id="firstname" name="firstname"/>
		</p>

		<p>
			<label for="age">Age</label><br>
			<input type="text" id="age" name="age" maxlength="200">
		</p>

		<input type="submit" id="button" value="Valider"/>
	</form>
	</body>
</html>