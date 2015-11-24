<?php 

session_start();

if(!isset($_SESSION['pseudo'])){
	header("Location: index.php");
	exit();
}

if(!isset($_POST)){
	header('Location: index.php');
	exit();
}

include('connectBDD.php');

$req = $bdd->prepare('SELECT tra.nom FROM transformations tra WHERE tra.nom=?');
$req->execute(array($_POST['nomTransfo']));

$donnee = $req->fetch();
$req->closeCursor();

if($donnee)
	$resultat = 'Vous avez déja nommé une transformation <span style="color:#D90115">'.$_POST['nomTransfo'].'</span>'.'. Trouvez un autre nom';
else{
	$chemin = 'transformations/'.$_POST['nomTransfo'];

	if(!is_dir('transformations/')){
		mkdir('transformations/');
		exec('chmod 777 transformations/');
	}

	if(move_uploaded_file($_FILES['transformation']['tmp_name'], $chemin)){
		exec('chmod 777 '.$chemin);
		$resultat = 'Bravo la transformation a été sauvegardée sur le serveur avec succès au nom : <span style="color:#C85A17">'.$_POST['nomTransfo'].'</span>';
		$req = $bdd->prepare('INSERT INTO transformations VALUES (\'\',?,?,?,?)');
		$req->execute(array($_POST['nomTransfo'], $_POST['extension'], $_SESSION['idProfil'], $_POST['description']));
	}
	else
		$resultat = 'Echec de l\'upload de la transformation !';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Traitement d'Image</title>
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
		<div class="row">
			<h1 class="col-lg-12" style="text-align:center; word-wrap: break-word;"><?php echo $resultat; ?></h1>
		</div>
		<div class="row">	
			<div class="col-lg-offset-4 col-lg-4">
				<a class="btn btn-success btn-block" href="index.php">Retour à l'accueil</a>
			</div>
		</div>
	</article>
	
	<?php include('footer.php'); ?>
</body>
</html>