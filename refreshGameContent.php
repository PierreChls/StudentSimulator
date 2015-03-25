<?php
//On démarre la session
session_start();
 
//On se connecte à MySQL

mysql_connect('localhost', 'root', 'root');
mysql_select_db('Student_Simulator');
 
//On inclut le contrôleur s'il existe
if ( isset($_SESSION['login']) && isset($_SESSION['password']) && isset($_SESSION['id_personnage']) && is_file('controleurs/refreshGameContent.php'))
{
        include 'controleurs/refreshGameContent.php';
}
else
{
        echo "Arf";
}
 
//On ferme la connexion à MySQL
mysql_close();