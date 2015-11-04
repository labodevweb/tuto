<!DOCTYPE HTML>

<html>
<head>
	    <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.css">
	<title>Exercice</title>
</head>
<body>

</body>
</html>

<?php 


include('class.php');


$valider = new User;
$valider->valider();
?>
       
<legend> Formulaire </legend><br/>
<form action="index.php" method="post">
<label> Nom : </label>
<input type="text" name="first_name"><br/><br/>
<label> Prénom : </label>
<input type="text" name="last_name"><br/><br/>
<label> Age : </label>
<input type="text" name="old"><br/><br/>
<input type="submit" name="send">
</form>