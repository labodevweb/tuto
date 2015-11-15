<?php

class User
{
    public $userId;
    public $firstName;
    public $lastName;
    public $login;
    public $password;
    public $age;

    public function __construct($userId,$firstName,$lastName,$age, $login,$password)
    {
        $this->userId=$userId;
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->age=$age;
        $this->login=$login;
        $this->password=$password;
    }

    public function getFields(){
        return array($this->userId,$this->firstName,$this->lastName,$this->age,$this->login,$this->password);
    }

    public function getFieldsInsert(){
        return array($this->firstName,$this->lastName,$this->age,$this->login,$this->password);
    }

    public function toTr()
    {
        return "<tr><td>".$this->userId."</td><td>".$this->firstName."</td><td>".$this->lastName."</td><td>".$this->age."</td><td>".$this->login."</td></tr>";
    }

    public function getId(){
        return $this->userId;
    }
}