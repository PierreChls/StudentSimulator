<html>
	<head>
		<meta charset=utf-8>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
		<title>Jerome Simulator</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<link rel="stylesheet" href="css/style.css">
		<!--<script src="js/bootstrap.js"></script>-->
		
		<meta name="author" content="Pierre CHARLES" />
		<meta property="og:url" content="http://perso-etudiant.univ-mlv.fr/~pcharles/ens/JeromeSimulator" /> 
		<meta property="og:image" content="/img/bg-home.jpg" />
		<meta property="og:site_name" content="Jerome Simulator" />
		<meta property="og:description" content="Projet IMAC1 - BDD" />
		
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
		    $("#nav_classement").click(function(){
		        $("#gamecontent").load("refreshGameClassement.php");
		    });
		});
	</script>
	  
	<body>
		<div class="header">
			<p>Bonjour <?php echo ($_SESSION['login']) ?>!</p>
			<a href="./logout.php">Déconnexion</a>
		</div>