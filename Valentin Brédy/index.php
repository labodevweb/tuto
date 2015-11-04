<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 04/11/2015
 * Time: 14:28
 */

function connect()
{




}
    if(isset($_POST['nom'])){
        echo $_POST['nom'];
    }
?>
<div id="contenu">

    <h1>Formulaire de contact</h1>
    <form method='post' target=''>

    <label for"nom">Nom:</label><input type="text" name="nom" />
    <label for"prenom">Prenom:</label><input type="text" name="prenom" />
    <label for"Age">Age:</label><input type="number" name="Age" />
    <input type="submit" value="envoyer" />

    </form>
</div>