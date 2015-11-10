<?php 
session_start();

//Pour éviter qu'un mec pas connecté accède à la page avec la barre URL
if(!isset($_SESSION['pseudo']))
	header('Location: index.php');

unlink($_SESSION['cheminImageJPG']);
unlink($_SESSION['cheminImage']);

unset($_SESSION['cheminImage']);
unset($_SESSION['cheminImageJPG']);

//On redirige vers la page d'accueil
header('Location: index.php');
?>