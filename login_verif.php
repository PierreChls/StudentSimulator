<?php
	
  session_start ();
  
  include 'library_fonction.php';

  // Variables pour la connexion
  $server = 'localhost';
  $user = 'root';
  $password = 'root';
  $dataBase = 'Student_Simulator';


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
  
  // Connexion à la BDD
  $bdd = connect_to_mysql($server, $user, $password, $dataBase);
				
				
				// Si quelqu'un veut se connecter
				if(isset($_POST['submit_connect'])){
					if(empty($_POST['login']) || empty($_POST['mdp'])){
						echo '<body onLoad="alert(\'Veuillez compléter tous les champs.\')">';
					}
					else{
						$login = $_POST['login'];
						$mdp = $_POST['mdp']; 
						//login_user($bdd, $login, $mdp);
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
						if(inscription($login, $mdp, $rang, $lastname, $name, $nbFemmes, $nbPreservatif, $neuronnes, $moyenne, $energie, $poids, $vitalite, $attaque1, $attaque2, $attaque3, $attaque4, $bdd)==1){
							$_SESSION['bdd'] = $bdd;
							$_SESSION['login'] = $login;
							$_SESSION['password'] = $mdp;
							$_SESSION['id_personnage'] = getPersonnageId(getUserId($login, $mdp, $bdd), $bdd);
							header('Location: page_membre.php');	
						}
					}
				}
				
				
	// Déconnexion
	deconnect_to_mysql($bdd);
?>
