<?php

session_start();

?> 


<!DOCTYPE html>
<html>
<head>
	<title>Traitement d'Image</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
	<script type="text/javascript" src="fonctions.js"></script>
</head>

<body>
	
	<h1>Serveur de traitement d'image</h1>

	<!-- 	Premier formulaire pour toutes les transformations qui ont pas besoin d'argument  -->
	<fieldset>
		<legend>Pas d'idée de légende ...</legend>
		<form method="post" action="upload.php" enctype="multipart/form-data">
			<p>Etape 1 : Choisir la transformation</p>

			<div id ="formulaireTransfoDeBase">
				<input type ="radio" name ="algorithme" value ="binarisation">Binarisation</option><br>
				<input type ="radio" name ="algorithme" value ="niveauGris">Niveau de gris</option><br>
				<input type ="radio" name ="algorithme" value ="symetrieH">Symétrie horizontale</option><br>
				<input type ="radio" name ="algorithme" value ="symetrieV">Symétrie verticale</option><br>
				<input type ="radio" name ="algorithme" value ="negatif">Négatif</option><br>
				<input type ="radio" name ="algorithme" value ="Amélioration du contraste">Amélioration du contraste</option><br>
				<input type ="radio" name ="algorithme" value ="lissage">Lissage</option><br>
				<input type ="radio" name ="algorithme" value ="laplacien">Laplacien</option><br>
				<input type ="radio" name ="algorithme" value ="gradientSimple">Gradient Simple</option><br>
				<input type ="radio" name ="algorithme" value ="gradientSobel">Gradient de Sobel</option><br>
				<input type ="radio" name ="algorithme" value ="detectionContoursSobel">Detection de contours avec Sobel</option><br>
				<input type ="radio" name ="algorithme" value ="detectionContoursLaplacien">Detection de contours avec le Laplacien</option><br>
				<input type ="radio" name ="algorithme" value ="reductionBruit">Reduction de bruit</option><br>
			</div>

			<div id ="formulaireTransfoRedim">
				<input type ="radio" name ="algorithme" value ="redimensionnement">Redimensionnement</option><br><br>
				<div id="redim">
					Abscisse du 1er point <input class="champNombre" type ="number" name ="x1" value ="0" min="0"><br>
					Ordonné du 1er point <input class="champNombre" type ="number" name ="y1" value ="0" min="0"><br><br>
					Abscisse du 2eme point <input class="champNombre" type ="number" name ="x2" value ="0" min="0"><br>
					Ordonné du 2eme point <input class="champNombre" type ="number" name ="y2" value ="0" min="0"><br><br>
				</div>
			</div>

			<div id ="formulaireTransfoCustom">
				<input type ="radio" name ="algorithme" value ="masqueCustom">Masque Custom</option><br><br>
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

			<div id ="chercherImage"
			<p>Etape 2 : Chercher la photo à transformer</p>
			<input type="hidden" name="MAX_FILE_SIZE" value="taille">
			<input type ="file" name ="photo" size ="taille"><br><br>

			<p>Etape 3 : Enjoy !</p>
			<input type ="submit" name ="valider" value ="Envoyer la photo">
		</div>
	</form>
</fieldset>


<fieldset id="download">
	<legend>Download l'image</legend>
	<form method="post" action="download.php" enctype="multipart/form-data">
		<p>Etape 4 : Récupérer la photo transformée</p>
		<input type="submit" name="recuperer" value="Récupérer l'image">
	</form>
</fieldset>


</body>
</html>
