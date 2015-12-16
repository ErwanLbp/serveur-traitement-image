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

$_SESSION['cheminImage'] = 'Images/'.$_FILES['photo']['name'];
$extensionsPossible = array('.ppm', '.pbm', '.pgm', '.jpg', '.jpeg', '.png', '.bmp', '.gif','.JPG', '.JPEG', '.PNG', '.BMP', '.GIF');
$extensionPixmap = array('.ppm', '.pbm', '.pgm');
$extension = strrchr($_FILES['photo']['name'], '.'); 

$erreur = "";

if(!in_array($extension, $extensionsPossible)){
	$erreur = 'Type de fichier non conforme';
}

if($erreur == ""){
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $_SESSION['cheminImage'])){
		exec('convert '.$_SESSION['cheminImage'].' '.mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.jpg');
		$_SESSION['cheminImageJPG'] = mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.jpg';

		if(!in_array($extension, $extensionPixmap)){
			exec('convert '.$_SESSION['cheminImage'].' '.mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.ppm');
			unlink($_SESSION['cheminImage']);
			$_SESSION['cheminImage'] = mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.ppm';
		}

		header('Location: index.php');
		exit();
	}
}

echo $erreur;
unset($_SESSION['cheminImage']);
echo '</br><input type="button" value="Retour à l\'accueil" onclick="document.location.href=\'index.php\'">';

?>