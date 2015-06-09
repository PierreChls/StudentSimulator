<?php
//On démarre la session
session_start();
 
//On se connecte à MySQL


include 'modeles/connect_function.php';

$bdd = connect_to_mysql($server, $user, $password, $dataBase);
 
//On inclut le contrôleur s'il existe
if ( isset($_SESSION['login']) && isset($_SESSION['password']) && isset($_SESSION['id_personnage']) && is_file('controleurs/page_admin.php'))
{
        if($_SESSION['id_personnage'] == 1){
	        include 'controleurs/page_admin.php';
        }
        else{
	        echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
        }
}
else
{
        include 'controleurs/petit_curieux.php';
}
 
//On ferme la connexion à MySQL
deconnect_to_mysql($bdd);