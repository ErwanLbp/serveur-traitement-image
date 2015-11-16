<header class="row">
	<div class="col-lg-4"><a class="btn btn-primary" href="index.php">Accueil</a></div>

	<div class="col-lg-offset-4 col-lg-4">

		<?php 
		// Si il est connecté on affiche son petit nom et son abonnement, et si c'est un admin on le met dans un bouton
		if (isset($_SESSION['pseudo'])) {

			//Son pseudo
			echo '<div class="login">'. $_SESSION['pseudo'] . '</br>';
			if($_SESSION['pseudo'] == 'admin')
			//Un bouton si c'est un admin, comme ca il accede à la page admin
				echo '<input type="button"  class="bouton" onclick="document.location.href=\'admin.php\'" value="Admin">';

			echo "<input type='button' value='deconnexion' onclick='document.location.href=\"deconnexion.php\"''>";
		}

		?>
	</div>
</header>