<html>
	<head>
		<meta charset=utf-8>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
		<title>Student Simulator</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<link rel="stylesheet" href="css/style.css">
		<!--<script src="js/bootstrap.js"></script>-->
	</head>
	
	<script>
		 
		 $(document).ready(function(){
		 	$("#nav_gamecontent").click(function(){
		        $("#gamecontent").load("refreshGameContent.php");
		    });
		    $("#nav_harem").click(function(){
		        $("#gamecontent").load("refreshGameHarem.php");
		    });
		    $("#nav_recompenses").click(function(){
		        $("#gamecontent").load("refreshGameRecompenses.php");
		    });
		});
	</script>
	  
	<body>
		<div class="header">
			<?php
				echo '<p>Bonjour '.$_SESSION['login'].'!</p>';
			?>
			<a href="./logout.php">Déconnexion</a>
		</div>