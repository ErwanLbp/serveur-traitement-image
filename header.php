<header>

	<div class="gauche"></div>
	
	<!-- Notre super logo -->
	<div class="centre"><a href="index.php">Serveur de traitement d'image</a></div>
	
	<div class="droite">
	
		<?php 
		// Si il est connecté on affiche son petit nom et son abonnement, et si c'est un admin on le met dans un bouton
		if (isset($_SESSION['pseudo'])) {

			//Son pseudo
			echo '<div class="login">'. $_SESSION['pseudo'] . '</br>';

			//Son abonnement
			if($_SESSION['abonnement'] == 'admin')
			//Un bouton si c'est un admin, comme ca il accede à la page admin
				echo '<input type="button"  class="bouton" onclick="document.location.href=\'admin.php\'" value="Admin">';
			else if ($_SESSION['abonnement'] == 'abonne'){
				echo $_SESSION['abonnement'];
				echo '<br><input type="button"  class="bouton" onclick="document.location.href=\'desabo.php\'" value="Se désabonner">';
			}
			else{
			//Un bouton pour s'abonner
				echo $_SESSION['abonnement'] ;	
				echo '<br><input type="button"  class="bouton" onclick="document.location.href=\'abo.php\'" value="S\'abonner !">'.'</div>';
			}
		}
		?>
	</div>
</header>