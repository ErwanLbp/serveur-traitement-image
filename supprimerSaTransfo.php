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

$req = $bdd->prepare('SELECT * FROM transformations WHERE id =? AND auteur=?');
$req->execute(array($_GET['id'],$_SESSION['idProfil']));
$donnee = $req->fetch();
$req->closeCursor();

if($donnee){
	
	unlink('transformations/'.$donnee['nom']);

	$req = $bdd->prepare('DELETE FROM transformations WHERE id =?');
	$req->execute(array($_GET['id']));
}

header('Location: profil.php');
?>