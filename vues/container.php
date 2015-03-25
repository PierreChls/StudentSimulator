

<?php 

	$nb_preservatif=getNbPreservatif($id_personnage, $bdd);
	$nb_femme=getNbFemme($id_personnage, $bdd);
	$poids=getPoids($id_personnage, $bdd);
	$energie=getEnergie($id_personnage, $bdd);
	$vitalite=getVitalite($id_personnage, $bdd);
	$rang=getRang($id_personnage, $bdd);
	$nb_neuronnes=getNbNeuronne($id_personnage, $bdd);
	$moyenne=getMoyenne($id_personnage, $bdd);
	
	
	if ( isset( $_POST['access_harem'] ) ) { 
		updateQuestState(100, $id_personnage, $bdd);	
		updateQuestNbPersonnage(4, $id_personnage, $bdd);
		updateSanteEnergie(100, $id_personnage, $bdd);
		updateSanteVitalite(100, $id_personnage, $bdd);
		echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
	}
	
?>	
		
		<div id="container" class="container">
		
			<h2 style="text-align:center; margin-bottom:50px;">Jerome Simulator</h2>
			
			<div id="harem" class="personnage_description">
				<h3>HAREM</h3>
				<div class="column">
					<img src="img/icon_condom.png" width="30" height="50"/>
					<p id="wesh"><?php echo($nb_preservatif); ?></p>
				</div>
				<div class="column">
					<img src="img/icon_femme.png" width="50" height="50"/>
					<p><?php echo($nb_femme); ?></p>
				</div>
			</div>
			
			<div id="sante" class="personnage_description">
				<h3>SANTÉ</h3>
				<div class="column">
					<img src="img/icon_balance.png" width="50" height="50"/>
					<p><?php echo($poids) ?> kg</p>
				</div>
				<div class="column">
					<img src="img/icon_trophy.png" width="50" height="50"/>
					<p><?php echo($rang) ?></p>
				</div>
				<div class="column">
					<img src="img/icon_energy.png" width="50" height="50"/>
					<progress id="avancement" value="<?php echo($energie) ?>" max="100"></progress>
				</div>
				<div class="column">
					<img src="img/icon_vitality.png" width="50" height="50"/>
					<progress id="avancement" value="<?php echo($vitalite) ?>" max="100"></progress>
				</div>
			</div>
			
			<div id="etudes" class="personnage_description">
				<h3>ÉTUDES</h3>
				<div class="column">
					<img src="img/icon_brain.png" width="50" height="50"/>
					<p><?php echo($nb_neuronnes) ?></p>
				</div>
				<div class="column">
					<img src="img/icon_moyenne.png" width="35" height="50"/>
					<p><?php echo($moyenne) ?>/20</p>
				</div>
			</div>
		
			<div id="attaques" class="personnage_description">
				<h3>Attaques</h3>
				<div class="column">
					<form method=post action="page_membre.php">
						<input type="submit" id="btn_rin" name="btn_rin" class="button" style="background:url('img/icon_attaque_rin.png') center center; background-size: contain; height:50px; width:50px; border: 0 solid; outline:none;" width="50" height="50" title="Coup de rin!" value=""></input>
					</form>
				</div>
				<div class="column">
					<form method=post action="page_membre.php">
						<input type="submit" id="btn_tacos" name="btn_tacos" class="button" style="background:url('img/icon_attaque_tacos.png') center center; background-size:contain; height:50px; width:50px; border: 0 solid; outline:none;" width="50" height="50" title="Lancer de Tacos!" value=""></input>
					</form>
				</div>
				<div class="column">
					<form method=post action="page_membre.php">
						<input type="submit" id="btn_punchline" name="btn_punchline" class="button" style="background:url('img/icon_attaque_punchline.png') center center; background-size:contain; height:50px; width:50px; border: 0 solid; outline:none;" width="50" height="50" title="Punchline!" value=""/>
					</form>
				</div>
				<div class="column">
					<form method=post action="page_membre.php">
						<input type="submit" id="btn_clin_d_oeil" name="btn_clin_d_oeil" class="button" style="background:url('img/icon_attaque_clin_d_oeil.png') center center; background-size:contain; height:50px; width:50px; border: 0 solid; outline:none;" width="50" height="50" title="Clin d'oeil!" value=""></input>
					</form>
				</div>
			</div>
			
			<div id="gamecontent" class="gamecontent">
			<?php if($nb_personnage==4){ ?>
				<p>Vous avez fini le jeu!</p>
			<?php } ?>
			<?php if($nb_personnage==5){ ?>
				<div class="game_header">
					<h4>Tutorial</h4>
				</div>
				<div class="game_content">
					<p>Bienvenue dans l'environnement JéromeSimulator.</p>
					<p>Autour de toi tu peux trouver ton harem, ta santé, tes études et tes attaques.</p>
					<p>Tu vas devoir te servir toi de tes attaques pour accomplir tes quêtes.</p>
					<p>Surveille l'évolution de ton harem, de tes études et de ta santé.</p>
					<p>Grâce au trois liens ci-dessous, tu pourras naviguer facilement entre ta zone de jeu, et d'avoir toujours une visibilité sur ton harem tes récompenses.</p>
					<p>À toi de jouer!</p>
				</div>
						
				<div class="game_success">
					<form method=post action="page_membre.php" class="form-horizontal" role="form">
						<input type="submit" id="next_quest" name="next_quest" value="Commencer le jeu >"></input>
					</form>
				</div>
						
					<?php } ?>
					
					<?php if($nb_personnage!=4 && $nb_personnage!=5){ ?>
						
						
						<div class="game_header">
						<h4><?php echo($Quest_Mission) ?></h4>
						<p><?php echo($Quest_Description) ?></p>
						
						
						<div class="game_content">
						<?php if($nb_personnage==1 || $nb_personnage==2){ ?>
							<img src="img/ennemi_<?php echo($id_ennemi); ?>.jpg" width="100" height="100">
							<p><?php echo($EnnemiType) ?></p>
							<progress id="avancement" value="<?php echo($EnnemiLife) ?>" max="100"></progress>
						<?php }	?>
						
						<?php if($EnnemiLife<=0 && $nb_personnage==1){ ?>
						<div class="game_success">
						<p><?php $EnnemiLoot=getEnnemiLoot($id_ennemi, $bdd); echo($EnnemiLoot); ?></p>
						<form method=post action="page_membre.php" class="form-horizontal" role="form">
							<input type="submit" id="next_quest" name="next_quest" value="Prochaine mission >"></input>
						</form>
						</div>
						<div class="game_recompense">
							<p>Récompense : <?php echo($recompense); ?></p>
						</div>
						<?php } ?>
						
						<?php if($EnnemiLife<=0 && $nb_personnage==2 ){ ?>
						<div class="game_success">
						<p><?php $EnnemiLoot=getEnnemiLoot($id_ennemi, $bdd); echo($EnnemiLoot); ?></p>
						<form method=post action="page_membre.php" class="form-horizontal" role="form">
							<input type="submit" id="next_quest" name="next_quest" value="Continuer la mission >"></input>
						</form>
						</div>
						<?php } ?>
						
						<?php if($EnnemiLife<=0 && $nb_personnage==3 ){ ?>
						
						<img src="img/ennemi_<?php echo($id_ennemi+2); ?>.jpg" width="100" height="100">
						<p><?php $EnnemiType = getEnnemiType($id_ennemi+1, $bdd); echo($EnnemiType) ?></p>
						<progress id="avancement" value="<?php echo($EnnemiLife) ?>" max="100"></progress>				
						<div class="game_success">
						<p><?php $EnnemiLoot=getEnnemiLoot($id_ennemi+1, $bdd); echo($EnnemiLoot) ?></p>
						<form method=post action="page_membre.php" class="form-horizontal" role="form">
							<input type="submit" id="access_harem" name="access_harem" value="Accéder au harem >"></input>
						</form>
						</div>
						<div class="game_recompense">
							<p>Récompense : <?php echo($recompense); ?></p>
						</div>
						<?php } ?>
						</div>
				</div>
					<?php } ?>
				<?php if($vitalite<=0){ ?>
				<div class="game_success">
				<p>Tu n'as plus de vie, mission échouée.</p>
				<form method=post action="page_membre.php" class="form-horizontal" role="form">
					<input type="submit" id="redo_quest" name="redo_quest" value="Réessayer la mission >"></input>
				</form>
				</div>
				<?php } ?>
			</div>
			
			<div class="nav">
				<ul>
					<li id="nav_gamecontent">Zone de jeu</li>
					<li id="nav_harem">Mon Harem</li>
					<li id="nav_recompenses">Mes récompenses</li>
					<li id="nav_classement">Classement</li>
				</ul>
			</div>
						
		</div>