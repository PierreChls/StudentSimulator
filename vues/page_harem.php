
	
		
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
				
				<h4>TAMAGOTCHI</h4>
				
				<div class="myHarem" style="margin-top:50px !important;">
					<div class="column">
						<img src="img/ennemi_<?php echo($id_ennemi) ?>.jpg" width="100" height="100" style="display:block; margin:auto; margin-bottom:10px;"/>
						<progress id="avancement" value="<?php echo($ennemi_life) ?>" max="100" style="margin-bottom:10px;"></progress>
					</div>
					
					<p>Poids : <?php echo($ennemi_poids); ?>kg</p>
					<p>Humeur : <?php echo($ennemi_humeur); ?></p>
					
					<div style="margin-top:40px;">
						<div class="column" style="width: 20%;">
							<form method=post action="page_harem.php?id=<?php echo($id_ennemi); ?>">
								<input type="submit" id="btn_caresse" name="btn_caresse" class="button" style="background:url('img/icon_harem_caresse.png') center center; background-size:contain; height:50px; width:50px; border: 0 solid; outline:none;" width="50" height="50" title="Caresse!" value=""></input>
							</form>
						</div>
						<div class="column" style="width: 20%;">
							<form method=post action="page_harem.php?id=<?php echo($id_ennemi); ?>">
								<input type="submit" id="btn_fouet" name="btn_fouet" class="button" style="background:url('img/icon_harem_fouet.png') center center; background-size:contain; height:50px; width:50px; border: 0 solid; outline:none;" width="50" height="50" title="Coup de fouet!" value=""></input>
							</form>
						</div>
						<div class="column" style="width: 20%;">
							<form method=post action="page_harem.php?id=<?php echo($id_ennemi); ?>">
								<input type="submit" id="btn_food" name="btn_food" class="button" style="background:url('img/icon_harem_food.png') center center; background-size:contain; height:50px; width:50px; border: 0 solid; outline:none;" width="50" height="50" title="Engraissement!" value=""></input>
							</form>
						</div>
						<div class="column" style="width: 20%;">
							<form method=post action="page_harem.php?id=<?php echo($id_ennemi); ?>">
								<input type="submit" id="btn_blague" name="btn_blague" class="button" style="background:url('img/icon_harem_blague.png') center center; background-size:contain; height:50px; width:50px; border: 0 solid; outline:none;" width="50" height="50" title="Blague!" value=""></input>
							</form>
						</div>
					</div>
					
				</div>
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