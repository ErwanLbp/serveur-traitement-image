<?php

session_start();

if(!isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

include('connectBDD.php');

?> 


<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="styleGeneral.css">
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
	<script type="text/javascript" src="fonctions.js"></script>
</head>

<body class="container">
	<?php include('header.php'); ?>	

	<article class="row" style="margin-top:5%;">

		<div class="col-lg-6">
			<?php 
			$req = $bdd->prepare('SELECT ima.chemin, ima.id, ima.nom FROM images ima, profil pro WHERE ima.auteur=pro.idProfil AND pro.idProfil=?');
			$req->execute(array($_SESSION['idProfil']));

			while($donnee = $req->fetch()){
				echo '<div class="col-lg-4">';
				echo '<a href="utiliserImage.php?id='.$donnee['id'].'"><img title="'.$donnee['nom'].'" style="width:100%" class="img-rounded" src="'.mb_strcut($donnee['chemin'], 0, strlen($donnee['chemin'])-4).'.jpg" alt="'.$donnee['chemin'].'" ></a>';
				echo '<a class="btn btn-danger btn-xs" style="position:absolute; top:0; left:15px" href="supprimerSonImage.php?id='.$donnee['id'].'">X</a>';
				echo '</div>';
			}
			$req->closeCursor();
			?>
		</div>
		<div class="col-lg-6 table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<caption><h4>Les transformations que vous avez chargé</h4></caption>
				<thead>
					<tr><th>Id</th><th>Nom</th><th>Description</th><th>Extension</th><th></th></tr>
				</thead>
				<tbody>
					<?php 
					$req = $bdd->prepare('SELECT tra.id, tra.nom, tra.description, tra.extension FROM transformations tra, profil pro WHERE tra.auteur=pro.idProfil AND pro.idProfil=?');
					$req->execute(array($_SESSION['idProfil']));

					while($donnee = $req->fetch())
						echo '<tr><td>'.$donnee['id'].'</td><td>'.$donnee['nom'].'</td><td>'.$donnee['description'].'</td><td>'.$donnee['extension'].'</td><td><a class="btn btn-danger btn-xs" href="supprimerSaTransfo.php?id='.$donnee['id'].'">X</a></td></tr>';
					$req->closeCursor();
					?>
				</tbody>
			</table>
		</div>
	</article> 

	<?php include('footer.php'); ?>
</body>
</html>
