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
	$id_ennemi = htmlspecialchars($_GET["id"]);
	
	$ennemi_life = getLifeHaremEnnemi($id_personnage, $id_ennemi, $bdd);
	$ennemi_poids = getPoidsHaremEnnemi($id_personnage, $id_ennemi, $bdd);
	$ennemi_humeur = getHumeurHaremEnnemi($id_personnage, $id_ennemi, $bdd);

	
?>


<?	
	
	$energie = getEnergie($id_personnage, $bdd);
	$vitalite = getVitalite($id_personnage, $bdd);
	$moyenne = getMoyenne($id_personnage, $bdd);
	$nb_personnage = getQuestNbPersonnage($id_personnage, $bdd);
	$nbPoints = getNbPoints($id_personnage, $bdd);
	
	$nb_preservatif=getNbPreservatif($id_personnage, $bdd);
	$nb_femme=getNbFemme($id_personnage, $bdd);
	$poids=getPoids($id_personnage, $bdd);
	$energie=getEnergie($id_personnage, $bdd);
	$vitalite=getVitalite($id_personnage, $bdd);
	$rang=getRang($id_personnage, $bdd);
	$nb_neuronnes=getNbNeuronne($id_personnage, $bdd);
	$moyenne=getMoyenne($id_personnage, $bdd);
	
	if ( isset( $_POST['btn_caresse'] ) ) { 
		if($ennemi_life >= 0 && $ennemi_life <100){
		
			$nbPoints+=5;
			updateNbPoints($nbPoints, $id_personnage, $bdd);
				
			$ennemi_life+=5;
			updateLifeHaremEnnemi($ennemi_life, $id_personnage, $id_ennemi, $bdd);
			
			$ennemi_humeur="Excitée";
			updateHumeurHaremEnnemi($ennemi_humeur, $id_personnage, $id_ennemi, $bdd);
		}	
	}
	
	if ( isset( $_POST['btn_fouet'] ) ) { 
		if($ennemi_life > 0 && $ennemi_life <=100){
		
			$nbPoints-=5;
			updateNbPoints($nbPoints, $id_personnage, $bdd);
				
			$ennemi_life-=5;
			updateLifeHaremEnnemi($ennemi_life, $id_personnage, $id_ennemi, $bdd);
			
			$ennemi_poids-=1;
			updatePoidsHaremEnnemi($ennemi_poids, $id_personnage, $id_ennemi, $bdd);
			
			$ennemi_humeur="Apeurée";
			updateHumeurHaremEnnemi($ennemi_humeur, $id_personnage, $id_ennemi, $bdd);
		}	
	}
	
	if ( isset( $_POST['btn_food'] ) ) { 
		if($ennemi_life >= 0 && $ennemi_life <100){
		
			$nbPoints+=5;
			updateNbPoints($nbPoints, $id_personnage, $bdd);
				
			$ennemi_life+=5;
			updateLifeHaremEnnemi($ennemi_life, $id_personnage, $id_ennemi, $bdd);
			
			$ennemi_poids+=2;
			updatePoidsHaremEnnemi($ennemi_poids, $id_personnage, $id_ennemi, $bdd);
			
			$ennemi_humeur="Contente";
			updateHumeurHaremEnnemi($ennemi_humeur, $id_personnage, $id_ennemi, $bdd);
		}	
	}
	
	if ( isset( $_POST['btn_blague'] ) ) { 
		if($ennemi_life > 0 && $ennemi_life <=100){
		
			$nbPoints-=5;
			updateNbPoints($nbPoints, $id_personnage, $bdd);
				
			$ennemi_life-=5;
			updateLifeHaremEnnemi($ennemi_life, $id_personnage, $id_ennemi, $bdd);
			
			$ennemi_humeur="Contente";
			updateHumeurHaremEnnemi($ennemi_humeur, $id_personnage, $id_ennemi, $bdd);
			
		}	
	}
	

//On inclut la vue
include(dirname(__FILE__).'/../vues/barre_connexion.php');
include(dirname(__FILE__).'/../vues/page_harem.php');
include(dirname(__FILE__).'/../vues/footer.php');

?>