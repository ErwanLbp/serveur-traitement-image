<!-- Connection à la base de données -->
<?php 
	try{ //On se connecte à la BDD, les messages d'erreur seront mieux expliqués
	if($_SERVER['SERVER_NAME'] == 'localhost')
	{
		$bdd = new PDO('mysql:host=localhost;dbname=site_STI', 'root', '');
	}			
	elseif($_SERVER['SERVER_NAME'] == 'cocplanifieur.netii.net')
	{
		$bdd = new PDO('mysql:host=mysql7.000webhost.com;dbname=a8602457_STI', 'a8602457_sti', 'a1z2e3r4t5y6',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	else
	{
		throw new Exception('Oula comment tu as eu ce site toi ?');
	}

}
catch(Exception $e){
		//Si il y a un problème on évite d'afficher le mot de passe, ca serait bete...
	die('Erreur : '.$e->getMessage());
}
?>