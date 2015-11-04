<?php
# paramètres pour le hachage des mots de passe
$password_options = [ 'algo' => PASSWORD_DEFAULT, 'options' => [ 'cost' => 12 ] ];

# la connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);