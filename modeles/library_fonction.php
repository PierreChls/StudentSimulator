<?php

//////////////////////////////////////////////
//////////////// FUNCTION BDD ////////////////
//////////////////////////////////////////////



//////////////////////////////////////////////
/////////// FUNCTION CREATE USER /////////////
//////////////////////////////////////////////


function inscription($login, $mdp, $rang, $lastname, $name, $nbFemmes, $nbPreservatif, $neuronnes, $moyenne, $energie, $poids, $vitalite, $attaque1, $attaque2, $attaque3, $attaque4, $bdd){
	try{
		if(newUser($login, $mdp, $name, $lastname, $bdd)==1){
			$id_user=getUserId($login, $mdp, $bdd);
			newPersonnage($id_user, $rang, $bdd);	
			$id_personnage=getPersonnageId($id_user, $bdd);
			newHarem($id_user, $id_personnage, $nbFemmes, $nbPreservatif, $bdd);
			newEtudes($id_user, $id_personnage, $neuronnes, $moyenne, $bdd);
			newSante($id_user, $id_personnage, $energie, $poids, $vitalite, $bdd);
			newAttaques($id_personnage, $attaque1, $bdd);
			newAttaques($id_personnage, $attaque2, $bdd);
			newAttaques($id_personnage, $attaque3, $bdd);
			newAttaques($id_personnage, $attaque4, $bdd);
			newQuestRelation($id_personnage, 1, $bdd);
			add_tamagotchi($id_personnage, $bdd);
			mysqli_commit($bdd);
			return 1;
		}
		else{
			return 0;
		}
		
	}
	catch(mysqli_sql_exception $e){
		mysqli_rollback($bdd);
		throw $e;
	}
	
}


// Création de User
function newUser($login, $mdp, $name, $firsname, $bdd){
  $query = "SELECT login FROM  User WHERE login='".$login."'";
  $result = mysqli_query($bdd, $query);
  
  if(mysqli_num_rows($result)==0){
	  $query = "INSERT INTO User (login, password, nom, prenom) VALUES ('".$login."', '".$mdp."', '".$name."', '".$firsname."')";
	  $result = mysqli_query($bdd, $query)or die(mysqli_error($bdd));
	  return 1;
  }
  else{
	return 0;
  }
}

// Retourne l'id de l'user
function getUserId($login, $mdp, $bdd){
  $query = "SELECT id_user FROM User WHERE login='".$login."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $user_id = mysqli_fetch_assoc($result);
  return $user_id['id_user'];
}

// Ajout d'un nouveau personnage
function newPersonnage($id_user, $rang, $bdd){
  $query = "INSERT INTO Personnage (id_user, rang, points) VALUES ('$id_user', '$rang', 0);";
  mysqli_query($bdd, $query);
}

// Retourne l'id du personnage en fonction de l'id de l'user
function getPersonnageId($id_user, $bdd){
  $query = "SELECT id_personnage FROM Personnage WHERE id_user='".$id_user."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $perso_id = mysqli_fetch_assoc($result);
  return $perso_id['id_personnage'];
}

// Initialisation du Harem
function newHarem($id_user, $id_personnage, $nbFemmes, $nbPreservatif, $bdd){
  $query = "INSERT INTO Harem (id_personnage, preservatif, femmes) VALUES ('$id_personnage', '$nbPreservatif', '$nbFemmes');";
  mysqli_query($bdd, $query);
}

// Initialisation des études
function newEtudes($id_user, $id_personnage, $neuronnes, $moyenne, $bdd){
  $query = "INSERT INTO Etudes (id_personnage, neuronnes, moyenne) VALUES ('$id_personnage', '$neuronnes', '$moyenne');";
  mysqli_query($bdd, $query);
}

// Initialisation de la santé
function newSante($id_user, $id_personnage, $energie, $poids, $vitalite, $bdd){
  $query = "INSERT INTO Sante (id_personnage, energie, poids, vitalite) VALUES ('$id_personnage', '$energie', '$poids', '$vitalite');";
  mysqli_query($bdd, $query);
}

// Initialisation des attaques du personnage
function newAttaques($id_personnage, $type, $bdd){
  $query = "INSERT INTO Attaques (id_personnage, type) VALUES ('$id_personnage', '$type');";
  mysqli_query($bdd, $query);
}

// Initialisation de la première quête du personnage
function newQuestRelation($id_personnage, $id_quest, $bdd){
  $query = "INSERT INTO Quest_Relation (id_personnage, id_quest, state, nb_personnage) VALUES ('$id_personnage', '$id_quest', 100, 5);";
  mysqli_query($bdd, $query);
}



//////////////////////////////////////////////
/////////// FUNCTION LOGIN USER //////////////
//////////////////////////////////////////////


function login_user($bdd, $login, $mdp){
	$query = "SELECT password FROM User WHERE login='".$login."' LIMIT 1";
	$result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));	
	
	$user_pwd = mysqli_fetch_assoc($result);
	if($user_pwd['password']==$mdp){
		return 1;
	}
	else{
		return 0;
	}
}



//////////////////////////////////////////////
//////////// FUNCTION UPDATE USER ////////////
//////////////////////////////////////////////


//Modifier le mot de passe de l'utilisateur
function newMdp($newPassword, $login, $bdd){
  $req_modif = "UPDATE User SET password ='$newPassword' WHERE login='$login'";
  $result = mysqli_query($bdd, $req_modif);
}



//////////////////////////////////////////////
/////////// FUNCTION UPDATE PERSO ////////////
//////////////////////////////////////////////

//Modifier le nom du personnage
function newNamePerso($newName, $id_user, $id_personnage, $bdd){
  $req_modif = "UPDATE Personnage SET nom ='$newName' WHERE Personnage.id_user='$id_user', Personnage.id_personnage='$id_personnage'";
  $result = mysqli_query($bdd, $req_modif);
}

//Modifier le prénom du personnage
function newLastnamePerso($newLastName, $id_user, $id_personnage, $bdd){
  $req_modif = "UPDATE Personnage SET prenom ='$newLastName' WHERE Personnage.id_user='$id_user', Personnage.id_personnage='$id_personnage'";
  $result = mysqli_query($bdd, $req_modif);
}

//Modifier le pseudo du personnage
function newNicknamePerso($newNickName, $id_user, $id_personnage, $bdd){
  $req_modif = "UPDATE Personnage SET nickname ='$newNickName' WHERE Personnage.id_user='$id_user', Personnage.id_personnage='$id_personnage'";
  $result = mysqli_query($bdd, $req_modif);
}

//Modifier le rang du personnage
function updateRandPerso($newRang, $id_personnage, $bdd){
  $query  = "UPDATE Personnage SET rang ='$newRang' WHERE Personnage.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}

// Retourne le rang du personnage
function getRang($id_personnage, $bdd){
  $query = "SELECT rang FROM Personnage WHERE id_personnage='".$id_personnage."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $rang = mysqli_fetch_assoc($result);
  return $rang['rang'];
}

//Modifier le nombre de points du personnage
function updateNbPoints($newNbPoints, $id_personnage, $bdd){
  $query  = "UPDATE Personnage SET points ='$newNbPoints' WHERE Personnage.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}

// Retourne le nombre de points du personnage
function getNbPoints($id_personnage, $bdd){
  $query = "SELECT points FROM Personnage WHERE id_personnage='".$id_personnage."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $points = mysqli_fetch_assoc($result);
  return $points['points'];
}


//////////////////////////////////////////////
/////////// FUNCTION UPDATE HAREM ////////////
//////////////////////////////////////////////


//Modifie le nombre de préservatifs
function updateHaremPreservatif($newNbPreservatif, $id_personnage, $bdd){
  $query = "UPDATE Harem SET preservatif ='$newNbPreservatif' WHERE Harem.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}

//Modifie le nombre de femmes
function updateHaremFemmes($newNbFemmes, $id_personnage, $bdd){
  $query = "UPDATE Harem SET femmes ='$newNbFemmes' WHERE Harem.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}

// Retourne le nombre de preservatif
function getNbPreservatif($id_personnage, $bdd){
  $query = "SELECT preservatif FROM Harem WHERE id_personnage='".$id_personnage."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $nb_preservatif = mysqli_fetch_assoc($result);
  return $nb_preservatif['preservatif'];
}

// Retourne le nombre de femmes
function getNbFemme($id_personnage, $bdd){
  $query = "SELECT femmes FROM Harem WHERE id_personnage='".$id_personnage."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $nb_femmes = mysqli_fetch_assoc($result);
  return $nb_femmes['femmes'];
}



//////////////////////////////////////////////
/////////// FUNCTION UPDATE SANTE ////////////
//////////////////////////////////////////////

function myFunctionVitalite($valeur, $id_personnage, $bdd){
	$vitalite=getVitalite($id_personnage, $bdd);
	$vitalite=$vitalite-10;
	updateSanteVitalite($vitalite, $id_personnage, $bdd);
}


//Modifie l'énergie du personnage
function updateSanteEnergie($newEnergie, $id_personnage, $bdd){
  $query = "UPDATE Sante SET energie ='$newEnergie' WHERE Sante.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}

//Modifie le poids du personnage
function updateSantePoids($newPoids, $id_personnage, $bdd){
  $query = "UPDATE Sante SET poids ='$newPoids' WHERE Sante.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}

//Modifie la vitalité du personnage
function updateSanteVitalite($newVitalite, $id_personnage, $bdd){
  $query = "UPDATE Sante SET vitalite ='$newVitalite' WHERE Sante.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}

// Retourne l'énergie
function getEnergie($id_personnage, $bdd){
  $query = "SELECT energie FROM Sante WHERE id_personnage='".$id_personnage."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $energie = mysqli_fetch_assoc($result);
  return $energie['energie'];
}

// Retourne le poids
function getPoids($id_personnage, $bdd){
  $query = "SELECT poids FROM Sante WHERE id_personnage='".$id_personnage."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $poids = mysqli_fetch_assoc($result);
  return $poids['poids'];
}

// Retourne la vitalité
function getVitalite($id_personnage, $bdd){
  $query = "SELECT vitalite FROM Sante WHERE id_personnage='".$id_personnage."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $vitalite = mysqli_fetch_assoc($result);
  return $vitalite['vitalite'];
}


//////////////////////////////////////////////
////////// FUNCTION UPDATE ETUDES ////////////
//////////////////////////////////////////////


//Modifie la moyenne du personnage
function updateEtudesMoyenne($newMoyenne, $id_personnage, $bdd){
  $query = "UPDATE Etudes SET moyenne ='$newMoyenne' WHERE Etudes.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}

//Modifie le nombre de neuronnes du personnage
function updateEtudesNeuronne($newNeuronne, $id_personnage, $bdd){
  $query = "UPDATE Etudes SET neuronnes ='$newNeuronne' WHERE Etudes.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}

// Retourne la moyenne
function getMoyenne($id_personnage, $bdd){
  $query = "SELECT moyenne FROM Etudes WHERE id_personnage='".$id_personnage."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $moyenne = mysqli_fetch_assoc($result);
  return $moyenne['moyenne'];
}

// Retourne le nombre de neuronnes
function getNbNeuronne($id_personnage, $bdd){
  $query = "SELECT neuronnes FROM Etudes WHERE id_personnage='".$id_personnage."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $neuronnes = mysqli_fetch_assoc($result);
  return $neuronnes['neuronnes'];
}


//////////////////////////////////////////////
/////////// FUNCTION UPDATE QUEST ////////////
//////////////////////////////////////////////


//Modifie le statut d'une quête, une quête a été effectuée par exemple
function updateQuestRelation($new_quest_relation, $id_personnage, $bdd){
  $query = "UPDATE Quest_Relation SET id_quest ='$new_quest_relation' WHERE Quest_Relation.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}

function updateQuestState($state, $id_personnage, $bdd){
  $query = "UPDATE Quest_Relation SET  state =  '$state' WHERE  Quest_Relation.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}

//Modifie le statut d'une quête, une quête a été effectuée par exemple
function getIdQuest($id_personnage, $bdd){
  $query = "SELECT id_quest FROM Quest_Relation WHERE id_personnage='".$id_personnage."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $id_quest = mysqli_fetch_assoc($result);
  return $id_quest['id_quest'];
}

//Modifie le statut d'une quête, une quête a été effectuée par exemple
function getQuestDescription($id_quest, $bdd){
  $query = "SELECT Description FROM Quest WHERE id_quest='".$id_quest."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $Description = mysqli_fetch_assoc($result);
  return utf8_encode($Description['Description']);
}

//Modifie le statut d'une quête, une quête a été effectuée par exemple
function getQuestMission($id_quest, $bdd){
  $query = "SELECT Mission FROM Quest WHERE id_quest='".$id_quest."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $Mission = mysqli_fetch_assoc($result);
  return utf8_encode($Mission['Mission']);
}

function getQuestNbPersonnage($id_personnage, $bdd){
  $query = "SELECT nb_personnage FROM Quest_Relation WHERE id_personnage='".$id_personnage."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $nb_personnage = mysqli_fetch_assoc($result);
  return $nb_personnage['nb_personnage'];
}

function updateQuestNbPersonnage($nbPersonnage, $id_personnage, $bdd){
  $query = "UPDATE Quest_Relation SET  nb_personnage =  '$nbPersonnage' WHERE  Quest_Relation.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}


///////////////////////////////////////////////
/////////// FUNCTION UPDATE ENNEMI ////////////
///////////////////////////////////////////////


//Modifie la vie d'un ennemi
function updateEnnemiLife($new_state, $id_personnage, $bdd){
  $query = "UPDATE Quest_Relation SET state ='$new_state' WHERE Quest_Relation.id_personnage='$id_personnage'";
  mysqli_query($bdd, $query);
}

//Retourne la vie d'un ennemi
function getEnnemiLife($id_personnage, $bdd){
  $query = "SELECT state FROM Quest_Relation WHERE id_personnage='".$id_personnage."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $state = mysqli_fetch_assoc($result);
  return $state['state'];
}

//Retourne le type d'un ennemi
function getEnnemiType($id_ennemi, $bdd){
  $query = "SELECT type FROM Ennemi WHERE id_ennemi='".$id_ennemi."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $type = mysqli_fetch_assoc($result);
  return utf8_encode($type['type']);
}

//Retourne le loot d'un ennemi
function getEnnemiLoot($id_ennemi, $bdd){
  $query = "SELECT loot FROM Ennemi WHERE id_ennemi='".$id_ennemi."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $loot = mysqli_fetch_assoc($result);
  return utf8_encode($loot['loot']);
}

function getEnnemiId($id_quest, $bdd){
  $query = "SELECT id_ennemi FROM Ennemi WHERE id_quest='".$id_quest."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $id_ennemi = mysqli_fetch_assoc($result);
  return $id_ennemi['id_ennemi'];
}


///////////////////////////////////////////////
////////// FUNCTION GET RECOMPENSE ////////////
///////////////////////////////////////////////


//Retourne la recompense d'une quete
function getRecompense($id_quest, $bdd){
  $query = "SELECT type FROM Recompense WHERE id_quest='".$id_quest."' LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $type = mysqli_fetch_assoc($result);
  return utf8_encode($type['type']);
}


///////////////////////////////////////////////
////////// FUNCTION GET CLASSEMENT ////////////
///////////////////////////////////////////////


//Retourne la recompense d'une quete
function getClassement($bdd){
  
  $classement = array();
  
  $query = "SELECT User.nom, User.prenom, Personnage.points, Quest_Relation.id_quest, Personnage.rang FROM Quest_Relation LEFT JOIN Personnage ON Quest_Relation.id_personnage = Personnage.id_personnage LEFT JOIN User ON Personnage.id_personnage = User.id_user WHERE id_quest=7 ORDER BY Personnage.points DESC";
  
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
 
  
  
  while($ligne=mysqli_fetch_assoc($result)){
	  array_push($classement, $ligne);
  }	

  return $classement;
}

function getClassementPerson($search, $bdd){
	
	$classement = array();
  
	$query = "SELECT User.login, User.nom, User.prenom, Personnage.points, Quest_Relation.id_quest, Personnage.rang FROM Quest_Relation LEFT JOIN Personnage ON Quest_Relation.id_personnage = Personnage.id_personnage LEFT JOIN User ON Personnage.id_personnage = User.id_user ORDER BY Personnage.points DESC";
  
	$result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
	
	while($ligne=mysqli_fetch_assoc($result)){
		array_push($classement, $ligne);
	}	
	
	
	$i=1;
	$ligne_nom = array();
	
	foreach($classement as $n){
	        if($n['login']== $search || $n['prenom']== $search || $n['nom']== $search){
		        array_push($ligne_nom, $i, $n['prenom'], $n['nom'], $n['id_quest'], $n['points']);
	        }
	        $i++;
	}
	
	return $ligne_nom;
}


///////////////////////////////////////////////
////////// FUNCTION RESTART GAME //////////////
///////////////////////////////////////////////

function restart_game($id_personnage, $bdd){
	
	$newRang = "Puceau";
	
	updateQuestRelation(1, $id_personnage, $bdd);
	updateQuestNbPersonnage(5, $id_personnage, $bdd);
	updateNbPoints(0, $id_personnage, $bdd);
	updateHaremFemmes(0, $id_personnage, $bdd);
	updateHaremPreservatif(0, $id_personnage, $bdd);
	updateRandPerso($newRang, $id_personnage, $bdd);
	updateSantePoids(70, $id_personnage, $bdd);
	updateEtudesMoyenne(10, $id_personnage, $bdd);
	updateEtudesNeuronne(100, $id_personnage, $bdd);
	updateQuestState(100, $id_personnage, $bdd);	
	updateSanteEnergie(100, $id_personnage, $bdd);
	updateSanteVitalite(100, $id_personnage, $bdd);
}

///////////////////////////////////////////////
////////// FUNCTION TAMAGOTCHI //////////////
///////////////////////////////////////////////

function add_tamagotchi($id_personnage, $bdd){
	
	$humeur=utf8_decode("Contente");
	$humeur2=utf8_decode("Appeurée");
	$humeur3=utf8_decode("Excitée");
	
	$query = "INSERT INTO Tamagotchi (id_personnage, id_ennemi, life, poids, humeur) VALUES ('". $id_personnage ."', 2, 100, 60, '$humeur');";
	$result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
		
	$query = "INSERT INTO Tamagotchi (id_personnage, id_ennemi, life, poids, humeur) VALUES ('". $id_personnage ."', 4, 100, 60, '$humeur2');";
	$result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
		
	$query = "INSERT INTO Tamagotchi (id_personnage, id_ennemi, life, poids, humeur) VALUES ('". $id_personnage ."', 9, 100, 60, '$humeur3');";
	$result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));

}

function getLifeHaremEnnemi($id_personnage, $id_ennemi, $bdd){
  $query = "SELECT life FROM Tamagotchi WHERE id_personnage='".$id_personnage."' AND id_ennemi='".$id_ennemi."'  LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $life = mysqli_fetch_assoc($result);
  return utf8_encode($life['life']);
}

function updateLifeHaremEnnemi($newlife, $id_personnage, $id_ennemi, $bdd){
  $query = "UPDATE Tamagotchi SET life ='". $newlife. "' WHERE Tamagotchi.id_personnage='". $id_personnage ."' AND id_ennemi='". $id_ennemi ."'";
  mysqli_query($bdd, $query);
}

function getPoidsHaremEnnemi($id_personnage, $id_ennemi, $bdd){
  $query = "SELECT poids FROM Tamagotchi WHERE id_personnage='".$id_personnage."' AND id_ennemi='".$id_ennemi."'  LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $poids = mysqli_fetch_assoc($result);
  return utf8_encode($poids['poids']);
}

function updatePoidsHaremEnnemi($newpoids, $id_personnage, $id_ennemi, $bdd){
  $query = "UPDATE Tamagotchi SET poids ='". $newpoids. "' WHERE Tamagotchi.id_personnage='". $id_personnage ."' AND id_ennemi='". $id_ennemi ."'";
  mysqli_query($bdd, $query);
}

function getHumeurHaremEnnemi($id_personnage, $id_ennemi, $bdd){
  $query = "SELECT humeur FROM Tamagotchi WHERE id_personnage='".$id_personnage."' AND id_ennemi='".$id_ennemi."'  LIMIT 1";
  $result= mysqli_query($bdd, $query) or die(mysqli_error($bdd));
  
  $humeur = mysqli_fetch_assoc($result);
  return utf8_encode($humeur['humeur']);
}

function updateHumeurHaremEnnemi($newhumeur, $id_personnage, $id_ennemi, $bdd){
  $query = "UPDATE Tamagotchi SET humeur ='". $newhumeur. "' WHERE Tamagotchi.id_personnage='". $id_personnage ."' AND id_ennemi='". $id_ennemi ."'";
  mysqli_query($bdd, $query);
}

?>
