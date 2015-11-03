<?php

session_start();

$dossier = 'Images/';
$_SESSION['nomImage'] = basename($_FILES['photo']['name']);
// $tailleMax = 1000000;
$extensionsPossible = array('.ppm', '.pbm', '.pgm');
$extension = strrchr($_FILES['photo']['name'], '.'); 
$_SESSION['algorithme'] = $_POST['algorithme'];


if(!in_array($extension, $extensionsPossible)){
	$erreur = 'Rentrer un type ppm, pbm ou pgm';
}

if((!isset($photo)) && (!isset($erreur))){

	if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier.$_SESSION['nomImage'])){

		if( $_SESSION['algorithme'] === "redimensionnement"){
			exec('./STI '.$_SESSION['nomImage'].' '.$_SESSION['algorithme'].' '.$_POST['x1'].' '.$_POST['y1'].' '.$_POST['x2'].' '.$_POST['y2']);
			unlink($dossier.$_SESSION['nomImage']);
			header('location:index.php');
			exit();
		}
		if( $_SESSION['algorithme'] === "masqueCutsom"){
			exec('./STI '.$_SESSION['nomImage'].' '.$_SESSION['algorithme'].' '.$_POST['m1'].' '.$_POST['m2'].' '.$_POST['m3'].' '.$_POST['m4'].' '.$_POST['m5'].' '.$_POST['m6'].' '.$_POST['m7'].' '.$_POST['m8'].' '.$_POST['m9'].' '.'9');
			unlink($dossier.$_SESSION['nomImage']);
			header('location:index.php');
			exit();
		}
		else{
			exec('./STI '.$_SESSION['nomImage'].' '.$_SESSION['algorithme']);
			unlink($dossier.$_SESSION['nomImage']);
			header('location:index.php');
			exit();
		}
	}
	else{
		echo 'Echec de l\'upload !';
	}
}
else{
	echo 'Erreur upload';
}

?>