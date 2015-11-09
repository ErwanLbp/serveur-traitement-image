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

		<fieldset>
			<form method="post" action="upload.php" enctype="multipart/form-data">
				<legend>Download l'image</legend>
				<div id ="chercherImage">
					<p>Etape 1 : Chercher la photo à transformer</p>
					<input type="hidden" name="MAX_FILE_SIZE" value="taille">
					<input type ="file" name ="photo" size ="taille"><br><br>
					<input type ="submit" name="recuperer" value ="Recup"><br>
				</div>
			</form>

			<div id="CanvasImage">
				<?php 
				if(isset($_SESSION['cheminImageJPG']))
					echo "<img src='".$_SESSION['cheminImageJPG']."' alt='".basename($_SESSION['cheminImage'])."'>";
				else
					echo "<p>Chargez une image</p>";
				?>
			</div>

			<form method="post" action="execTransfo.php" enctype="multipart/form-data">
				<p>Etape 3 : Choisir la transformation</p>

				<div id ="formulaireTransfoDeBase">
					<input type ="submit" name ="algorithme" value ="Binarisation">
					<input type ="submit" name ="algorithme" value ="Niveau de gris">
					<input type ="submit" name ="algorithme" value ="Symetrie Horizontale">
					<input type ="submit" name ="algorithme" value ="Symetrie Verticale">
					<input type ="submit" name ="algorithme" value ="Negatif">
					<input type ="submit" name ="algorithme" value ="Amelioration du contraste">
					<input type ="submit" name ="algorithme" value ="Lissage">
					<input type ="submit" name ="algorithme" value ="Laplacien">
					<input type ="submit" name ="algorithme" value ="Gradient Simple">
					<input type ="submit" name ="algorithme" value ="Gradient Sobel">
					<input type ="submit" name ="algorithme" value ="Detection contours Laplacien"><br>
					<input type ="submit" name ="algorithme" value ="detectionContoursLaplacien"><br>
					<input type ="submit" name ="algorithme" value ="Reduction de bruit"><br>
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
