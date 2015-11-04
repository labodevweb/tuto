<?php 

if(isset($_POST['send'])){

//print_r($_POST); die;

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];

$sql = $bdd->prepare('INSERT INTO user(lastname, firstname, age) 
	VALUES(:nom, :prenom, :age)');
		$sql->execute(array(
		
			'nom' => $nom,
			'prenom' => $prenom,
			'age' => $age

			));


		echo 'Bienvenue '.$prenom. ' '.$nom.'.';
} 

?>