<?php

session_start();

if(!isset($_SESSION['pseudo'])){
	header("Location: connexion.php");
	exit();
}

include('connectBDD.php');

?> 


<!DOCTYPE html>
<html>
<head>
	<title>Traitement d'Image</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="styleGeneral.css">
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
	<script type="text/javascript" src="fonctions.js"></script>
</head>

<body class="container">
	<?php include('header.php'); ?>	

	<article class="row" style="margin-top:5%;">
		<div class="row">
			<form method="post" action="execTransfo.php" enctype="multipart/form-data">
				<div class="col-lg-3" style="text-align:center">
					<div class="btn-group-vertical">
						<?php
						$req = $bdd->prepare('SELECT pro.pseudo, tra.nom, tra.description FROM transformations tra, profil pro WHERE tra.auteur=pro.idProfil');
						$req->execute(array($_SESSION['idProfil']));

						while($donnee = $req->fetch())
							echo '<div class="btn-group"><input class="btn btn-primary" type ="submit" name="algorithme" title="Par: '.$donnee['pseudo'].'; '.$donnee['description'].'" value="'.$donnee['nom'].'"></div>';
						$req->closeCursor();
						?>
					</div>
				</div>
			</form>

			<div class="col-lg-6">
				<div class="row">
					<input class="btn btn-danger btn-xs" type="button" name="reset" title="Supprimer l'image sélectionnée" value="Reset" onclick="document.location.href='reset.php'">
					<form method="post" action="upload.php" enctype="multipart/form-data" id="chercherImage" style="display:inline-block;">
						<input type ="file" name ="photo" onchange="this.form.submit()">
					</form>
				</div>
				<div class="row">
					<div class="col-lg-12" id="CanvasImage">
						<?php 
						if(isset($_SESSION['cheminImageJPG'])){
							echo "<script type='text/javascript'>afficherCacher('chercherImage')</script>";
							echo "<img src='".$_SESSION['cheminImageJPG']."' alt='".basename($_SESSION['cheminImage'])."'>";
						}
						?>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="row">
					<div class="col-lg-12" style="text-align:center">
						<a class="btn btn-primary btn-block" name="algorithme" title="Redimensionner l'image" onclick=afficherCacher('redim')>Redimensionnement</a>
						<form method="post" action="execTransfo.php" enctype="multipart/form-data">
							<div id="redim" style="display:none" class="well">
								<div class="form-group">
									<div class="row">Abscisse 1er point <div class="pull-right input-group col-lg-1"><input type ="number" name ="x1" value ="0" min="0" style="text-align:right"><span class="input-group-addon">px</span></div></div>
									<div class="row">Ordonné 1er point <div class="pull-right input-group col-lg-1"><input type ="number" name ="y1" value ="0" min="0" style="text-align:right"><span class="input-group-addon">px</span></div></div>
								</div>
								<div class="form-group">
									<div class="row">Abscisse 2e point <div class="pull-right input-group col-lg-1"><input type ="number" name ="x2" value ="0" min="0" style="text-align:right"><span class="input-group-addon">px</span></div></div>
									<div class="row">Ordonné 2e point <div class="pull-right input-group col-lg-1"><input type ="number" name ="y2" value ="0" min="0" style="text-align:right"><span class="input-group-addon">px</span></div></div>
								</div>
								<input class="btn btn-primary" type ="submit" name ="algorithme" title ="Redimensionnement" value ="Redimensionnement">
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<a class="btn btn-info btn-block" title="Charger une nouvelle transformation sur le serveur" onclick="afficherCacherSaveNew('nvlTransfo')">Nouvelle transformation</a>
						<form class="well" method="post" action="nvlTransformation.php" enctype="multipart/form-data" style="display:none" id="nvlTransfo" style="display:inline-block;">
							<input type ="file" name ="transformation">
							<div class="form-group">
								<label for="nomTransfo">Renommer la transformation: </label>
							<input id="nomTransfo" type="text" maxlength="50" value="<?php if(isset($_SESSION['pseudo'])) echo 'Transfo_'.$_SESSION['pseudo'];?>" name="nomTransfo">
							</div>
							<div class="form-group">
								<label for="description">Description: </label>
								<input id="description" class="form-control" type="text" maxlength="200" value="Description" name="description">
							</div>
							<div class="form-group">
								<label for="extension">Extension de sortie: </label>
								<select id="extension" class="form-control" name="extension">
									<option value="egal">Ne change pas</option>
									<option value=".ppm">.ppm</option>
									<option value=".pgm">.pgm</option>
									<option value=".pbm">.pbm</option>
								</select>
							</div>
							<input type="submit" class="btn btn-success btn-sm" value="Charger !">
						</form>	
					</div>
				</div>
				<div id="save">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-success btn-block" title="Sauvegarder l'image sur le serveur" onclick="afficherCacherSaveNew('sauvegarde')">Sauvegarder</a>
							<form class="well" method="post" action="sauvegarder.php" enctype="multipart/form-data" style="display:none" id="sauvegarde" style="display:inline-block;">
								<label for="nomImage">Renommer l'image: </label>
								<input id="nomImage" type="text" maxlength="50" value="<?php if(isset($_SESSION['cheminImage'])) echo basename(mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4));?>" name="nomImage">
								<input type="hidden" name="extension" value="<?php if(isset($_SESSION['cheminImage'])) echo mb_strcut($_SESSION['cheminImage'], strlen($_SESSION['cheminImage'])-4 , strlen($_SESSION['cheminImage']));?>">
								<input type="submit" class="btn btn-success btn-sm" value="OK !">
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-warning btn-block" title="Télécharger l'image sur votre ordinateur" onclick="document.location.href='download.php'">Telecharger</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php 
		if(!isset($_SESSION['cheminImageJPG']))
			echo "<script type='text/javascript'>afficherCacher('save')</script>";
		?>
	</article> 

	<?php include('footer.php'); ?>
</body>
</html>
