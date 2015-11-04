<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=exercice','root','root'); // Essai de connexion
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}
// Fin - Connexion à la base de données
$bdd->query("SET NAMES UTF8");

?>
