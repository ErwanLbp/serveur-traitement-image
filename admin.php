<?php 

session_start();

if(!isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

if($_SESSION['pseudo'] != "admin"){
	header("Location: index.php");
	exit();
}

if(!isset($_POST)){
	header('Location: index.php');
	exit();
}

include('connectBDD.php');

$resultat = "";

if(isset($_POST['action'])){
	if($_POST['action'] == 'transfo'){

		$resultat = "Suppression : </br>";

		$req = $bdd->query('SELECT nom FROM transformations');
		while($donnee = $req->fetch()){
			unlink('transformations/'.$donnee['nom']);
			$resultat .= $donnee['nom'].'</br>';
		}
		$req->closeCursor();

		$bdd->exec('DELETE FROM transformations');
	}


}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="styleGeneral.css">
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
	<script type="text/javascript" src="fonctions.js"></script>
</head>

<body class="container">
	<?php include('header.php'); ?>	
	
	<article class="row" style="margin-top:5%;">
		<div class="col-lg-3">
			<form method="post" action="admin.php" class="well">
				<input type="hidden" name="action" value="transfo">
				<input class="btn btn-danger btn-block" type="submit" value="Reset transformations" title="Suppime toutes les transformations chargées sur le serveur">
			</form>
		</div>

		<div class="col-lg-3">
			<form method="post" action="admin.php" class="well">
				<input type="hidden" name="action" value="images">
				<input class="btn btn-danger btn-block" type="submit" value="Reset images" title="Suppime toutes les images chargées sur le serveur">
			</form>
		</div>
	
		<div class="row">
			<div class="col-lg-12">
				<?php echo $resultat; ?>
			</div>
		</div>
	

	</article>
	
	<?php include('footer.php'); ?>
</body>
</html>