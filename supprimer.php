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

unlink($_POST['chemin']);
unlink(mb_strcut($_POST['chemin'], 0, strlen($_POST['chemin'])-4).'.jpg');

$req = $bdd->prepare('DELETE FROM images WHERE id =?');
$req->execute(array($_POST['idImage']));

header('Location: profil.php');

?>