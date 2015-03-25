
<h4>MES RECOMPENSES</h4>

<div class="myRecompenses">

<?php $id_Quest = getIdQuest($id_personnage, $bdd);
	  $nb_personnage = getQuestNbPersonnage($id_personnage, $bdd);

	
	if($id_Quest > 1){
		if($id_Quest >= 2){?>
			<div class="column">
				<img src="img/icon_star.png" width="20" height="20">
				<p><?php echo(getRecompense(1, $bdd)); ?></p>
			</div>
			
			<?php
			if($id_Quest >= 3){?>
			
				<div class="column">
					<img src="img/icon_star.png" width="20" height="20">
					<p><?php echo(getRecompense(2, $bdd)); ?></p>
				</div>
				
				<?php
				if($id_Quest >= 4){?>
					<div class="column">
						<img src="img/icon_star.png" width="20" height="20">
						<p><?php echo(getRecompense(3, $bdd)); ?></p>
					</div>
					
					<?php
					if($id_Quest >= 5){?>
						<div class="column">
							<img src="img/icon_star.png" width="20" height="20">
							<p><?php echo(getRecompense(4, $bdd)); ?></p>
						</div>
						
						<?php
						if($id_Quest >= 6){?>
							<div class="column">
								<img src="img/icon_star.png" width="20" height="20">
								<p><?php echo(getRecompense(5, $bdd)); ?></p>
							</div>
							
							<?php
							if($id_Quest == 7){?>
								<div class="column">
									<img src="img/icon_star.png" width="20" height="20">
									<p><?php echo(getRecompense(6, $bdd)); ?></p>
								</div>
								
								<?php
								if($nb_personnage >= 3){?>
									<div class="column">
										<img src="img/icon_star.png" width="20" height="20">
										<p><?php echo(getRecompense(7, $bdd)); ?></p>
									</div>
								<?php
								}
								
							}
						}
					}
				}
			}
		}
	}
	
	else{?>
		<p>Tu as encore aucune récompenses...</p><?php
	}
?>

</div>