<!-- Connection à la base de données -->
<?php 
	try{ //On se connecte à la BDD, les messages d'erreur seront mieux expliqués
		$bdd = new PDO('mysql:host=localhost;dbname=site_STI', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e){
		//Si il y a un problème on évite d'afficher le mot de passe, ca serait bete...
		die('Erreur : '.$e->getMessage());
	}
?>
