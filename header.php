<header class="row">
	<div class="col-lg-4"><a class="btn btn-primary" href="index.php">Accueil</a></div>

		<?php 
		// Si il est connecté on affiche son petit nom et son abonnement, et si c'est un admin on le met dans un bouton
		if (isset($_SESSION['pseudo'])) {
			echo '<div class="col-lg-offset-4 col-lg-4"><div class="btn-group pull-right">';
				echo "<div class='btn-group'><input type='button' class='btn btn-info' value='Profil de ".$_SESSION['pseudo']."' title='Accéder à votre profil' onclick='document.location.href=\"profil.php\"'></div>";
				if($_SESSION['pseudo'] == 'admin')
					echo '<div class="btn-group"><input type="button" class="btn btn-danger" title="Gérer la page admin" onclick="document.location.href=\'admin.php\'" value="Admin">';
				echo "<div class='btn-group'><input type='button' class='btn btn-warning' value='Deconnexion' title=\"Se déconnecter :'(\" onclick='document.location.href=\"deconnexion.php\"''></div>";
			echo "</div></div>";
		}

		?>
</header>