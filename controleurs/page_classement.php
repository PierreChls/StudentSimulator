<?php
/* C'est en tout début de fichier que l'on vérifie les autorisations. Les 
news sont visibles par tous, mais si vous voulez en restreindre l'accès, c'est 
ici que cela se passe. */
 
//On inclut le modèle
include(dirname(__FILE__).'/../modeles/library_fonction.php');
 
/* On effectue ici diverses actions, comme supprimer des news, par exemple. ;)
Il n'y en aura aucune dans ce tutoriel pour rester simple, mais libre à vous d'en rajouter. */
 
//On récupère tout ici
	
	$id_personnage = $_SESSION['id_personnage'];
	$classement = 0;
	
	$nb_preservatif=getNbPreservatif($id_personnage, $bdd);
	$nb_femme=getNbFemme($id_personnage, $bdd);
	$poids=getPoids($id_personnage, $bdd);
	$energie=getEnergie($id_personnage, $bdd);
	$vitalite=getVitalite($id_personnage, $bdd);
	$rang=getRang($id_personnage, $bdd);
	$nb_neuronnes=getNbNeuronne($id_personnage, $bdd);
	$moyenne=getMoyenne($id_personnage, $bdd);
	
?>

<?php
	
	if ( isset( $_POST['submit_search'] ) ) { 
		
		if(empty($_POST['name'])){
			echo '<body onLoad="alert(\'Veuillez rentrer un prénom, un nom ou un login.\')">';
		}
		else{
			$search = $_POST['name'];
			if((strlen($search) > 15)){
				echo '<body onLoad="alert(\'Le champ ne doit pas dépasser 15 caractères.\')">';
			}
			else{
				$classement = getClassementPerson($search, $bdd);
			}
		}
	}
	

//On inclut la vue
include(dirname(__FILE__).'/../vues/barre_connexion.php');
include(dirname(__FILE__).'/../vues/page_classement.php');
include(dirname(__FILE__).'/../vues/footer.php');

?>