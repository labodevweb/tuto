<?php

class User {

	public $login;
	public $mail;
	public $name;
	public $password;

	public function __construct ($login, $pass, $nom, $mail){
		$this->login = $login;
		$this->password = $pass;
		$this->name = $nom;
		$this->mail = $mail;
	}

	function checkUser(){
		$ret = false;
		$bdd = connexion();

	    $req = $bdd->prepare('SELECT * from users where Email = ? or Login = ?');
	    $req->execute(array($this->mail, $this->login));

	    if($req->fetch()) {
			$ret = true;
		}

		$req->closeCursor();
	    return $ret;
	}

	function insertUser(){
		$bdd = connexion();

		$req = $bdd->prepare("insert into users (Login, Pass, name, Email) values (?, ?, ?, ?)");
		$req->execute(array($this->login, $this->password, $this->name, $this->mail));
		$req->closeCursor();
	}










}




?>