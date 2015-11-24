<?php 
session_start();

//Pour éviter qu'un mec pas connecté accède à la page avec la barre URL
if(!isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

if(!isset($_GET)){
	header('Location: index.php');
	exit();
}

include('connectBDD.php');

$req = $bdd->prepare('SELECT * FROM images WHERE id =? AND auteur=?');
$req->execute(array($_GET['id'],$_SESSION['idProfil']));
$donnee = $req->fetch();
$req->closeCursor();

if($donnee){
	
	unlink($_SESSION['cheminImageJPG']);
	unlink($_SESSION['cheminImage']);

	unset($_SESSION['cheminImage']);
	unset($_SESSION['cheminImageJPG']);

	$cheminSauvegarde = 'sauvegardes/'.$_SESSION['pseudo'].'/'.$donnee['nom'];
	$cheminImages = 'Images/'.$donnee['nom'];

	rename($cheminSauvegarde, $cheminImages);
	rename(mb_strcut($cheminSauvegarde, 0, strlen($cheminSauvegarde)-4).'.jpg', mb_strcut($cheminImages, 0, strlen($cheminImages)-4).'.jpg');

	$_SESSION['cheminImage'] = $cheminImages;
	$_SESSION['cheminImageJPG'] = mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.jpg';

	$req = $bdd->prepare('DELETE FROM images WHERE id =?');
	$req->execute(array($_GET['id']));
}

header('Location: index.php');
?>