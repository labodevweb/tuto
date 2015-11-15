<?php
include '../Model/UserBDD.php';
include '../Model/User.php';
include '../config.php';

class UserController
{
    public static function checkActionUser(){
        $action = false;
        if (isset($_POST['add'])){
            if (UserController::checkAddFields()) {
                $user = new User(-1,$_POST['firstName'], $_POST['lastName'], $_POST['age'], $_POST['login'], $_POST['password']);
                $_SESSION['userBDD']->createUser($user);
                echo '<h1>Utilisateur ' . $_POST['firstName'] . ' ' . $_POST['lastName'] . ' a bien été ajouté<h1/>';
                $action=true;
            }
        }
        if (isset($_POST['update'])) {
            if (UserController::checkUpdFields()) {
                $user = $_SESSION['userBDD']->getOneById($_POST['id']);
                $_SESSION['userBDD']->updateUser($user, $_POST['firstNameNew'],
                    $_POST['lastNameNew'],
                    $_POST['ageNew'],
                    $_POST['loginNew'],
                    $_POST['passwordNew']);
                echo '<h1>Utilisateur a bien été modifié en ' . $_POST['firstNameNew'] . ' ' . $_POST['lastNameNew'] . '</h1>';
                $action=true;
            }
        }
            if (isset($_POST['delete'])){
                if (UserController::checkDelFields()) {
                    $_SESSION['userBDD']->deleteUser($_POST['id']);
                    echo '<h1>Utilisateur ' . $_POST['id'] . ' a bien été supprimé<h1/>';
                    $action=true;
                }
            }
        if($action)
            header("Refresh:0");
    }

    public static function checkAddFields(){
        return ($_POST['firstName']!==""&& $_POST['lastName']!==""&& $_POST['age']!==""&& $_POST['login']!==""&& $_POST['password']!=="");
    }

    public static function checkUpdFields(){
        return ($_POST['id']!==""
            && $_POST['firstNameNew']!==""&& $_POST['lastNameNew']!==""
            && $_POST['ageNew']!==""&& $_POST['passwordNew']!==""
            && $_POST['loginNew']!=="");
    }

    public static function checkDelFields(){
        return ($_POST['id']!=="");
    }
    public static function getUsersTable(){
        $table= '<table><tr>';
        $table.= '<th> ID </th>';
        $table.= '<th> FirstName </th>';
        $table.= '<th> LastName </th>';
        $table.= '<th> Age </th>';
        $table.= '<th> Login </th></tr>';
        $users = $_SESSION['userBDD']->getUsers();
        foreach($users as $user){
            $table.= $user->toTr();
        }
        $table.= '</table>';
        return $table;
    }

    public static function checkUserConnected(){
        if (!(isset($_SESSION['userConnected']))){
            $res = $_SESSION['userBDD']->checkConnection($_POST['login'],$_POST['password']);
            if ($res !==null){
                $_SESSION['userConnected']=$res;
            }
            else{
                return false;
            }
        }
        return true;
    }
}