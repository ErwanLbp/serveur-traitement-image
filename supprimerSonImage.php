<?php 
session_start();

//Pour éviter qu'un mec pas connecté accède à la page avec la barre URL
if(!isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

if(!isset($_POST)){
	header('Location: index.php');
	exit();
}

include('connectBDD.php');

$req = $bdd->prepare('SELECT * FROM images WHERE id =? AND auteur=?');
$req->execute(array($_GET['id'],$_SESSION['idProfil']));
$donnee = $req->fetch();
$req->closeCursor();

if($donnee){
	
	unlink($donnee['chemin']);
	unlink(mb_strcut($donnee['chemin'], 0, strlen($donnee['chemin'])-4).'.jpg');

	$req = $bdd->prepare('DELETE FROM images WHERE id =?');
	$req->execute(array($_GET['id']));
}

header('Location: profil.php');
?>