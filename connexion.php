<?php 
session_start();

if(isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

include('connectBDD.php');

$erreur = "";
if(isset($_POST['pseudo'])){

	$req = $bdd->prepare('SELECT pseudo FROM profil WHERE pseudo = ? AND mdp = ?');
	$req->execute(array($_POST['pseudo'],$_POST['mdp']));

	$donnee = $req->fetch();
	$req->closeCursor();

	if($donnee['pseudo'] == $_POST['pseudo']){
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="styleGeneral.css">
	<link rel="stylesheet" type="text/css" href="connexion.css">	
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
</head>
<body>
	<div class="container">
	<?php include ('header.php'); ?>

	<article class="row">

		<form method="post" action="connexion.php">
			<fieldset id="formulaireConnexion">

				<br><br>
				<?php if(!empty($erreur)) echo '<span>'.$erreur.'</span><br><br>'; ?>


				<label>Pseudo<br><br>
					<input type="text" id="pseudo" name="pseudo"/>
				</label>

				<br><br>

				<label>Mot de passe<br><br>
					<input type="password" id="mdp" name="mdp"/>
				</label>

				<br><br><br>

				<input type="submit" class="bouton" value="Connexion">
				<input type="button" class="bouton" value="Inscription" onclick="document.location.href='inscription.php'">

				<br><br>
			</fieldset>
		</form>
	</article>

	<?php include('footer.php'); ?>
	</div>
</body>
</html>