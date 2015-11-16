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
			<div class="col-lg-offset-4 col-sm-4">
				<form method="post" action="connexion.php" class="well">
					<legend>Connexion</legend>
					<?php if(!empty($erreur)) echo '<div class="has-error"><p class="help-block">'.$erreur.'</p></div>'; ?>

					<div class="form-group">
						<label for="pseudo">Pseudo</label>
						<input class="form-control" type="text" id="pseudo" name="pseudo"/>
					</div>
					<div class="form-group">
						<label for="mdp"><br>Mot de passe</label>
						<input class="form-control" type="password" id="mdp" name="mdp"/>
					</div>
					<input type="submit" class="btn btn-primary" value="Connexion">
					<input type="button" class="btn btn-primary" value="Inscription" onclick="document.location.href='inscription.php'">
				</form>
			</div>
		</article>
		<?php include('footer.php'); ?>
	</div>
</body>
</html>