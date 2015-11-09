<?php

session_start();

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
	exit();

}
else
	echo basename($nom);
?>