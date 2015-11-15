<?php

class UserBDD
{
    //Créer l'utilisateur
    function createUser($user){
        $bdd = connectBDD();
        $query=$bdd->prepare("INSERT INTO user(firstname, lastname, age, login, password) values(?,?,?,?,?)");
        $query->execute($user->getFieldsInsert());
        $user->userId=$bdd->lastInsertId();
    }

    //Supprimer l'utilisateur
    function deleteUser($userId){
        $bdd = connectBDD();
        $query = $bdd->prepare("DELETE FROM user where id=?");
        $query->execute(array($userId));
    }

    //Modifie l'utilisateur
    function updateUser($user, $firstNameNew,$lastNameNew,$ageNew, $loginNew, $passwordNew){
        $bdd = connectBDD();
        $query = $bdd->prepare("UPDATE user set firstname=?, lastname=?, age=?, login=?, password=? where id=?");
        $query->execute(array($firstNameNew,$lastNameNew,$ageNew, $loginNew, $passwordNew,$user->getId()));
        //On met à jour le user en local
        $user->firstName=$firstNameNew;
        $user->lastName=$lastNameNew;
        $user->age=$ageNew;
        $user->login=$loginNew;
        $user->password=$passwordNew;
    }

    function getUsers()
    {
        $bdd = connectBDD();
        $query = $bdd->prepare("SELECT * FROM user");
        $query->execute();
        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row)
            $res[] = new User($row['id'], $row['firstname'], $row['lastname'], $row['age'],$row['login'],$row['password']);
        return $res;
    }

    public function getOneById($id){
        $bdd = connectBDD();
        $query = $bdd->prepare("SELECT * FROM user where id=?");
        $query->execute(array($id));
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $user = new User($row['id'], $row['firstname'], $row['lastname'], $row['age'],$row['login'],$row['password']);
        return $user;
    }

    public function checkConnection($login,$password){
        $bdd = connectBDD();
        $query = $bdd->prepare("SELECT * FROM user where login=? AND password=?");
        $query->execute(array($login,$password));
        $res = $query->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
}