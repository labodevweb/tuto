<?php

function connectBDD(){
    $host='localhost';
    $user='root';
    $password='';
    $basename='test';

    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host='.$host.';dbname='.$basename, $user, $password);
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        //die('Erreur : '.$e->getMessage());
        echo"Erreur de connexion à la base de données en ligne.";
    }

    return $bdd;
}

function connectUser(){

}
