<?php
//On démarre la session
session_start();
 
//On se connecte à MySQL


include 'modeles/connect_function.php';

$bdd = connect_to_mysql($server, $user, $password, $dataBase);

 
//On inclut le contrôleur s'il existe
if ( is_file('controleurs/login_verif.php'))
{
        include 'controleurs/login_verif.php';
}
else
{
        echo("Arf");
}
 
//On ferme la connexion à MySQL
mysql_close();