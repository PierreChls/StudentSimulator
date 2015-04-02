<?php
//On démarre la session
session_start();
 
//On se connecte à MySQL


include 'modeles/connect_function.php';

$bdd = connect_to_mysql($server, $user, $password, $dataBase);
 
//On inclut le contrôleur s'il existe
if ( isset($_SESSION['login']) && isset($_SESSION['password']) && isset($_SESSION['id_personnage']) && is_file('controleurs/page_classement.php'))
{
        include 'controleurs/page_classement.php';
}
else
{
        include 'controleurs/petit_curieux.php';
}
 
//On ferme la connexion à MySQL
deconnect_to_mysql($bdd);