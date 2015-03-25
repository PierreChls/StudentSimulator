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
	
	// Variables pour la connexion
	$server = 'localhost';
	$user = 'root';
	$password = 'root';
	$dataBase = 'Student_Simulator';
	$bdd = connect_to_mysql($server, $user, $password, $dataBase);
	
?>


<?	
	$id_Quest = getIdQuest($id_personnage, $bdd);
	$Quest_Description = getQuestDescription($id_Quest, $bdd);
	$Quest_Mission = getQuestMission($id_Quest, $bdd);
	$recompense = getRecompense($id_Quest, $bdd);
	
	$id_ennemi = getEnnemiId($id_Quest, $bdd);
	$EnnemiType = getEnnemiType($id_ennemi, $bdd);
	$EnnemiLife = getEnnemiLife($id_personnage, $bdd);
	
	$energie = getEnergie($id_personnage, $bdd);
	$vitalite = getVitalite($id_personnage, $bdd);
	$moyenne = getMoyenne($id_personnage, $bdd);
	$nb_personnage = getQuestNbPersonnage($id_personnage, $bdd);
	
	if(($id_Quest == 4 && $nb_personnage == 1) || ($id_Quest == 7 && $nb_personnage == 1)){
		$id_ennemi++;
		$EnnemiType = getEnnemiType($id_ennemi, $bdd);
		$EnnemiLife = getEnnemiLife($id_personnage, $bdd);
	}
	
	$classement = getClassement($bdd);

//On inclut la vue
include(dirname(__FILE__).'/../vues/refreshGameClassement.php');

?>