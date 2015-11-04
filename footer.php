<footer>
	<?php
	// On regarde si notre IP est enregistrées dans la table
	$retour = $bdd->query('SELECT COUNT(*) AS nbre_entrees FROM connectes WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
	$donnees = $retour->fetch();
	$retour->closeCursor();

	//Si non, on la met avec le temps de connection
	if ($donnees['nbre_entrees'] == 0)
		$bdd->query('INSERT INTO connectes VALUES(\'' . $_SERVER['REMOTE_ADDR'] . '\', ' . time() . ')');
	else //Si elle y est on actualise le temps connection 
	$bdd->query('UPDATE connectes SET timestamp=' . time() . ' WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');

	//On supprime les IP qui datent de plus de 5min, considérés comme partis
	$timestamp_5min = time() - (60 * 5);
	$bdd->query('DELETE FROM connectes WHERE timestamp < ' . $timestamp_5min);

	// On compte le nombre d'IP pour avoir le nombre de connectés
	$retour = $bdd->query('SELECT COUNT(*) AS nbre_entrees FROM connectes');
	$donnees = $retour->fetch();
	$retour->closeCursor();
	?>
	
	<!-- On affiche le nombre de connectés -->
	<div class="gauche">
		<p>
			<?php echo 'Vous êtes actuellement <strong>' . $donnees['nbre_entrees'] . '</strong> sur le site !'; ?>
		</p>
	</div>

	<!-- On affiche le copyright du site -->
	<div class="centre">
		Développé par la dream team</br> Copyrights © 2015-2016 Tous droits réservés
	</div>

	<!-- On met deux liens, pour nous contacter ou voir l'équipe de développement -->
	<div class="droite">
		<p>
			<a href="nousContacter.php">Nous contacter </a></li> | <a href="equipe.php">Equipe </a></li>
		</p>
	</div>
	
</footer>