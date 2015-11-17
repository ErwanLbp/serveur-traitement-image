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

<body>
	<div class="container">
		<?php include('header.php'); ?>	

		<article class="row">
			<div class="alignement col-lg-4">
				<form method="post" action="execTransfo.php" enctype="multipart/form-data">
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Lissage" value ="Lissage"></div>
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Négatif" value ="Negatif"></div>
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Binarisation" value ="Binarisation"></div>
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Niveau de gris" value ="Niveau de gris"></div>
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Symetrie Verticale" value ="Symetrie Verticale"></div>
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Symetrie Horizontale" value ="Symetrie Horizontale"></div>
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Amelioration du contraste" value ="Amelioration du contraste"></div>
				</form>
			</div>

			<div class="alignement col-lg-4">
				<div class="row">
					<input class="col-lg-2" type="button" name="reset" value="Reset" onclick="document.location.href='reset.php'">
					<div class="col-lg-8" id="chercherImage">
						<form method="post" action="upload.php" enctype="multipart/form-data">
							<input type="hidden" name="MAX_FILE_SIZE" value="taille">
							<input type ="file" name ="photo" size ="taille" onchange="this.form.submit()">
						</form>
					</div>
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

			<div class="alignement col-lg-4">
				<form method="post" action="execTransfo.php" enctype="multipart/form-data">
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Laplacien" value ="Laplacien"></div>
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Gradient Sobel" value ="Gradient Sobel"></div>
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Gradient Simple" value ="Gradient Simple"></div>
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Reduction de bruit" value ="Reduction de bruit"></div>
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Detection contours Sobel" value ="Detection contours Sobel"></div>
					<div class="row"><input class="buttonSubmit col-lg-offset-2 col-lg-8" type ="submit" name ="algorithme" title ="Detection contours Laplacien" value ="Detection contours Laplacien"></div>
					<div class="row"><input type ="button" class="buttonSubmit col-lg-offset-2 col-lg-8" id="redimensionnement" name ="algorithme" value ="Redimensionnement" onclick=afficherCacherRedimCustom('redim')></div>
					<div id="redim" style="display:none">
						<div class="row"><div class="col-lg-12">Abscisse du 1er point <input class="champNombre" type ="number" name ="x1" value ="0" min="0"></div></div>
						<div class="row"><div class="col-lg-12">Ordonné du 1er point <input class="champNombre" type ="number" name ="y1" value ="0" min="0"></div></div><br>
						<div class="row"><div class="col-lg-12">Abscisse du 2eme point <input class="champNombre" type ="number" name ="x2" value ="0" min="0"></div></div>
						<div class="row"><div class="col-lg-12">Ordonné du 2eme point <input class="champNombre" type ="number" name ="y2" value ="0" min="0"></div></div>
					</div>
					<div class="row"><input id="masque" type ="button" class="buttonSubmit col-lg-offset-2 col-lg-8" name ="algorithme" value ="Masque Custom" onclick=afficherCacherRedimCustom('masqueCustom')></div>
					<div id="masqueCustom" style="display:none">
						<p>Remplir la matrice suivante : </p>
						<input class="champNombre" type ="number" name ="m1" value ="0">
						<input class="champNombre" type ="number" name ="m2" value ="0">
						<input class="champNombre" type ="number" name ="m3" value ="0"><br>
						<input class="champNombre" type ="number" name ="m4" value ="0">
						<input class="champNombre" type ="number" name ="m5" value ="0">
						<input class="champNombre" type ="number" name ="m6" value ="0"><br>
						<input class="champNombre" type ="number" name ="m7" value ="0">
						<input class="champNombre" type ="number" name ="m8" value ="0">
						<input class="champNombre" type ="number" name ="m9" value ="0"><br><br>
					</div>
				</form>
			</div>
			
			<input type="button" name="recuperer" value="Récupérer" title="Télécharger l'image sur votre ordinateur" onclick="document.location.href='download.php'"><br>
			<input type="button" name="sauvegarder" value="Sauvegarder" title="Sauvegarder l'image sur le serveur" onclick=afficherCacher('sauvegarde')>
			<form method="post" action="sauvegarder.php" enctype="multipart/form-data" style="display:none" id="sauvegarde">
				<label>Renommer l'image: <input type="text" value="<?php if(isset($_SESSION['cheminImage'])) echo basename(mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4));?>" name="nomImage">
				</label>
				<input type="submit" value="OK!">
			</form>
		</article> 

		<?php include('footer.php'); ?>
	</div>
</body>
</html>
