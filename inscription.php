<?php 
session_start();

if(isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

include('connectBDD.php');

$erreur = "";
if(isset($_POST['pseudo']) and $_POST['pseudo'] != ""){

	$req = $bdd->prepare('SELECT pseudo FROM profil WHERE pseudo = ?');
	$req->execute(array($_POST['pseudo']));

	$donnee = $req->fetch();
	$req->closeCursor();

	if($donnee['pseudo'] == $_POST['pseudo'])
		$erreur = "Pseudo deja utilisé";
	else{
		$req = $bdd->prepare('INSERT INTO profil VALUES(\'\',?,?)');
		$req->execute(array($_POST['pseudo'],$_POST['mdp']));

		$req = $bdd->prepare('SELECT idProfil FROM profil WHERE pseudo=?');
		$req->execute(array($_POST['pseudo']));
		$donnee = $req->fetch();
		$req->closeCursor();

		$_SESSION['pseudo'] = $_POST['pseudo'];
		$_SESSION['idProfil'] = $donnee['idProfil'];

		mkdir('sauvegardes/'.$_SESSION['pseudo']);
		exec('chmod 777 sauvegardes/'.$_SESSION['pseudo']);
		header('Location: index.php');
		exit();
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
			<div class="col-lg-offset-4 col-sm-4 formulaire">
				<form method="post" action="inscription.php" class="well">
					<legend>Inscription</legend>
					<?php if(!empty($erreur)) echo '<div class="has-error"><p class="help-block">'.$erreur.'</p></div>'; ?>

					<div class="form-group">
						<label for="pseudo">Pseudo</label>
						<input required class="form-control" type="text" id="pseudo" name="pseudo"/>
					</div>
					<div class="form-group">
						<label for="mdp"><br>Mot de passe</label>
						<input required class="form-control" type="password" id="mdp" name="mdp"/>
					</div>
					<input type="submit" class="btn btn-primary" value="Inscription">
				</form>
			</div>
		</form>
	</article>

	<?php include('footer.php'); ?>
</div>
</body>
</html>