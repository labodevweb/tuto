<?php

#base
if(isset($_SESSION["login"])){
	$login = $_SESSION["login"];
}
else{
	header('Location: index.php');
}

$currUser = createLogUser($login);

#deconecton
if(isset($_POST["decoUser"])){
	session_unset();
	header('Location: index.php?p');
}

#supression
if(isset($_POST["supprUser"])){
	$currUser->user_supprUserBDD();
	session_unset();
	header('Location: index.php');
}

#modif
if(isset($_POST["name"]) || isset($_POST["mail"]) || isset($_POST["password"])){
	$msg_error = $currUser->user_checkModifs($_POST["name"], $_POST["mail"], $_POST["password"]);
	$currUser = createLogUser($login);
}


include_once 'view/user_profil.php';

?>