<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['password']) && isset($_SESSION['id_personnage'])) {
	
	$id_personnage=$_SESSION['id_personnage'];
	
	//Si les variables sont définies alors on inclu notre barre de connexion
	include 'story.php';
	include 'barre_connexion.php';
	//include 'story.php';
	include 'container.php';
	include 'footer.php';
}
else {
	//Sinon, on inclu notre texte de petit curieux!!
	include 'petit_curieux.php';
}
?>