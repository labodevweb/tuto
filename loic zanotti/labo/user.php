<?php

/**
 * Created by PhpStorm.
 * User: ZANOTTILoic
 * Date: 04/11/2015
 * Time: 12:06
 */
class user
{
    private $lastName;
    private $firstName;
    private $age;
    private $id;

    public function __construct($lastName, $firstName, $age, $id)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->age = $age;
        $this->id = $id;
    }
    public function register() {
        global $pdo;
        $req = $pdo->prepare("INSERT INTO users(user_id,lastname,firstname,age) VALUES (:user_id,:lastname,:firstname,:age)");
        $req->execute(array(
            ':user_id'=>$this->id,
            ':lastname'=>$this->lastName,
            ':firstname'=>$this->firstName,
            ':age'=>$this->age,
        ));
    }

}
//$user = new user();
//require ("config.php");