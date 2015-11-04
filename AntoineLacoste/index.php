<?php
require './config.php';
require './UserBDD.php';
/**
 * Created by PhpStorm.
 * User: Pandaks
 * Date: 04/11/2015
 * Time: 12:06
 */

$userBDD = new UserBDD();

if (
    (
        isset($_POST['firstName']) &&
        isset($_POST['lastName']) &&
        isset($_POST['age'])
    )
    || (
        isset($_POST['firstNameOld']) &&
        isset($_POST['lastNameOld']) &&
        isset($_POST['ageOld']) &&
        isset($_POST['firstNameNew']) &&
        isset($_POST['lastNameNew']) &&
        isset($_POST['ageNew'])
    )
) {
    switch ($_POST['form']) {
        case 'add':
            $userBDD->createUser($_POST['firstName'],$_POST['lastName'],$_POST['age']);
            echo '<h1>Utilisateur '.$_POST['firstName'].' '.$_POST['lastName'].' a bien été ajouté<h1/>';
            break;
        case 'upd':
            $userBDD->updateUser($_POST['firstNameOld'],$_POST['lastNameOld'],$_POST['ageOld'],
                $_POST['firstNameNew'],$_POST['lastNameNew'],$_POST['ageNew']);
            echo '<h1>Utilisateur '.$_POST['firstNameOld'].' '.$_POST['lastNameOld'].' a bien été modifié en '.$_POST['firstNameNew'].' '.$_POST['lastNameNew'].'</h1>';
            break;
        case 'del':
            $userBDD->deleteUser($_POST['firstName'],$_POST['lastName'],$_POST['age']);
            echo '<h1>Utilisateur '.$_POST['firstName'].' '.$_POST['lastName'].' a bien été supprimé<h1/>';
            break;
        default:

    }
}

else{

    echo "<h1>Formulaire d'ajout</h1><br>
    <form method='POST'id='formAddUser'>
    First name : <input type='text' name='firstName' />
    Last name : <input type='text' name='lastName' />
    Age : <input type='text' name='age' />
    <input type='hidden' value='add' name='form'/>
    <input type='submit' value='Ajouter'/>
    </form>
        ";

        echo "<h1>Formulaire de modification</h1><br>
    <form method='POST' id='formUpdateUser'>
    First name old : <input type='text' name='firstNameOld' />
    Last name old : <input type='text' name='lastNameOld' />
    Age old : <input type='text' name='ageOld' />
    First name new : <input type='text' name='firstNameNew' />
    Last name new : <input type='text' name='lastNameNew' />
    Age new : <input type='text' name='ageNew' />
    <input type='hidden' value='upd' name='form'/>
    <input type='submit' value='Modifier'/>
    </form>
        ";

        echo "<h1>Formulaire de suppression</h1><br>
    <form method='POST' id='formDeleteUser'>
    First name : <input type='text' name='firstName' />
    Last name : <input type='text' name='lastName' />
    Age : <input type='text' name='age' />
    <input type='hidden' value='del' name='form'/>
    <input type='submit' value='Supprimer'/>
    </form>
        ";

        echo '<h1>Les users de la table</h1>';
        echo $user = $userBDD->getUsers();

}