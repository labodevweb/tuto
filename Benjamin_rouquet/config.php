


<?php
function connect()
{
try
{
    $db = new PDO('mysql:host=localhost;dbname=exercice;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
  
return $db;
}

if (isset ($_COOKIE['first_name']) && empty($id_user)) //Pour se souvenir du user
{
$_SESSION['first_name'] = $_COOKIE['first_name']; 

/* On créé la variable de session à partir du cookie pour ne pas avoir à vérifier 2 fois sur les pages qu'un membre est connecté. */

}
if (isset ($_COOKIE['first_name']) && !empty($id_user))
{
//On est connecté
}
if (!isset ($_COOKIE['first_name']) && empty($id_user))
{
//On n'est pas connecté
}

if (isset($_SESSION['id_user'])) {
	$db = connect();
	$req = $db->prepare('UPDATE user SET connected = \'1\' WHERE id_user = :id_user');
			$req->execute(array(
				'id_user' => $_SESSION['id_user']
				));
} else {
// rien

}
?>