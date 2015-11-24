<?php 

session_start();

if(!isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

if(!isset($_POST)){
	header('Location: index.php');
	exit();
}

if(!isset($_SESSION['cheminImage'])){
	header('Location: index.php');
	exit();
}

include('connectBDD.php');


$dossierDest = 'sauvegardes/'.$_SESSION['pseudo'];
$nomComplet = $_POST['nomImage'].$_POST['extension'];
$req = $bdd->prepare('SELECT ima.nom FROM profil pro, images ima WHERE pro.idProfil=ima.auteur AND pro.idProfil=? AND ima.nom=?');
$req->execute(array($_SESSION['idProfil'],$nomComplet));

$donnee = $req->fetch();
$req->closeCursor();

if($donnee)
	$resultat = 'Vous avez déja nommé une image <span style="color:#D90115">'.$_POST['nomImage'].$_POST['extension'].'</span>'.'. Trouvez un autre nom';
else{
	$chemin = $dossierDest.'/'.$_POST['nomImage'].$_POST['extension'];

	if(!is_dir($dossierDest)){
		mkdir('sauvegardes/'.$_SESSION['pseudo']);
		exec('chmod 777 sauvegardes/'.$_SESSION['pseudo']);
	}

	if(copy($_SESSION['cheminImage'], $chemin)){
		$resultat = 'Bravo l\'image a été sauvegardée sur le serveur avec succès au nom : <span style="color:#C85A17">'.$_POST['nomImage'].$_POST['extension'].'</span>';
		$req = $bdd->prepare('INSERT INTO images VALUES (\'\',?,?,?)');
		$req->execute(array($chemin, $_SESSION['idProfil'], $nomComplet));
		exec('convert '.$chemin.' '.mb_strcut($chemin, 0, strlen($chemin)-4).'.jpg');
	}
	else
		$resultat = 'Echec de la sauvegarde !';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Traitement d'Image</title>
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
		<div class="row">
			<h1 class="col-lg-12" style="text-align:center; word-wrap: break-word;"><?php echo $resultat; ?></h1>
		</div>
		<div class="row">	
			<div class="col-lg-offset-4 col-lg-4">
				<a class="btn btn-success btn-block" href="index.php">Retour à l'accueil</a>
			</div>
		</div>
	</article>
	
	<?php include('footer.php'); ?>
</body>
</html>