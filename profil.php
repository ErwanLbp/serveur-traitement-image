<?php

session_start();

if(!isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

include('connectBDD.php');

?> 


<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
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

	<?php 
		$req = $bdd->prepare('SELECT * FROM images ima, profil pro WHERE ima.auteur=pro.idProfil AND pro.pseudo=?');
		$req->execute(array($_SESSION['pseudo']));

echo '<br>'.exec('pwd').'<br>';
		while($donnee = $req->fetch()){
			echo '<div class="col-lg-2"><img class="img-rounded" src="'.$donnee['chemin'].'" alt="'.$donnee['chemin'].'"></div>';
		}

	?>

	</article> 

	<?php include('footer.php'); ?>
</body>
</html>
