<!-- Connection à la base de données -->
<?php 
try{ 
	// A changer si la connexion à phpmyadmin ne se fait pas avec ce login
	// $bdd = new PDO('mysql:host=<HOTE>;dbname=<NOM BDD>', '<LOGIN>', '<PASSWORD>');
	$bdd = new PDO('mysql:host=localhost;dbname=site_STI', 'root', 'a1z2e3r4t5y6');
}
catch(Exception $e){
	//Si il y a un problème on évite d'afficher le mot de passe, ca serait bete...
	die('Erreur : '.$e->getMessage());
}
?>
