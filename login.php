<?php include 'login_verif.php'; ?>
<html>
	<head>
		<meta charset=utf-8>
		<title>Student Simulator</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<!--<script src="js/bootstrap.js"></script>-->
	</head>
	  
	<body>
		<div class="container">
		
			<h2 style="text-align:center; margin-bottom:50px;">Connexion/Enregistrement</h2>
		
			<FORM method=post action="login.php" style="width: 450px; margin: auto; margin-bottom: 50px; padding: 20px; background: #FFF; border: 2px solid rgb(224, 224, 224); border-radius: 5px;" class="form-horizontal" role="form">
				<fieldset>
					<legend style="text-align: center;">Connexion d'un utilisateur</legend>
					<div class="form-group">
						<label class="control-label col-sm-3" for="login">Login :</label>
						<div class="col-sm-5">
					       <input type="login" class="form-control" id="login" placeholder="Enter login" name="login">
					    </div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="login">Mot de passe :</label>
						<div class="col-sm-5">
					       <input type="password" class="form-control" id="password" placeholder="Enter password" name="mdp">
					    </div>
					</div>
					<INPUT type="submit" value="Envoyer" name="submit_connect" style="margin-left: 150px; margin-right: 150px;">
				</fieldset>
			</FORM>
			
			<FORM method=post action="login.php" style="width: 450px; margin: auto; margin-bottom: 50px; padding: 20px; background: #FFF; border: 2px solid rgb(224, 224, 224); border-radius: 5px;" class="form-horizontal" role="form">
				<fieldset>
					<legend style="text-align: center;">Enregistrement d'un utilisateur</legend>
					<div class="form-group">
						<label class="control-label col-sm-3" for="name">Nom :</label>
						<div class="col-sm-5">
					       <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
					    </div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="lastname">Prénom :</label>
						<div class="col-sm-5">
					       <input type="text" class="form-control" id="lastname" placeholder="Enter your lastname" name="lastname">
					    </div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="login_new">Login :</label>
						<div class="col-sm-5">
					       <input type="text" class="form-control" id="login_new" placeholder="Enter your login" name="login_new">
					    </div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="mdp_new">Mot de passe :</label>
						<div class="col-sm-5">
					       <input type="password" class="form-control" id="mdp_new" placeholder="Enter password" name="mdp_new">
					    </div>
					</div>
					<INPUT type="submit" value="Envoyer" name="submit_new_user" style="margin-left: 150px; margin-right: 150px;">
				</fieldset>
			</FORM>
			
		</div>
	</body>
</html>