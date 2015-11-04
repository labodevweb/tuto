<?php

class User {

	public $id;
	public $login;
	public $mail;
	public $name;
	public $password;

	/*constructor*/
	public function __construct ($login, $pass, $nom, $mail){
		$this->login = $login;
		$this->password = $pass;
		$this->name = $nom;
		$this->mail = $mail;
	}

	/*insert user BDD*/
	function insertUser(){
		$bdd = connexion();

		$req = $bdd->prepare("insert into users (Login, Pass, name, Email) values (?, ?, ?, ?)");
		$req->execute(array($this->login, $this->password, $this->name, $this->mail));

		$this->id = $bdd->lastInsertId();

		$req->closeCursor();
		//done !
	}


	function deleteUser(){
		$bdd = connexion();

		$req = $bdd->prepare("DELETE FROM users WHERE id = ?");
		$req->execute(array($this->id));
		$req->closeCursor();

	}


	




}




?>