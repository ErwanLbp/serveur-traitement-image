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
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Lissage" value ="Lissage"></div>
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Négatif" value ="Negatif"></div>
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Binarisation" value ="Binarisation"></div>
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Niveau de gris" value ="Niveau de gris"></div>
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Symetrie Verticale" value ="Symetrie Verticale"></div>
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Symetrie Horizontale" value ="Symetrie Horizontale"></div>
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Amelioration du contraste" value ="Amelioration du contraste"></div>
					</div>
				</div>
			</form>

			<div class="col-lg-6">
				<div class="row">
					<input class="btn btn-danger btn-xs" type="button" name="reset" value="Reset" onclick="document.location.href='reset.php'">
					<form method="post" action="upload.php" enctype="multipart/form-data" id="chercherImage" style="display:inline-block;">
						<input type="hidden" name="MAX_FILE_SIZE" value="taille">
						<input type ="file" name ="photo" size ="taille" onchange="this.form.submit()">
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

			<form method="post" action="execTransfo.php" enctype="multipart/form-data">
				<div class="col-lg-3" style="text-align:center">
					<div class="btn-group-vertical">
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Laplacien" value ="Laplacien"></div>
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Gradient Sobel" value ="Gradient Sobel"></div>
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Gradient Simple" value ="Gradient Simple"></div>
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Reduction de bruit" value ="Reduction de bruit"></div>
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Detection contours Sobel" value ="Detection contours Sobel"></div>
						<div class="btn-group"><input class="btn btn-primary" type ="submit" name ="algorithme" title ="Detection contours Laplacien" value ="Detection contours Laplacien"></div>

						<div class="btn-group"><input class="btn btn-primary" type ="button" name ="algorithme" title ="Redimensionnement" id="redimensionnement"  value ="Redimensionnement" onclick=afficherCacherRedimCustom('redim')></div>
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

						<div class="btn-group"><input class="btn btn-primary" type ="button" name ="algorithme" title ="Masque custom" value ="Masque Custom" id="masque" onclick=afficherCacherRedimCustom('masqueCustom')></div>
						<div id="masqueCustom" style="display:none" class="well">
							<div class="form-group">
								<p>Remplir la matrice suivante: </p>
								<input class="champNombre" type ="number" name ="m1" value ="0">
								<input class="champNombre" type ="number" name ="m2" value ="0">
								<input class="champNombre" type ="number" name ="m3" value ="0"><br>
								<input class="champNombre" type ="number" name ="m4" value ="0">
								<input class="champNombre" type ="number" name ="m5" value ="0">
								<input class="champNombre" type ="number" name ="m6" value ="0"><br>
								<input class="champNombre" type ="number" name ="m7" value ="0">
								<input class="champNombre" type ="number" name ="m8" value ="0">
								<input class="champNombre" type ="number" name ="m9" value ="0">
							</div>
							<input class="btn btn-primary" type ="submit" name ="algorithme" title ="Masque Custom" value ="Masque Custom">
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="row" id="save">
			<div class="col-lg-12">
				<div class="btn-group">
					<a class="btn btn-warning" title="Télécharger l'image sur votre ordinateur" onclick="document.location.href='download.php'">Telecharger</a>
					<a class="btn btn-success" title="Sauvegarder l'image sur le serveur" onclick=afficherCacher('sauvegarde')>Sauvegarder</a>
				</div>
				<form class="form-horizontal" method="post" action="sauvegarder.php" enctype="multipart/form-data" style="display:none" id="sauvegarde" style="display:inline-block;">
					<label for="nomImage">Renommer l'image: </label>
					<input id="nomImage" type="text" maxlength="50" value="<?php if(isset($_SESSION['cheminImage'])) echo basename(mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4));?>" name="nomImage">
					<input type="hidden" name="extension" value="<?php if(isset($_SESSION['cheminImage'])) echo mb_strcut($_SESSION['cheminImage'], strlen($_SESSION['cheminImage'])-4 , strlen($_SESSION['cheminImage']));?>">
					<input type="submit" class="btn btn-success btn-sm" value="OK!">
				</form>
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
