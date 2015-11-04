<?php
/**
 * Created by PhpStorm.
 * User: champolion
 * Date: 04/11/2015
 * Time: 12:17
 */

namespace user;


class user
{
    private $id
    private $lastName;
    private $firstName;
    private $age;

    public function __construct()
    {
        include("config.php");
        $db = connect();

        $req = $db->prepare('INSERT INTO users(lastName, firstName, age) VALUES( :lastName , :firstName , :age)');
        $req->execute(array
        (
            'lastName' => $_POST['lastName'],
            'firstName' => $_POST['firstName'],
            'age' => $_POST['age'],
        ));
    }




}