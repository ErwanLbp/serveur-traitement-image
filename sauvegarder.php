<?php 

session_start();

if(!isset($_SESSION['cheminImage']))
	header('Location: index.php');

include('connectBDD.php');


?>