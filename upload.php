<?php

session_start();

if(!isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

if(isset($_SESSION['cheminImage'])){
	header('Location: index.php');
	exit();
}

$dossier = 'Images/';
$_SESSION['cheminImage'] = $dossier.$_FILES['photo']['name'];
$extensionsPossible = array('.ppm', '.pbm', '.pgm');
$extension = strrchr($_FILES['photo']['name'], '.'); 


if(!in_array($extension, $extensionsPossible)){
	$erreur = 'Rentrez un type ppm, pbm ou pgm';
}

if($erreur == ""){
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier.basename($_SESSION['cheminImage']))){
		exec('convert '.$_SESSION['cheminImage'].' '.mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.jpg');
		$_SESSION['cheminImageJPG'] = mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.jpg';
		header('Location: index.php');
		exit();
	}
}

echo $erreur;
unset($_SESSION['cheminImage']);
echo '</br><input type="button" value="Retour à l\'accueil" onclick="document.location.href=\'index.php\'">';

?>