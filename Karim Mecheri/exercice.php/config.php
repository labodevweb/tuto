<?php
 function connect()
 {
     try
     {$db = new PDO ('mysql:host=localhost;dbname=exercice_php;charset=utf8, 'root','');

}
catch (Exception $e)
{
    die ('ERREUR / ' . $e->getMessage());
}
return $db;
})
        ?>