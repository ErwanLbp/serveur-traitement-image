<?php
session_start();

if(!isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

if(!isset($_SESSION['cheminImage'])){
	header('Location: index.php');
	exit();
}

include('connectBDD.php');

$req = $bdd->prepare('SELECT extension FROM transformations WHERE nom=?');
$req->execute(array($_POST['algorithme']));
$donnee = $req->fetch();
$req->closeCursor();

if(isset($donnee['extension']) && $donnee['extension'] != "egal")
	$extension = $donnee['extension'];
else
	$extension = mb_strcut($_SESSION['cheminImage'], strlen($_SESSION['cheminImage'])-4, strlen($_SESSION['cheminImage']));

$nomSansExt = basename(mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4));

if($_POST['algorithme'] == "redimensionnement")
	exec('./transformations/redimensionnement '.basename($_SESSION['cheminImage']).' redimensionnement_'.$nomSansExt.$extension.' '.$_POST['x1'].' '.$_POST['y1'].' '.$_POST['x2'].' '.$_POST['y2']);
else
	exec('./transformations/'.$_POST['algorithme'].' '.basename($_SESSION['cheminImage']).' '.$_POST['algorithme'].'_'.$nomSansExt.$extension);

unlink($_SESSION['cheminImage']);

$_SESSION['cheminImage'] = 'Images/'.$_POST['algorithme'].'_'.$nomSansExt.$extension;

unlink($_SESSION['cheminImageJPG']);
exec('convert '.$_SESSION['cheminImage'].' '.mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.jpg');
$_SESSION['cheminImageJPG'] = mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.jpg';

header('location:index.php');
?>