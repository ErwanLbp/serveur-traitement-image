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

if(copy($_SESSION['cheminImage'], $dossierDest.'/'.$_POST['nomImage']))
	echo 'Bravo l\'image a été sauvegardée sur le serveur avec succès';
else{
	unset($_SESSION['cheminImage'], $_SESSION['algorithme']);
	echo 'Echec de l\'upload !';
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Traitement d'Image</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
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