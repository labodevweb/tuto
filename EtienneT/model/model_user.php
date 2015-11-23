<?php

/*insert user BDD*/
function insertUser($user){
	$bdd = connexion();

	$req = $bdd->prepare("insert into users (Login, Pass, name, Email) values (?, ?, ?, ?)");
	$req->execute(array($user->login, $user->password, $user->name, $user->mail));

	$user->id = $bdd->lastInsertId();

	$req->closeCursor();
	//done !
}

#delete user BDD
function deleteUser($user){
	$bdd = connexion();

	$req = $bdd->prepare("DELETE FROM users WHERE id = ?");
	$req->execute(array($user->id));
	$req->closeCursor();

}


/*check if user exist*/
function checkUser($login, $mail){
	$ret = false;
	$bdd = connexion();

	if(!isset($mail)){
		$mail = null;
	}

    $req = $bdd->prepare('SELECT * from users where Email = ? or Login = ?');
    $req->execute(array($mail, $login));

    if($req->fetch()) {
		$ret = true;//exist
	}

	$req->closeCursor();
    return $ret;
}

#creater the current user object when login
function createLogUser($login){
	$bdd = connexion();
	$req = $bdd->prepare('SELECT * from users where Login = ?');
	$req->execute(array($login));

	if($res = $req->fetch()) {
		$currUser = User::withID($res["Login"], $res["Pass"], $res["name"], $res["Email"], $res["id"]);
	}

	$req->closeCursor();

	return $currUser;
}

#update user ifno in DB
function updateUser($attr, $value, $userID){
	$bdd = connexion();

	switch($attr){
		case 'name':
			$req = $bdd->prepare('UPDATE users SET name = ? where id = ?');
			$req->execute(array($value, $userID));
			break;
		case 'mail':
			$req = $bdd->prepare('UPDATE users SET Email = ? where id = ?');
			$req->execute(array($value, $userID));
			break;
		case 'pass':
			$req = $bdd->prepare('UPDATE users SET Pass = ? where id = ?');
			$req->execute(array($value, $userID));
			break;
		default:
			break;
	}
	
}

?>