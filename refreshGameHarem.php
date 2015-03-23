<?php
	session_start ();
	
	include 'library_fonction.php'; 
	
	// Variables pour la connexion
	$server = 'localhost';
	$user = 'root';
	$password = 'root';
	$dataBase = 'Student_Simulator';
	$bdd = connect_to_mysql($server, $user, $password, $dataBase);
	
	$id_personnage = $_SESSION['id_personnage'];
	
	$nb_neuronnes=getNbNeuronne($id_personnage, $bdd);
	$moyenne=getMoyenne($id_personnage, $bdd);
?>

<h4>MON HAREM</h4>

<div class="myHarem">

<?php $nbFemmes = getNbFemme($id_personnage, $bdd);

	
	if($nbFemmes > 0){
		if($nbFemmes >= 1){?>
			<div class="column">
				<img src="img/ennemi_2.jpg" width="100" height="100">
				<p><?php echo(getEnnemiType(2, $bdd)); ?></p>
			</div>
			
			<?php
			if($nbFemmes >= 2){?>
			
				<div class="column">
					<img src="img/ennemi_4.jpg" width="100" height="100">
					<p><?php echo(getEnnemiType(4, $bdd)); ?></p>
				</div>
				
				<?php
				if($nbFemmes == 3){?>
					<div class="column">
						<img src="img/ennemi_9.jpg" width="100" height="100">
						<p><?php echo(getEnnemiType(9, $bdd)); ?></p>
					</div>
				<?php
				}
			}
		}
	}
	
	else{?>
		<p>Tu as encore aucune conquête... Trouve toi vite une toile enfin que tu puisse t'exprimer avec ton pinceau!!</p><?php
	}
?>

</div>