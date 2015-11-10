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
			<div id="grandeDivDroite">
				<form method="post" action="upload.php" enctype="multipart/form-data">
					<div id ="chercherImage">
						<input type="hidden" name="MAX_FILE_SIZE" value="taille">
						<input type ="file" id="bouttonFile" name ="photo" size ="taille" onchange="this.form.submit()"><br><br>


					</div>
				</form>

				<div id="CanvasImage">
					<?php 
					if(isset($_SESSION['cheminImageJPG']))
						echo "<img src='".$_SESSION['cheminImageJPG']."' alt='".basename($_SESSION['cheminImage'])."'>";
					?>

				</div>

			</div>
		</form>

		<div id="grandeDivGauche">
			<form method="post" action="execTransfo.php" enctype="multipart/form-data">

				<div id ="formulaireTransfoDeBase">
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Binarisation">
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Niveau de gris">
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Symetrie Horizontale">
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Symetrie Verticale">
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Negatif">
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Amelioration du contraste">
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Lissage">
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Laplacien">
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Gradient Simple">
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Gradient Sobel">
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Detection contours Sobel"><br>
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Detection contours Laplacien"><br>
					<input class="buttonSubmit" type ="submit" name ="algorithme" value ="Reduction de bruit"><br>
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
					<input type ="button" id="masque" name ="algorithme" value ="Masque Custom" onclick="getElementById('masqueCustom').style.display='block'"><br><br>
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
