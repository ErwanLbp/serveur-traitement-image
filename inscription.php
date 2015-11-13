<?php 
session_start();

if(isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

include('connectBDD.php');

$erreur = "";
if(isset($_POST['pseudo']) and $_POST['pseudo'] != ""){

	$req = $bdd->prepare('SELECT pseudo FROM profil WHERE pseudo = ? AND mdp = ?');
	$req->execute(array($_POST['pseudo'],$_POST['mdp']));

	$donnee = $req->fetch();
	$req->closeCursor();

	if($donnee['pseudo'] == $_POST['pseudo'])
		$erreur = "Pseudo deja utilisé";
	else{
		$req = $bdd->prepare('INSERT INTO profil VALUES(\'\',?,?)');
		$req->execute(array($_POST['pseudo'],$_POST['mdp']));
		$_SESSION['pseudo'] = $_POST['pseudo'];
		header('Location: index.php');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="styleGeneral.css">
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
	<link rel="stylesheet" type="text/css" href="connexion.css">
</head>
<body>
	<div class="container">
	<?php include ('header.php'); ?>

	<article class="row">

		<form method="post" action="inscription.php">
			<div class="formulaire col-lg-offset-4 col-sm-4" id="formulaireInscription">

					<?php if(!empty($erreur)) echo '<div class="row"><span class="col-lg-12">'.$erreur.'</span></div>'; ?>

					<div class="row">
						<label for="pseudo" class="col-lg-offset-4 col-lg-4">Pseudo</label>
					</div>
					<div class="row">
						<input class="col-lg-offset-3 col-lg-6" type="text" id="pseudo" name="pseudo"/>
					</div>

					<div class="row">
						<label for="mdp" class="col-lg-offset-4 col-lg-4"><br>Mot de passe</label>
					</div>
					<div class="row">
						<input class="col-lg-offset-3 col-lg-6" type="password" id="mdp" name="mdp"/>
					</div>

					<div class="row">
						<br>
						<input type="submit" class="bouton col-lg-offset-4 col-lg-4" value="Inscription">
					</div>
				</div>
		</form>
	</article>

	<?php include('footer.php'); ?>
</div>
</body>
</html>