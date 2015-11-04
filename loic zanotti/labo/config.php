<?php
/**
 * Created by PhpStorm.
 * User: ZANOTTILoic
 * Date: 04/11/2015
 * Time: 12:22
 */
function connect()
{
    try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=exercice_php;charset=utf8','root','');

    } catch(Exception $e){
        die('Erreur :'.$e->getMessage());
    }
    return $pdo;
}
