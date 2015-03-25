
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