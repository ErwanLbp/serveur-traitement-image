<?php

session_start();

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
</head>

<body>
	<?php include('header.php'); ?>	

	<article>

		<form method="post" action="upload.php" enctype="multipart/form-data">
			<fieldset>
				<legend>Download l'image</legend>
				<div id ="chercherImage">
					<p>Etape 1 : Chercher la photo à transformer</p>
					<input type="hidden" name="MAX_FILE_SIZE" value="taille">
					<input type ="file" name ="photo" size ="taille"><br><br>

				</div>
		</form>

		<form method="post" action="exec.php" enctype="multipart/form-data">
				<p>Etape 3 : Choisir la transformation</p>

				<div id ="formulaireTransfoDeBase">
					<input type ="submit" name ="algorithme" value ="binarisation">
					<input type ="submit" name ="algorithme" value ="niveauGris">
					<input type ="submit" name ="algorithme" value ="symetrieH">
					<input type ="submit" name ="algorithme" value ="symetrieV">
					<input type ="submit" name ="algorithme" value ="negatif">
					<input type ="submit" name ="algorithme" value ="ameliorationContraste">
					<input type ="submit" name ="algorithme" value ="lissage">
					<input type ="submit" name ="algorithme" value ="laplacien">
					<input type ="submit" name ="algorithme" value ="gradientSimple">
					<input type ="submit" name ="algorithme" value ="gradientSobel">
					<input type ="submit" name ="algorithme" value ="detectionContoursSobel"><br>
					<input type ="submit" name ="algorithme" value ="detectionContoursLaplacien"><br>
					<input type ="submit" name ="algorithme" value ="reductionBruit"><br>
				</div>

				<div id ="formulaireTransfoRedim">
					<input type ="radio" id="redimensionnement" name ="algorithme" value ="redimensionnement">Redimensionnement</option><br><br>
					<div id="redim">
						Abscisse du 1er point <input class="champNombre" type ="number" name ="x1" value ="0" min="0"><br>
						Ordonné du 1er point <input class="champNombre" type ="number" name ="y1" value ="0" min="0"><br><br>
						Abscisse du 2eme point <input class="champNombre" type ="number" name ="x2" value ="0" min="0"><br>
						Ordonné du 2eme point <input class="champNombre" type ="number" name ="y2" value ="0" min="0"><br><br>
					</div>
				</div>

				<div id ="formulaireTransfoCustom">
					<input id="masque" type ="radio" name ="algorithme" value ="masqueCustom">Masque Custom</option><br><br>
					<div id="masqueCustom">
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
				</div>

			</form>
		</fieldset>


		<fieldset id="download">
			<form method="post" action="download.php" enctype="multipart/form-data">
				<p>Etape 4 : Récupérer la photo transformée</p>
				<input type="submit" name="recuperer" value="Récupérer l'image">
			</form>
		</fieldset>

	</article>

	<?php include('footer.php'); ?>
</body>
</html>
