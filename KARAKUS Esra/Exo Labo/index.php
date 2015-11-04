<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Formulaire d'inscription</title>
        <link href="index.css" rel="stylesheet"
    </head>
</html>

<div id="formulaire">
<?php

include_once("config.php");
@session_start();

if(isset($_POST['firstname']) and(isset($_POST['lastname'])) and(isset($_POST['age'])))
{
    //Les variables
    $firstname = ($_POST['firstname']);
    $lastname = ($_POST['lastname']);
    $age = ($_POST['age']);

    $bdd = connect();
    //Préparation et éxecution de la requète
    $req = $bdd->prepare('INSERT INTO users( firstname, lastname, age)VALUES( :firstname , :lastname , :age )');
    $req->execute(array(
        ':firstname' => $_POST['firstname'],
        ':lastname' => $_POST['lastname'],
        ':age' => $_POST['age']));

    Echo 'Bravo, Inscription fini !';
}
else{
    //Affichage du formulaire
    echo'
        <meta charset="utf-8" />
             <form action="index.php" method="POST">
                <table>
                    Inscription:<br><br/>
                    <label>Nom :</label>
                    <input id="firstname" type="text" size="20" name="firstname" required/><br><br/>

                    <label>Prénom :</label>
                    <input id="lastname" type="text" size="20" name="lastname" required/><br><br/>

                    <label>Age :</label>
                    <input id="age" type="text" name="age" required/><br><br/>

                    <input type="submit" name="entrer" value="S\'inscrire">
                </table>
             </form>';
    }
?>
</div>
