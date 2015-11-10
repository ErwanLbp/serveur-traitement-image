<?php 
session_start();

if(isset($_SESSION['pseudo']))
	header("Location: index.php");
	
include('connectBDD.php');

$erreur = "";
if(isset($_POST['pseudo'])){

	$req = $bdd->prepare('SELECT pseudo FROM profil WHERE pseudo = ? AND mdp = ?');
	$req->execute(array($_POST['pseudo'],$_POST['mdp']));

	$donnee = $req->fetch();
	$req->closeCursor();

	if($donnee['pseudo'] == $_POST['pseudo'])
		$erreur = "Pseudo deja utilisé";
	else{
		$req = $bdd->prepare('INSERT INTO profil VALUES(\'\',?,?)');
		$req->execute(array($_POST['pseudo'],$_POST['mdp']));
		$_SESSION['pseudo'] = $_POST['pseudo'];
		header('Location: index.php');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styleGeneral.css">
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
</head>
<body>
	<?php include ('header.php'); ?>

	<article>

	<form method="post" action="inscription.php">
		<fieldset id="formulaireInscription">

			<br><br>
			<?php if(!empty($erreur)) echo '<span>'.$erreur.'</span><br><br>'; ?>

			<p>Remplissez tous les champs :</p>

			<label>Pseudo :	<input type="text" id="pseudo" name="pseudo"/>
			</label>

			<br><br>

			<label>Mot de passe : <input type="password" id="mdp" name="mdp"/>
			</label>
			
			<br><br><br>

			<input type="submit" class="bouton" value="Connexion"></input>
			<br><br>
	</form>
	</article>

		<?php include('footer.php'); ?>
	</body>
	</html>