<?php

session_start();

if (($_SESSION['algorithme'] == 'binarisation') || ($_SESSION['algorithme'] == 'detectionContoursSobel') || ($_SESSION['algorithme'] == 'detectionContoursLaplacien')) {
	$_SESSION['cheminImage'] = mb_strcut(basename($_SESSION['cheminImage']), 0, strlen(basename($_SESSION['cheminImage'])) -4) .'.pbm';
}
if (($_SESSION['algorithme'] == 'niveauGris') || ($_SESSION['algorithme'] == 'laplacien') || ($_SESSION['algorithme'] == 'reductionBruit')) {
	$_SESSION['cheminImage'] = mb_strcut(basename($_SESSION['cheminImage']), 0, strlen(basename($_SESSION['cheminImage'])) -4) .'.pgm';
}

$nom='./Images/'.$_SESSION['algorithme'].'_'.basename($_SESSION['cheminImage']);

if(file_exists($nom)){
	$fichier=basename($nom);

	ob_start();
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Expires: 0');
	header('Content-Disposition: attachment; filename="'.basename($fichier).'"');
	header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	header('Content-Length: '. filesize($nom));
	ob_clean();
	readfile($nom);
	unlink($nom);
	session_destroy();
	exit();

}
else
	echo basename($nom);
?>