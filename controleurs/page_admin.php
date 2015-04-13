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
?>

<?php
	
	if ( isset( $_POST['submit_modify'] ) ) { 
		
		admin_modify($bdd);
	}
	

//On inclut la vue
include(dirname(__FILE__).'/../vues/barre_connexion.php');
include(dirname(__FILE__).'/../vues/page_admin.php');
include(dirname(__FILE__).'/../vues/footer.php');

?>