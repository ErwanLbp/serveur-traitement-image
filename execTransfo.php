<?php
session_start();

if( $_SESSION['algorithme'] === "redimensionnement"){
	exec('./STI '.basename($_SESSION['cheminImage']).' '.$_SESSION['algorithme'].' '.$_POST['x1'].' '.$_POST['y1'].' '.$_POST['x2'].' '.$_POST['y2']);
	unlink($dossier.basename($_SESSION['cheminImage']));
	header('location:index.php');
	exit();
}
else if( $_SESSION['algorithme'] === "masqueCutsom"){
	exec('./STI '.basename($_SESSION['cheminImage']).' '.$_SESSION['algorithme'].' '.$_POST['m1'].' '.$_POST['m2'].' '.$_POST['m3'].' '.$_POST['m4'].' '.$_POST['m5'].' '.$_POST['m6'].' '.$_POST['m7'].' '.$_POST['m8'].' '.$_POST['m9'].' '.'9');
	unlink($dossier.basename($_SESSION['cheminImage']));
	header('location:index.php');
	exit();
}
else{
	exec('./STI '.basename($_SESSION['cheminImage']).' '.$_SESSION['algorithme']);
	unlink($dossier.basename($_SESSION['cheminImage']));
	header('location:index.php');
	exit();
}


?>