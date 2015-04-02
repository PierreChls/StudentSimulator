
<h4>CLASSEMENT</h4>

<div class="myClassement" style="overflow: auto; height: 278px; border-bottom: 2px solid #f2f2f2; margin-bottom: 9px;">
	
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
	        		<li style="width:30px;">'.$i.'</li>
	        		<li>'.$n['prenom'].'</li>
	                <li>'.$n['nom'].'</li>
	                <li>'.$n['id_quest'].'</li>
	                <li>'.$n['points'].'</li>
	        </div>';
	        $i++;
	}
	?>
	
</div>

<ul style="list-style: none;">
	<li id="searchMyClassement"><a href="page_classement.php">Où tu te trouve dans le classement?</a></li>
</ul>