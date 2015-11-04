<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="index.css" />
	<title> LABO</title>
</head>
<body>
<header><h1>Formulaire Labo</h1></header>

<?php
require_once 'config.php';


if (!empty($_POST)) {
  if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['age'])) { 
    $bdd = Connect();
    try {
    $req = $bdd->prepare("INSERT INTO users(firstname, lastname, age) VALUES(:firstname, :lastname, :age)");
    $req->execute(array(
      'firstname' => $_POST['firstname'],
      'lastname' => $_POST['lastname'],
      'age' => $_POST['age']
      ));
    $req->closeCursor();
   
    $succes = "Votre inscription s'est déroulée avec succès";
  } catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
  }
  } else {
    $error = "Vous n'avez pas rempli tous les champs";
  }
}
?>
  <?php if(isset($succes)) echo $succes; ?>
  
<form method="post" action="./index.php">
  <p>
        <label for="lastname">Votre Nom</label> : 
       	<input type="texte" name="lastname" id="lastname" required /> <br /><br/>

       	<label for="firstname">Votre Prénom</label> : 
      	<input type="text" name="firstname" id="firstname" required /> <br /><br />

      	<label for="age">Votre Age</label> : 
      	<input type="number" name="age" id="age" required /> <br /><br />
  </p>

  <footer>                
       <input type="submit" value="Valider"  id="valider"/>
       <input type="reset" value="Recommencer" id"reset"/>
	</footer>
                
</form>
</body>
</html>