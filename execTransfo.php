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

switch ($_POST['algorithme']) {
	case 'Binarisation':
	$_POST['algorithme'] = 'binarisation';
	break;
	case 'Niveau de gris':
	$_POST['algorithme'] = 'niveauGris';
	break;
	case 'Symetrie Horizontale':
	$_POST['algorithme'] = 'symetrieH';
	break;
	case 'Symetrie Verticale':
	$_POST['algorithme'] = 'symetrieV';
	break;
	case 'Negatif':
	$_POST['algorithme'] = 'negatif';
	break;
	case 'Amelioration du contraste':
	$_POST['algorithme'] = 'ameliorationContraste';
	break;
	case 'Lissage':
	$_POST['algorithme'] = 'lissage';
	break;
	case 'Laplacien':
	$_POST['algorithme'] = 'laplacien';
	break;
	case 'Gradient Simple':
	$_POST['algorithme'] = 'gradientSimple';
	break;
	case 'Gradient Sobel':
	$_POST['algorithme'] = 'gradientSobel';
	break;
	case 'Detection contours Sobel':
	$_POST['algorithme'] = 'detectionContoursSobel';
	break;
	case 'Detection contours Laplacien':
	$_POST['algorithme'] = 'detectionContoursLaplacien';
	break;
	case 'Reduction de bruit':
	$_POST['algorithme'] = 'reductionBruit';
	break;
	case 'Redimensionnement':
	$_POST['algorithme'] = 'redimensionnement';
	break;
	case 'Masque Custom':
	$_POST['algorithme'] = 'masqueCustom';
	break;
	default:
	$_POST['algorithme'] = '';
	break;
}

if( $_POST['algorithme'] === "redimensionnement")
	exec('./STI '.basename($_SESSION['cheminImage']).' '.$_POST['algorithme'].' '.$_POST['x1'].' '.$_POST['y1'].' '.$_POST['x2'].' '.$_POST['y2']);
else if( $_POST['algorithme'] === "masqueCutsom")
	exec('./STI '.basename($_SESSION['cheminImage']).' '.$_POST['algorithme'].' '.$_POST['m1'].' '.$_POST['m2'].' '.$_POST['m3'].' '.$_POST['m4'].' '.$_POST['m5'].' '.$_POST['m6'].' '.$_POST['m7'].' '.$_POST['m8'].' '.$_POST['m9'].' '.'9');
else
	exec('./STI '.basename($_SESSION['cheminImage']).' '.$_POST['algorithme']);

unlink($_SESSION['cheminImage']);

if (($_POST['algorithme'] == 'binarisation') || ($_POST['algorithme'] == 'detectionContoursSobel') || ($_POST['algorithme'] == 'detectionContoursLaplacien'))
	$_SESSION['cheminImage'] = mb_strcut(basename($_SESSION['cheminImage']), 0, strlen(basename($_SESSION['cheminImage'])) -4) .'.pbm';
if (($_POST['algorithme'] == 'niveauGris') || ($_POST['algorithme'] == 'laplacien') || ($_POST['algorithme'] == 'reductionBruit'))
	$_SESSION['cheminImage'] = mb_strcut(basename($_SESSION['cheminImage']), 0, strlen(basename($_SESSION['cheminImage'])) -4) .'.pgm';

$_SESSION['cheminImage'] = 'Images/'.$_POST['algorithme'].'_'.basename($_SESSION['cheminImage']);
exec('convert '.$_SESSION['cheminImage'].' '.mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.jpg');
unlink($_SESSION['cheminImageJPG']);
$_SESSION['cheminImageJPG'] = mb_strcut($_SESSION['cheminImage'], 0, strlen($_SESSION['cheminImage'])-4).'.jpg';
header('location:index.php');
?>