<?php


class User
{

    session_start();
    include("config.php");
    
    $db = connect();


  private $_id_user;
  private $_first_name;
  private $_last_name;
  private $_age;
          
  public function valider()
  {


		$req = $db->prepare('INSERT INTO visiteur(last_name, first_name, old) 
								VALUES(:last_name, :first_name, :old)');
			$req->execute(array(
	    'last_name' => $last,
	    'first_name' => $first_name,
	    'old' => $old
	        )); 

  }
}
