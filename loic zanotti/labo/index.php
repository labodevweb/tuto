<?php
/**
 * Created by PhpStorm.
 * User: ZANOTTILoic
 * Date: 04/11/2015
 * Time: 13:41
 */

session_start();
include("config.php");
include("user.php");
$pdo = connect();
?>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <form method="post" action="" name="register">
        <label for="lastname">Lastname :</label>
        <input type="text" name="lastname"><br/>
        <label for="firstname">Firstname :</label>
        <input type="text" name="firstname"><br/>
        <label for="age">age:</label>
        <input type="number" name="age"><br/>
        <input type="submit" name="register" value="register">
        </form>
    </body>
</html>
<?php

if(isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['age'])){
    $user = new user($_POST['firstname'],$_POST['lastname'],$_POST['age']);
    $user = register();
    /*$req = $pdo->prepare("INSERT INTO users(lastname,firstname,Age) VALUES (:lastname,:firstname,:Age)");
    $req->execute(array(
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'Age' => $_POST['age'],
    ));
    */
}
?>