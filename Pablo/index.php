<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location:connexion.php');
  exit();
}
?>
<li><a href="deconnexion.php">déconnexion</a></li>

<script>

function colourize()
{
var dnl = document.getElementsByTagName("tr");
for(i = 0; i < dnl.length; i++)
{
if((Math.round(i / 2) * 2) == ((i / 2) * 2) )
dnl.item(i).style.background="#E8E8FF";
}
}
window.onload = colourize;
</script>
<link rel="stylesheet" href="style-table.css" />
<caption></caption>

<center><table>
<tr>
		
			<td>Civilité</td>

			<td>Nom</td>
			<td>Prénom</td>
			<td>Date de naissance</td>
			<td>Email</td>
			<td >Club</td>
			<td>Nouriture ou boisson</td>
			<td>Nombre d'accompagnateur</td>
			<td>Suppression</td>

</tr>

</div>
<?php

include('config.php');  //connexion BDD

$reponse = $bdd->query('SELECT * FROM utilisateurs ORDER BY id desc'); 
while ($donnees = $reponse->fetch()) { //on l'exucte dans une boucle
?>
<tr>
			<td><?php echo $donnees['civilite'] ?></td>
			<td><?php echo $donnees['nom'] ?></td>
			<td><?php echo $donnees['prenom']; ?></td>
			<td><?php echo $donnees['date_de_naissance']; ?></td>
			<td><?php echo $donnees['email'];?></td>
			<td><?php echo $donnees['club'];?></td>
			<td><?php echo $donnees['nourriture'];?></td>
			<td><?php echo $donnees['accompagne'];?></td>
	
			<td><a class="button" href="index.php?page=index&action=supprimer&id=<?php echo $donnees['id']?>"><span class="delete" >Supprimer</span></a></td>




<?php
}
?>
</tr>
</table>
</center>



    








<?php 

	if(isset($_GET['action']) && $_GET['action'] = "supprimer"): 
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$sql = "DELETE FROM utilisateurs WHERE id = :id";
			$query = $bdd->prepare($sql);
			$query->bindparam('id',$_GET['id']);
			$query->execute();
		}
	endif 

?>
