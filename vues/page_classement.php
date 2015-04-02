
	
		
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
				
				<h4>Recherche dans le classement</h4>
			
					<FORM method=post action="page_classement.php" style="width: 450px; margin: auto; margin-top:30px;" class="form-horizontal" role="form">
						<fieldset>
							<div class="form-group">
								<div class="col-sm-8" style="margin: auto 69px;">
							       <input type="name" class="form-control" id="name" placeholder="Entrez un nom, un prénom ou un login" name="name">
							       
							    </div>
							    <INPUT type="submit" value="Chercher..." name="submit_search" style="margin-left: 150px; margin-right: 150px; margin-top:20px;">
							</div>
						</fieldset>
					</FORM>
					
					<div class="myClassement" style="overflow: auto; height: 177px; border-bottom: 2px solid #f2f2f2; margin-bottom: 9px;">
					
					<?php
			
			if($classement != 0){
				$i=0;
				$taille = sizeof($classement);
				if($taille == 0){
					echo '<p>Aucun utilisateur correspond à votre recherche</p>';
				}
				
				else{
					echo'
						<div class="people" id="menu">
							<img src="img/icon_blank.jpg" width="30" height="30"/>
						    <li>Prénom</li>
						    <li>Nom</li>
						    <li>Quête</li>
						    <li>Points</li>
						</div>';
					
					while($i<$taille){
						echo '
					    	<div class="people">
					    		<li style="width:20px;">'.$classement[$i].'</li>
					            <li>'.$classement[$i + 1].'</li>
					            <li>'.$classement[$i + 2].'</li>
					            <li>'.$classement[$i + 3].'</li>
					            <li>'.$classement[$i + 4].'</li>
					        </div>';
					    $i+=5;	
					}
				}
				
			}
			
			?>
				
				<div>
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