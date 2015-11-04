
<?php
	include_once("config.php");
    @session_start();
    ?>
	
	
	<?php	
				
	
			//Les champs sont bien rempli :
                if((isset($_POST['first_name'])) and(isset($_POST['last_name'])) and(isset($_POST['age'])) )
                {
					
            //Récupération des variables:
			
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $age = $_POST['age'];
               
				
				
				$db = connect();
                
            //Préparation et éxecution de la requète d'insertion :
                $req = $db->prepare('INSERT INTO users( first_name, last_name, age) 
				VALUES( :first_name , :last_name , :age )');
				$req->execute(array(
				
                ':first_name' => $_POST['first_name'],
                ':last_name' => $_POST['last_name'],
                ':age' => $_POST['age']
                ));
				
                echo 'Vous &ecirc;tes inscrit';
                }
                else{
            //Affichage du formulaire :
              echo'
            
		
				<form method="post" action="index.php">
				
								<label for="first_name">prenom* :</label><br/>
								<input type="text" name="first_name" required><br/><br/>
							
								<label for="last_name">nom* :</label><br/>
								<input type="text" name="last_name" required><br/><br/>
			
								<label for="age">age* :</label><br/>
								<input type="date" name="age" required><br/><br/>
			
							
								<input type="submit" id="button" value="Valider" >
					
				</form>';
						
						}
						
    ?>
