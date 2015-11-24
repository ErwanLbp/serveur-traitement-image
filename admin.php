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
		
		<div class="col-lg-12 table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<caption><h4></h4></caption>
				<thead>
					<tr><th>Id</th><th>Pseudo</th><th>Mdp</th><th></th></tr>
				</thead>
				<tbody>
					<?php
					$req = $bdd->query('SELECT idProfil,pseudo,mdp FROM profil');

					while($donnee = $req->fetch())
						echo '<tr><td>'.$donnee['idProfil'].'</td><td>'.$donnee['pseudo'].'</td><td>'.$donnee['mdp'].'</td><td><a class="btn btn-danger btn-xs" href="admin.php?idProfil='.$donnee['idProfil'].'">X</a></td></tr>';
					$req->closeCursor();
					?>
				</tbody>
			</table>
		</div>

	</article>
	
	<?php include('footer.php'); ?>
</body>
</html>