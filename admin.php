<?php 

session_start();

if(!isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

if($_SESSION['pseudo'] != "admin"){
	header("Location: index.php");
	exit();
}

if(!isset($_POST)){
	header('Location: index.php');
	exit();
}

include('connectBDD.php');

$resultat = "";

if(isset($_GET['idProfil']) && $_SESSION['idProfil'] != $_GET['idProfil']){
	
	$req = $bdd->prepare('SELECT chemin FROM images ima, profil pro WHERE ima.auteur=pro.idProfil AND pro.idProfil=?');
	$req->execute(array($_GET['idProfil']));
	while ($donnee = $req->fetch()){
		unlink($donnee['chemin']);
		unlink(mb_strcut($donnee['chemin'], 0, strlen($donnee['chemin'])-4).'.jpg');
	}
	$req->closeCursor();

	$req = $bdd->prepare('DELETE FROM images WHERE auteur=?');
	$req->execute(array($_GET['idProfil']));


	$req = $bdd->prepare('SELECT pseudo FROM profil WHERE idProfil=?');
	$req->execute(array($_GET['idProfil']));
	$donnee = $req->fetch();
	$req->closeCursor();
	rmdir('sauvegardes/'.$donnee['pseudo']);


	$req = $bdd->prepare('SELECT nom FROM transformations WHERE auteur=?');
	$req->execute(array($_GET['idProfil']));	
	while ($donnee = $req->fetch())
		unlink('transformations/'.$donnee['nom']);
	$req->closeCursor();

	$req = $bdd->prepare('DELETE FROM transformations WHERE auteur=?');
	$req->execute(array($_GET['idProfil']));


	$req = $bdd->prepare('DELETE FROM profil WHERE idProfil=?');
	$req->execute(array($_GET['idProfil']));
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="styleGeneral.css">
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
	<script type="text/javascript" src="fonctions.js"></script>
</head>

<body class="container">
	<?php include('header.php'); ?>	
	
	<article class="row" style="margin-top:5%;">
		
		<div class="row"><?php echo $resultat; ?></div>

		<div class="col-lg-4 table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<caption><h4>Tous les profils</h4></caption>
				<thead>
					<tr><th>Id</th><th>Pseudo</th><th>Mdp</th><th></th></tr>
				</thead>
				<tbody>
					<?php
					$req = $bdd->query('SELECT idProfil,pseudo,mdp FROM profil');

					while($donnee = $req->fetch())
						echo '<tr><td>'.$donnee['idProfil'].'</td><td>'.$donnee['pseudo'].'</td><td>'.$donnee['mdp'].'</td><td><a class="btn btn-danger btn-xs" href="admin.php?idProfil='.$donnee['idProfil'].'">X</a></td></tr>';
					$req->closeCursor();
					?>
				</tbody>
			</table>
		</div>
		
		<div class="col-lg-8 table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<caption><h4>Toutes les transformations</h4></caption>
				<thead>
					<tr><th>Id</th><th>Nom</th><th>Description</th><th>Extension</th><th>Auteur</th><th></th></tr>
				</thead>
				<tbody>
					<?php 
					$req = $bdd->query('SELECT tra.id, tra.nom, tra.description, tra.extension, pro.pseudo FROM transformations tra, profil pro WHERE tra.auteur=pro.idProfil');

					while($donnee = $req->fetch())
						echo '<tr><td>'.$donnee['id'].'</td><td>'.$donnee['pseudo'].'</td><td>'.$donnee['nom'].'</td><td>'.$donnee['description'].'</td><td>'.$donnee['extension'].'</td><td><a class="btn btn-danger btn-xs" href="supprimerSaTransfo.php?id='.$donnee['id'].'">X</a></td></tr>';
					$req->closeCursor();
					?>
				</tbody>
			</table>
		</div>


	</article>
	
	<?php include('footer.php'); ?>
</body>
</html>