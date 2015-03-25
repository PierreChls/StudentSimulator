
<h4>CLASSEMENT</h4>

<div class="myClassement">
	
	<div class="people" id="menu">
		<img src="img/icon_blank.jpg" width="30" height="30"/>
	    <li>Prénom</li>
	    <li>Nom</li>
	    <li>Quête</li>
	    <li>Points</li>
	</div>
	
	<?php
	$i=1;
	foreach($classement as $n){
	        echo '
	        <div class="people">
	        		<img src="img/icon_win'.$i.'.png" width="30" height="30"/>
	                <li>'.$n['prenom'].'</li>
	                <li>'.$n['nom'].'</li>
	                <li>'.$n['id_quest'].'</li>
	                <li>'.$n['points'].'</li>
	        </div>';
	        $i++;
	}
	?>
	
</div>