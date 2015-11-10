<?php

session_start();

if(!isset($_SESSION['pseudo']))
	header("Location: connexion.php");

include('connectBDD.php');

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

			<!-- <div id="grandeDivGauche"> -->
				<form method="post" action="execTransfo.php" enctype="multipart/form-data">

					<div id ="formulaireTransfoDeBase">
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Binarisation" value ="Binarisation">
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Niveau de gris" value ="Niveau de gris">
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Symetrie Horizontale" value ="Symetrie Horizontale">
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Symetrie Verticale" value ="Symetrie Verticale">
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Symetrie Verticale" value ="Negatif">
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Amelioration du contraste" value ="Amelioration du contraste">
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Lissage" value ="Lissage">
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Laplacien" value ="Laplacien">
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Gradient Simple" value ="Gradient Simple">
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Gradient Sobel" value ="Gradient Sobel">
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Detection contours Sobel" value ="Detection contours Sobel"><br>
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Detection contours Laplacien" value ="Detection contours Laplacien"><br>
						<input class="buttonSubmit" type ="submit" name ="algorithme" title ="Reduction de bruit" value ="Reduction de bruit"><br>
					</div>

					<div id ="formulaireTransfoRedim">
						<input type ="button" id="redimensionnement" name ="algorithme" value ="Redimensionnement" onclick="getElementById('redim').style.display='block'"><br><br>
						<div id="redim">
							Abscisse du 1er point <input class="champNombre" type ="number" name ="x1" value ="0" min="0"><br>
							Ordonné du 1er point <input class="champNombre" type ="number" name ="y1" value ="0" min="0"><br><br>
							Abscisse du 2eme point <input class="champNombre" type ="number" name ="x2" value ="0" min="0"><br>
							Ordonné du 2eme point <input class="champNombre" type ="number" name ="y2" value ="0" min="0"><br><br>
						</div>
					</div>

					<div id ="formulaireTransfoCustom">
						<input id="masque" type ="button" name ="algorithme" value ="Masque Custom" onclick="getElementById('masqueCustom').style.display='block'"><br><br>
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
			<!-- </div> -->

			<div id="grandeDivDroite">
				<form method="post" action="reset.php">
					<div id="reset">
						<input type="submit" name="reset" value="Reset">
					</div>
				</form>

				<form method="post" action="upload.php" enctype="multipart/form-data">
					<div id="chercherImage">
						<input type="hidden" name="MAX_FILE_SIZE" value="taille">
						<input type ="file" name ="photo" size ="taille" onchange="this.form.submit()"><br><br>
					</div>
				</form>

				<div id="CanvasImage">
					<?php 
					if(isset($_SESSION['cheminImageJPG']))
						echo "<img src='".$_SESSION['cheminImageJPG']."' alt='".basename($_SESSION['cheminImage'])."'>";
					?>
				</div>
			</div>
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
