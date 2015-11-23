<?php
#session
session_start();
#includes
include_once './model/config.php';
include_once './model/model_user.php';
include_once './controller/class_user.php';

#session first
if(isset($_SESSION["login"])){
	include_once 'controller/profil_controller.php';
}
else { #get
	if(!isset($_GET["p"])){
		#default
		include_once 'controller/index.php';
	}
	else {
 		#login default
 		include_once 'controller/login_controller.php';

	}
}


?>