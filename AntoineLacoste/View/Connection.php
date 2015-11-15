<?php
if (isset($_SESSION)){
    session_destroy();
}
session_start();
include '../Controller/UserController.php';

$userBDD = new UserBDD();

echo "
<legend> Connexion</legend><br/>
<form method='post'>
    <label> Login : </label>
    <input type='text' name='login'><br/><br/>
    <label> Password : </label>
    <input type='password' name='password'><br/><br/>
    <input type='submit' name='connect'>
</form>";

if (isset($_POST['login']) && isset($_POST['password'])){
    $user=$userBDD->checkConnection($_POST['login'],$_POST['password']);
    if ($user != null){
        echo "coucou";
        $_SESSION['firstname']=$user['firstname'];
        $_SESSION['lastname']=$user['lastname'];
        header('Location: http://localhost/Labo/tuto/AntoineLacoste/View/UsersView.php');
    }
    else{
        echo "ERREUR D'IDENTIFIANTS";
    }
}