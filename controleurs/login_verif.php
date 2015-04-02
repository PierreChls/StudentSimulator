<?php
  /* C'est en tout début de fichier que l'on vérifie les autorisations. Les 
  news sont visibles par tous, mais si vous voulez en restreindre l'accès, c'est 
  ici que cela se passe. */
	 
  //On inclut le modèle
  include(dirname(__FILE__).'/../modeles/library_fonction.php');
  
  /* On effectue ici diverses actions, comme supprimer des news, par exemple. ;)
  Il n'y en aura aucune dans ce tutoriel pour rester simple, mais libre à vous d'en rajouter. */


  // Variables création user
  $rang = 'Puceau';
  $nbFemmes=0;
  $nbPreservatif=0;
  $neuronnes=100;
  $moyenne=10;
  $energie= 100;
  $poids= 70;
  $vitalite=100;
  $attaque1="Clin d\'oeil";
  $attaque2="Lancer de taccos";
  $attaque3="Coup de rein";
  $attaque4="Punchline";
				
				
				// Si quelqu'un veut se connecter
				if(isset($_POST['submit_connect'])){
					if(empty($_POST['login']) || empty($_POST['mdp'])){
						echo '<body onLoad="alert(\'Veuillez compléter tous les champs.\')">';
					}
					else{
						$login = $_POST['login'];
						$mdp = $_POST['mdp']; 
						if (ctype_alpha($login) && ctype_alpha($mdp)){
							if(login_user($bdd, $login, $mdp)==1){
								// on enregistre les paramètres de notre visiteur comme variables de session
								
								$_SESSION['bdd'] = $bdd;
								$_SESSION['login'] = $login;
								$_SESSION['password'] = $mdp;
								$_SESSION['id_personnage'] = getPersonnageId(getUserId($login, $mdp, $bdd), $bdd);
								header('Location: page_membre.php');
							}
							else{
								//on fait une alerte javascript
								echo '<body onLoad="alert(\'Login ou mot de passe incorrect.\')">';
								// puis on le redirige vers la page de login
								echo '<meta http-equiv="refresh" content="0;URL=login.php">';
							}
						}
						
						else{
							echo '<body onLoad="alert(\'Les champs doivent contenir que des lettres.\')">';
						}

					}
				}
				
				// Si quelqu'un veut créer un nouvel user
				if(isset($_POST['submit_new_user'])){
					if(empty($_POST['name']) || empty($_POST['lastname']) || empty($_POST['lastname']) || empty($_POST['login_new']) || empty($_POST['mdp_new'])){
						//on fait une alerte javascript
						echo '<body onLoad="alert(\'Veuillez compléter tous les champs.\')">';	
					}
					else{
						$name = $_POST['name'];
						$lastname = $_POST['lastname'];
						$login = $_POST['login_new'];
						$mdp = $_POST['mdp_new']; 
						if (ctype_alpha($name) && ctype_alpha($lastname) && ctype_alpha($login) && ctype_alpha($mdp)){
							if((strlen($name) > 15) || (strlen($lastname) > 15) || (strlen($login) > 15)){
								echo '<body onLoad="alert(\'Les champs nom, prénom et login ne doivent pas dépasser 15 caractères.\')">';
							}
							else{
								if(inscription($login, $mdp, $rang, $lastname, $name, $nbFemmes, $nbPreservatif, $neuronnes, $moyenne, $energie, $poids, $vitalite, $attaque1, $attaque2, $attaque3, $attaque4, $bdd)==1){
									$_SESSION['bdd'] = $bdd;
									$_SESSION['login'] = $login;
									$_SESSION['password'] = $mdp;
									$_SESSION['id_personnage'] = getPersonnageId(getUserId($login, $mdp, $bdd), $bdd);
									header('Location: page_membre.php');	
								}
								else{
									echo '<body onLoad="alert(\'Login déjà existant ma gueule.\')">';
								}
							}
						}
						else{
							echo '<body onLoad="alert(\'Les champs doivent contenir que des lettres.\')">';
						}
					}
				}
	
	
	//On inclut la vue
	include(dirname(__FILE__).'/../vues/login.php');
	
?>
