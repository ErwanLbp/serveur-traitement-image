<?php
session_start();

switch ($_POST['algorithme']) {
	case 'Binarisation':
	$_SESSION['algorithme'] = 'binarisation';
	break;
	case 'Niveau de gris':
	$_SESSION['algorithme'] = 'niveauGris';
	break;
	case 'Symetrie Horizontale':
	$_SESSION['algorithme'] = 'symetrieH';
	break;
	case 'Symetrie Verticale':
	$_SESSION['algorithme'] = 'symetrieV';
	break;
	case 'Negatif':
	$_SESSION['algorithme'] = 'negatif';
	break;
	case 'Amelioration du contraste':
	$_SESSION['algorithme'] = 'ameliorationContraste';
	break;
	case 'Lissage':
	$_SESSION['algorithme'] = 'lissage';
	break;
	case 'Laplacien':
	$_SESSION['algorithme'] = 'laplacien';
	break;
	case 'Gradient Simple':
	$_SESSION['algorithme'] = 'gradientSimple';
	break;
	case 'Gradient Sobel':
	$_SESSION['algorithme'] = 'gradientSobel';
	break;
	case 'Detection contours Sobel':
	$_SESSION['algorithme'] = 'detectionContoursSobel';
	break;
	case 'Detection contours Laplacien':
	$_SESSION['algorithme'] = 'detectionContoursLaplacien';
	break;
	case 'Reduction de bruit':
	$_SESSION['algorithme'] = 'reductionBruit';
	break;
	default:
	$_SESSION['algorithme'] = '';
	break;
}

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