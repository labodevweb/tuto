<?php
session_start();
include '../Controller/UserController.php';
$_SESSION['userBDD']=new UserBDD();

if (!(isset($_SESSION['firstname']))){
    session_destroy();
    header('Location: http://localhost/Labo/tuto/AntoineLacoste/View/Connection.php');
}

echo "<h1> Bonjour ".$_SESSION['firstname']." ".$_SESSION['lastname']."</h1>";

echo UserController::getUsersTable();

echo "
<h2> Formulaire d'ajout</h2>
<form method='post' id='formAdd'>
    <label> Nom : </label>
    <input type='text' name='firstName'><br/>
    <label> Prénom : </label>
    <input type='text' name='lastName'><br/>
    <label> Age : </label>
    <input type='text' name='age'><br/>
    <label> Login : </label>
    <input type='text' name='login'><br/>
    <label> Password : </label>
    <input type='text' name='password'><br/>
    <input type='submit' name='add'>
</form>";

echo "
<h2> Formulaire de suppression</h2>
<form method='post' id='formDel'>
    <label> Id : </label>
    <input type='text' name='id'><br/>
    <input type='submit' name='delete'>
</form>";

echo "
<h2> Formulaire de modification</h2>
<form method='post' id='formUpd'>
    <label> Id du user a modifer: </label>
    <input type='text' name='id'><br/><br/>
    <label> Nouveau nom : </label>
    <input type='text' name='firstNameNew'><br/>
    <label> Nouveau prénom : </label>
    <input type='text' name='lastNameNew'><br/>
    <label> Nouvel age : </label>
    <input type='text' name='ageNew'><br/>
    <label> Nouveau login : </label>
    <input type='text' name='loginNew'><br/>
    <label> Nouveau password : </label>
    <input type='text' name='passwordNew'><br/>
    <input type='submit' name='update'>
</form>";

UserController::checkActionUser();
