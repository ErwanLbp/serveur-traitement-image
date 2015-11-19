<?php 

session_start();

if(!isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

if(!isset($_SESSION['cheminImage'])){
	header('Location: index.php');
	exit();
}

include('connectBDD.php');

$dossierDest = 'sauvegardes/'.$_SESSION['pseudo'];

if(!is_dir($dossierDest))
	exec('mkdir sauvegardes/'.$_SESSION['pseudo']);

if(copy($_SESSION['cheminImage'], $dossierDest.'/'.$_POST['nomImage'].$_POST['extension']))
	$resultat = 'Bravo l\'image a été sauvegardée sur le serveur avec succès au nom : '.$_POST['nomImage'].$_POST['extension'];
else
	$resultat = 'Echec de l\'upload !';
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

<body>
	<?php include('header.php'); ?>	

	<input class="buttonSubmit" type = "button" value="Retour à l'accueil" onclick="document.location.href='index.php'">
	<input class="buttonSubmit" type = "button" value="Ne plus jamais revenir sur ce site" onclick="document.location.href='index.php'">


	<?php include('footer.php'); ?>
</body>
</html>