<!-- Connection à la base de données -->
<?php 
try{ 
	// A changer si la connexion à phpmyadmin ne se fait pas avec ce login
	// $bdd = new PDO('mysql:host=<HOTE>;dbname=<NOM BDD>', '<LOGIN>', '<PASSWORD>');
	if ($_SERVER['SERVER_NAME'] = 'erwanlbp.koding.io') 
		$bdd = new PDO('mysql:host=localhost;dbname=site_STI', 'root', 'a1z2e3r4t5y6',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	elseif($_SERVER['SERVER_NAME'] = 'localhost')
		$bdd = new PDO('mysql:host=localhost;dbname=site_STI', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	else
		echo 'Probleme connexion BDD ! ';
}
catch(Exception $e){
	//Si il y a un problème on évite d'afficher le mot de passe, ca serait bete...
	die('Erreur : '.$e->getMessage());
}
?>
