<?php

session_start();

if(file_exists($_SESSION['cheminImage'])){
	$fichier=basename($_SESSION['cheminImage']);

	ob_start();
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Expires: 0');
	header('Content-Disposition: attachment; filename="'.basename($fichier).'"');
	header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	header('Content-Length: '. filesize($_SESSION['cheminImage']));
	ob_clean();
	readfile($_SESSION['cheminImage']);
	unlink($_SESSION['cheminImage']);
	session_destroy();
	exit();

}
else
	echo basename($_SESSION['cheminImage']);
?>