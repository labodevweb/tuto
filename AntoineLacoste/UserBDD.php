<?php

/**
 * Created by PhpStorm.
 * User: Pandaks
 * Date: 04/11/2015
 * Time: 11:51
 */
class UserBDD
{
    public $firstName;
    public $lastName;
    public $age;

    function createUser(){
        $bdd = connect();
        $query=$bdd->prepare("INSERT INTO user(firstName, lastName, age) values(?,?,?)");
        $query->execute(array($this->firstName,$this->lastName,$this->age));
    }

    function deleteUser(){
        $bdd = connect();
        $query = $bdd->prepare("DELETE FROM user where firstName=? AND lastName=? AND age=?");
        $query->execute(array($this->firstName,$this->lastName,$this->age));
    }

    function updateUser( $firstNameNew,$lastNameNew,$ageNew){
        $bdd = connect();
        $query = $bdd->prepare("UPDATE user set firstName=?, lastName=?, age=? where firstName=? AND lastName=? AND age=?");
        $query->execute(array($firstNameNew,$lastNameNew,$ageNew,$this->firstName, $this->lastName, $this->age));
        $this->firstName=$firstNameNew;
        $this->lastName=$lastNameNew;
        $this->age=$ageNew;
    }

    function getUser()
    {
        $bdd = connect();
        $query = $bdd->prepare("SELECT * FROM user where firstName=? AND lastName=? AND age=?");
        $query->execute(array($this->firstName,$this->lastName,$this->age));
        $result=$query->fetchAll();
        print_r($result);
    }
}