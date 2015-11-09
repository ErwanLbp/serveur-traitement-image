<?php

session_start();

$dossier = 'Images/';
$_SESSION['cheminImage'] = $_FILES['photo']['name'];
// $tailleMax = 1000000;
$extensionsPossible = array('.ppm', '.pbm', '.pgm');
$extension = strrchr($_FILES['photo']['name'], '.'); 
$_SESSION['algorithme'] = $_POST['algorithme'];


if(!in_array($extension, $extensionsPossible)){
	$erreur = 'Rentrer un type ppm, pbm ou pgm';
}

if((!isset($photo)) && (!isset($erreur))){

	if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier.basename($_SESSION['cheminImage']))){
		exec('convert '.$_SESSION['cheminImage'].' '.mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.jpg');
		$_SESSION['cheminImageJPG'] = mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.jpg';
		header('Location: index.php');
	}
	else{
		unset($_SESSION['cheminImage'], $_SESSION['algorithme']);
		echo 'Echec de l\'upload !';
	}
}
else
	echo 'Erreur upload';

?>