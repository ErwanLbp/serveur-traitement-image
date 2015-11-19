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
	<link rel="stylesheet" href="bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="styleGeneral.css">
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
	<script type="text/javascript" src="fonctions.js"></script>
</head>

<body class="container">
	<?php include('header.php'); ?>	

	<article class="row" style="margin-top:5%;">

	<?php 
		$req = $bdd->prepare('SELECT ima.auteur, ima.chemin, ima.id FROM images ima, profil pro WHERE ima.auteur=pro.idProfil AND pro.idProfil=?');
		$req->execute(array($_SESSION['idProfil']));



		while($donnee = $req->fetch()){
			echo '<div class="col-lg-2" style="border:solid;">';
			echo '<img class="img-rounded" src="'.$donnee['chemin'].'" alt="Photos" >';
			echo '<form method="post" action="supprimer.php" enctype="multipart/form-data">';
			echo '	<input type="hidden" name="chemin" value="'.$donnee['chemin'].'">';
			echo '	<input type="hidden" name="idImage" value="'.$donnee['id'].'">';
			echo '	<input type="submit" value="Supprimer">';
			echo '</form>';


			echo '</div>';
		}
		$req->closeCursor();
	?>

		
	</article> 

	<?php include('footer.php'); ?>
</body>
</html>
