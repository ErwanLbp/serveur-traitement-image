<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styleGeneral.css">
	<link rel="stylesheet" type="text/css" href="connexion.css">	
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
</head>
<body>
	<div class="illustration">
	<div class="i-large"></div>
	<div class="i-medium"></div>
	<div class="i-small"></div>
</div>

	<?php include ('header.php'); ?>

	<article>
	<form method="post" action="connexion.php">
		<fieldset id="formulaireConnexion">

			<br><br>
			<label>Identifiant <span>*</span><br><br>
				<input type="text" id="identifiant" name="identifiant"/>
			</label>

			<br><br>

			<label>Mot de passe <span>*</span><br><br>
				<input type="password" id="mdp" name="mdp"/>
			</label>
			
			<br><br><br>

			<input type="submit" class="bouton" value="Connexion"></input>
			<br><br>
	</form>
	</article>

		<?php include('footer.php'); ?>
	</body>
	</html>