<?php 
session_start();

if(isset($_SESSION['pseudo']))
	header("Location: index.php");

$erreur = "Tout Va Bien";
if(isset($_POST['pseudo'])){

	include('connectBDD.php');

	$req = $bdd->prepare('SELECT pseudo FROM profil WHERE pseudo = ? AND mdp = ?');
	$req->execute(array($_POST['pseudo'],$_POST['mdp']));

	$donnee = $req->fetch();
	$req->closeCursor();

print_r($donnee);
	if(isset($donnee)){
		$_SESSION['pseudo'] = $donnee['pseudo'];
		header('Location: index.php');
	}
	else
		$erreur = "Erreur d'identification";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styleGeneral.css">
	<link rel="stylesheet" type="text/css" href="connexion.css">	
</head>
<body>

	<div class="illustration">
	<div class="i-large"></div>
	<div class="i-medium"></div>
	<div class="i-small"></div>
	</div>

	<article>
	<form method="post" action="connexion.php">
		<fieldset id="formulaireConnexion">

			<br><br>

			<label>Pseudo<br><br>
				<input type="text" id="pseudo" name="pseudo"/>
			</label>

			<br><br>

			<label>Mot de passe<br><br>
				<input type="password" id="mdp" name="mdp"/>
			</label>
			
			<br><br><br>

			<input type="submit" class="bouton" value="Connexion"></input>
			<br><br>
	</form>
	</article>

	</body>
	</html>