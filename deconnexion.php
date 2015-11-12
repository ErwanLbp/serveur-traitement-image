<?php 
session_start();

//Pour éviter qu'un mec pas connecté accède à la page avec la barre URL
if(!isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

unlink($_SESSION['cheminImageJPG']);
unlink($_SESSION['cheminImage']);

//On vide les variables de session
$_SESSION = array(); 

//On supprime la session courante
session_destroy();

//On redirige vers la page d'accueil
header('Location: index.php');
?>