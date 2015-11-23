<?php

#User class
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

	#contructor + know id
	public static function withID($login, $pass, $nom, $mail, $id) {
    	$instance = new self($login, $pass, $nom, $mail);
    	$instance->id = $id;
    	return $instance;
    }


    #add new user in DB
	public function user_insertBDD() {
		try
		{
	  		insertUser($this);
		}
		catch(Exception $e)
		{
			echo"Erreur à l'insertion de l'utilisateur.";
		}
	}

	#delete user in DB
	public function user_supprUserBDD() {
		try
		{
	  		deleteUser($this);
		}
		catch(Exception $e)
		{
			echo"Erreur à la supression de l'utilisateur.";
		}
	}

	#chang infos user (check + DB)
	public function user_checkModifs($name, $mail, $pass){
		$msg = "";
		#chang name
		if (isset($name) && $name != ""){
			if($name != $this->name){
				$msg = $msg."Nom changé.";
				$this->user_updateBDD('name', $name);
			}
			else{
				$msg =$msg."Nom équivalent à celui existante.";
			}
		}
		#chang mail
		if (isset($mail) && $mail != ""){
			if($mail != $this->mail){
				$msg = $msg." Mail changé.";
				$this->user_updateBDD('mail', $mail);
			}
			else{
				$msg =$msg." Mail équivalent à celui existante.";
			}
		}

		#chang password
		if (isset($pass) && $pass != ""){
			$passSha = sha1($pass);
			if($passSha != $this->password){
				if (preg_match('#(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}#', $pass)) {
					$this->user_updateBDD('pass', $passSha);
					$msg = $msg." Mot de passe changé.";
				}
				else{
					$msg =$msg." Mot de passe ne respectant pas les conditions indqués.";
				}
			}
			else{
				$msg =$msg." Mot de passe équivalent à celui existante.";
			}
		}
		return $msg;
	}

	#chang info in DB
	public function user_updateBDD($attr, $val){
		updateUser($attr, $val, $this->id);
	}


}




?>