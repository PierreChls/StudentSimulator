<?php

//////////////////////////////////////////////
//////////////// FUNCTION BDD ////////////////
//////////////////////////////////////////////


$server = 'localhost';
$user = 'root';
$password = 'root';
$dataBase = 'Student_Simulator';

// Connexion BDD
function connect_to_mysql($server, $user, $password, $dataBase){
  $bdd = mysqli_connect($server, $user, $password, $dataBase);

  if (!$bdd) {
    die('Erreur de connexion : ' . mysqli_connect_error());
  }
  else{
    //echo ("Connect");
    return $bdd;
  }
}

// Déconnexion de la BDD
function deconnect_to_mysql($bdd){
  if($deco = mysqli_close($bdd)){
    //echo "Deconnect\n";
  }
  else{
    echo "problème";
  }
}

?>