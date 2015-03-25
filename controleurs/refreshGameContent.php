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
	
	
	if($id_Quest==1 && $nb_personnage==5){
		if ( isset( $_POST['next_quest'] ) ) { 
			updateQuestNbPersonnage(1, $id_personnage, $bdd);
			echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
		}
	}
	
	
	//RECUPERER DES CAPOTES
	elseif($id_Quest==1 && $nb_personnage!=5){
		if ( isset( $_POST['btn_punchline'] ) ||  isset( $_POST['btn_tacos'] ) ) { 
			if($EnnemiLife > 0){
			
				$energie=$energie-5;
				updateSanteEnergie($energie, $id_personnage, $bdd);
				
				$EnnemiLife-=10;
				updateEnnemiLife($EnnemiLife, $id_personnage, $bdd);
			}	
		}
		if ( isset( $_POST['btn_rin'] ) || isset( $_POST['btn_clin_d_oeil'] ) ) { 
			if($EnnemiLife > 0 && $vitalite > 0){
				$vitalite=$vitalite-10;
				updateSanteVitalite($vitalite, $id_personnage, $bdd);
			}
		}
		if($EnnemiLife==0){
			updateHaremPreservatif(10, $id_personnage, $bdd);	
		}
		if ( isset( $_POST['next_quest'] ) ) { 
			$id_Quest+=1;
			updateQuestRelation($id_Quest, $id_personnage, $bdd);
			updateQuestState(100, $id_personnage, $bdd);
			updateSanteVitalite(100, $id_personnage, $bdd);
			updateSanteEnergie(100, $id_personnage, $bdd);	
			echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
		}
		if ( isset( $_POST['redo_quest'] ) ) { 
			updateSanteEnergie(100, $id_personnage, $bdd);
			updateSanteVitalite(100, $id_personnage, $bdd);
			updateEnnemiLife(100, $id_personnage, $bdd);	
			echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
		}
	}
	
	//CHOPER MELINA
	elseif($id_Quest==2){
		if ( isset( $_POST['btn_rin'] ) || isset( $_POST['btn_clin_d_oeil'] ) ) { 
			if($EnnemiLife > 0 && $vitalite > 0){
				$energie=$energie-5;
				updateSanteEnergie($energie, $id_personnage, $bdd);
				
				$EnnemiLife-=10;
				updateEnnemiLife($EnnemiLife, $id_personnage, $bdd);
			}
		}
		if ( isset( $_POST['btn_punchline'] ) ||  isset( $_POST['btn_tacos'] ) ) { 
			if($EnnemiLife > 0 && $vitalite > 0){
				$vitalite=$vitalite-10;
				updateSanteVitalite($vitalite, $id_personnage, $bdd);
			}
		}
		if($EnnemiLife==0){
			updateHaremPreservatif(9, $id_personnage, $bdd);
			updateHaremFemmes(1, $id_personnage, $bdd);
			updateRandPerso("Initié", $id_personnage, $bdd);
		}
		if ( isset( $_POST['next_quest'] ) ) { 
			$id_Quest+=1;
			updateQuestRelation($id_Quest, $id_personnage, $bdd);
			updateQuestState(100, $id_personnage, $bdd);
			updateSanteEnergie(100, $id_personnage, $bdd);
			updateSanteVitalite(100, $id_personnage, $bdd);	
			echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
		}
		if ( isset( $_POST['redo_quest'] ) ) { 
			updateSanteEnergie(100, $id_personnage, $bdd);
			updateSanteVitalite(100, $id_personnage, $bdd);
			updateEnnemiLife(100, $id_personnage, $bdd);	
			echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
		}
	}
	
	//VAINCRE LE PROF D'ANGLAIS
	elseif($id_Quest==3){
		if ( isset( $_POST['btn_punchline'] ) ||  isset( $_POST['btn_tacos'] ) ) { 
			if($EnnemiLife > 0 && $vitalite > 0){
				$energie=$energie-5;
				updateSanteEnergie($energie, $id_personnage, $bdd);
				
				$EnnemiLife-=10;
				updateEnnemiLife($EnnemiLife, $id_personnage, $bdd);
				
			}
		}
		if ( isset( $_POST['btn_rin'] ) || isset( $_POST['btn_clin_d_oeil'] ) ) { 
			if($EnnemiLife > 0 && $vitalite > 0){
				$vitalite=$vitalite-10;
				updateSanteVitalite($vitalite, $id_personnage, $bdd);
			}
		}
		if($EnnemiLife==0){
			updateEtudesMoyenne(14, $id_personnage, $bdd);
			updateEtudesNeuronne(200, $id_personnage, $bdd);
		}
		if ( isset( $_POST['next_quest'] ) ) { 
			$id_Quest+=1;
			updateQuestRelation($id_Quest, $id_personnage, $bdd);
			updateQuestState(100, $id_personnage, $bdd);	
			updateSanteEnergie(100, $id_personnage, $bdd);
			updateSanteVitalite(100, $id_personnage, $bdd);
			updateQuestNbPersonnage(2, $id_personnage, $bdd);
			echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
		}
		if ( isset( $_POST['redo_quest'] ) ) { 
			updateSanteEnergie(100, $id_personnage, $bdd);
			updateSanteVitalite(100, $id_personnage, $bdd);
			updateEnnemiLife(100, $id_personnage, $bdd);	
			echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
		}
	}
	
	//CHOPPER LA PREMIERE VENUE
	elseif($id_Quest==4){
		if($nb_personnage==2){
			if ( isset( $_POST['btn_rin'] ) || isset( $_POST['btn_clin_d_oeil'] ) ) { 
				if($EnnemiLife > 0 && $vitalite > 0){
					$energie=$energie-5;
					updateSanteEnergie($energie, $id_personnage, $bdd);
					
					$EnnemiLife-=10;
					updateEnnemiLife($EnnemiLife, $id_personnage, $bdd);
					
				}
			}
			if ( isset( $_POST['btn_punchline'] ) ||  isset( $_POST['btn_tacos'] ) ) { 
				if($EnnemiLife > 0 && $vitalite > 0){
					$vitalite=$vitalite-10;
					updateSanteVitalite($vitalite, $id_personnage, $bdd);
				}
			}
			if($EnnemiLife==0){
				updateHaremFemmes(2, $id_personnage, $bdd);
				updateHaremPreservatif(8, $id_personnage, $bdd);
			}
			if ( isset( $_POST['next_quest'] ) ) { 
				updateQuestNbPersonnage(1, $id_personnage, $bdd);
				updateQuestState(100, $id_personnage, $bdd);	
				updateSanteEnergie(100, $id_personnage, $bdd);
				updateSanteVitalite(100, $id_personnage, $bdd);
				echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
			}
			if ( isset( $_POST['redo_quest'] ) ) { 
				updateSanteEnergie(100, $id_personnage, $bdd);
				updateSanteVitalite(100, $id_personnage, $bdd);
				updateEnnemiLife(100, $id_personnage, $bdd);	
				echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
			}
		}
		elseif($nb_personnage==1){
			if ( isset( $_POST['btn_punchline'] ) ||  isset( $_POST['btn_tacos'] ) ) { 
				if($EnnemiLife > 0 && $vitalite > 0){
					$energie=$energie-5;
					updateSanteEnergie($energie, $id_personnage, $bdd);
					
					$EnnemiLife-=10;
					updateEnnemiLife($EnnemiLife, $id_personnage, $bdd);
					
				}
			}
			if ( isset( $_POST['btn_rin'] ) || isset( $_POST['btn_clin_d_oeil'] ) ) { 
				if($EnnemiLife > 0 && $vitalite > 0){
					$vitalite=$vitalite-10;
					updateSanteVitalite($vitalite, $id_personnage, $bdd);
				}
			}
			if($EnnemiLife==0){
				updateEtudesMoyenne(18, $id_personnage, $bdd);
				updateEtudesNeuronne(300, $id_personnage, $bdd);
				updateRandPerso("Choppeur", $id_personnage, $bdd);
			}
			if ( isset( $_POST['next_quest'] ) ) { 
				$id_Quest+=1;
				updateQuestRelation($id_Quest, $id_personnage, $bdd);
				updateQuestState(100, $id_personnage, $bdd);	
				updateSanteEnergie(100, $id_personnage, $bdd);
				updateSanteVitalite(100, $id_personnage, $bdd);
				echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
			}
			if ( isset( $_POST['redo_quest'] ) ) { 
				updateSanteEnergie(100, $id_personnage, $bdd);
				updateSanteVitalite(100, $id_personnage, $bdd);
				updateEnnemiLife(100, $id_personnage, $bdd);	
				echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
			}
		}
		
	}
	
	//RÉGIME THONON
	elseif($id_Quest==5){
		if ( isset( $_POST['btn_tacos'] ) ) { 
			if($EnnemiLife > 0 && $vitalite > 0){
				$energie=$energie-5;
				updateSanteEnergie($energie, $id_personnage, $bdd);
				
				$EnnemiLife-=10;
				updateEnnemiLife($EnnemiLife, $id_personnage, $bdd);
				
			}
		}
		if ( isset( $_POST['btn_rin'] ) || isset( $_POST['btn_clin_d_oeil'] ) || isset( $_POST['btn_punchline'] ) ) { 
			if($EnnemiLife > 0 && $vitalite > 0){
				$vitalite=$vitalite-10;
				updateSanteVitalite($vitalite, $id_personnage, $bdd);
			}
		}
		if($EnnemiLife==0){
			updateSantePoids(90, $id_personnage, $bdd);
		}
		if ( isset( $_POST['next_quest'] ) ) { 
			$id_Quest+=1;
			updateQuestRelation($id_Quest, $id_personnage, $bdd);
			updateQuestState(100, $id_personnage, $bdd);	
			updateSanteEnergie(100, $id_personnage, $bdd);
			updateSanteVitalite(100, $id_personnage, $bdd);
			echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
		}
		if ( isset( $_POST['redo_quest'] ) ) { 
			updateSanteEnergie(100, $id_personnage, $bdd);
			updateSanteVitalite(100, $id_personnage, $bdd);
			updateEnnemiLife(100, $id_personnage, $bdd);	
			echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
		}
	}
	
	//VRAINCRE GUILHEM
	elseif($id_Quest==6){
		if ( isset( $_POST['btn_punchline'] ) ||  isset( $_POST['btn_tacos'] ) ) { 
			if($EnnemiLife > 0 && $vitalite > 0){
				$energie=$energie-5;
				updateSanteEnergie($energie, $id_personnage, $bdd);
				
				$EnnemiLife-=10;
				updateEnnemiLife($EnnemiLife, $id_personnage, $bdd);
				
			}
		}
		if ( isset( $_POST['btn_rin'] ) || isset( $_POST['btn_clin_d_oeil'] ) ) { 
			if($EnnemiLife > 0 && $vitalite > 0){
				$vitalite=$vitalite-10;
				updateSanteVitalite($vitalite, $id_personnage, $bdd);
			}
		}
		if($EnnemiLife==0){
			updateSantePoids(80, $id_personnage, $bdd);
			updateEtudesNeuronne(150, $id_personnage, $bdd);
		}
		if ( isset( $_POST['next_quest'] ) ) { 
			$id_Quest+=1;
			updateQuestRelation($id_Quest, $id_personnage, $bdd);
			updateQuestState(100, $id_personnage, $bdd);	
			updateSanteEnergie(100, $id_personnage, $bdd);
			updateSanteVitalite(100, $id_personnage, $bdd);
			updateQuestNbPersonnage(2, $id_personnage, $bdd);
			echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
		}
		if ( isset( $_POST['redo_quest'] ) ) { 
			updateSanteEnergie(100, $id_personnage, $bdd);
			updateSanteVitalite(100, $id_personnage, $bdd);
			updateEnnemiLife(100, $id_personnage, $bdd);	
			echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
		}
	}
	
	elseif($id_Quest==7){
		if($nb_personnage==2){
			if ( isset( $_POST['btn_clin_d_oeil'] ) ) { 
				if($EnnemiLife > 0 && $vitalite > 0){
					$energie=$energie-5;
					updateSanteEnergie($energie, $id_personnage, $bdd);
					
					$EnnemiLife-=10;
					updateEnnemiLife($EnnemiLife, $id_personnage, $bdd);
					
				}
			}
			if ( isset( $_POST['btn_rin'] ) || isset( $_POST['btn_punchline'] ) ||  isset( $_POST['btn_tacos'] ) ) { 
				if($EnnemiLife > 0 && $vitalite > 0){
					$vitalite=$vitalite-10;
					updateSanteVitalite($vitalite, $id_personnage, $bdd);
				}
			}
			if($EnnemiLife==0){
				updateRandPerso("Playboy", $id_personnage, $bdd);
			}
			if ( isset( $_POST['next_quest'] ) ) { 
				updateQuestNbPersonnage(1, $id_personnage, $bdd);
				updateQuestState(100, $id_personnage, $bdd);	
				updateSanteEnergie(100, $id_personnage, $bdd);
				updateSanteVitalite(100, $id_personnage, $bdd);
				echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
			}
			if ( isset( $_POST['redo_quest'] ) ) { 
				updateSanteEnergie(100, $id_personnage, $bdd);
				updateSanteVitalite(100, $id_personnage, $bdd);
				updateEnnemiLife(100, $id_personnage, $bdd);	
				echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
			}
		}
		elseif($nb_personnage==1){
			if ( isset( $_POST['btn_rin'] ) ) { 
				if($EnnemiLife > 0 && $vitalite > 0){
					$energie=$energie-5;
					updateSanteEnergie($energie, $id_personnage, $bdd);
					
					$EnnemiLife-=10;
					updateEnnemiLife($EnnemiLife, $id_personnage, $bdd);
					
				}
			}
			if ( isset( $_POST['btn_punchline'] ) ||  isset( $_POST['btn_tacos'] ) || isset( $_POST['btn_clin_d_oeil'] ) ) { 
				if($EnnemiLife > 0 && $vitalite > 0){
					$vitalite=$vitalite-10;
					updateSanteVitalite($vitalite, $id_personnage, $bdd);
				}
			}
			if($EnnemiLife==0){
				updateQuestNbPersonnage(3, $id_personnage, $bdd);
				updateHaremFemmes(3, $id_personnage, $bdd);
				updateHaremPreservatif(7, $id_personnage, $bdd);
				updateRandPerso("King", $id_personnage, $bdd);
				echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
			}
			if ( isset( $_POST['access_harem'] ) ) { 
				updateQuestState(100, $id_personnage, $bdd);	
				updateQuestNbPersonnage(4, $id_personnage, $bdd);
				updateSanteEnergie(100, $id_personnage, $bdd);
				updateSanteVitalite(100, $id_personnage, $bdd);
				echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
			}
			if ( isset( $_POST['redo_quest'] ) ) { 
				updateQuestNbPersonnage(2, $id_personnage, $bdd);
				updateSanteEnergie(100, $id_personnage, $bdd);
				updateSanteVitalite(100, $id_personnage, $bdd);
				updateEnnemiLife(100, $id_personnage, $bdd);	
				echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
			}
		}
	}

//On inclut la vue
include(dirname(__FILE__).'/../vues/refreshGameContent.php');

?>