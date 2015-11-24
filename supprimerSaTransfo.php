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

//$req = $bdd->prepare('DELETE FROM images WHERE id =?');
//$req->execute(array($_POST['idImage']));

//requete pour savoir si c'est bien une des transfo du bon gars (nom et id)
//requete pour supprimer dans la bdd la transfo
//Suppression dans le dossier de transfo

header('Location: profil.php');
?>