<?php
	session_start();
	require 'cobdd.php';
// on vérifie que la variable de session identifiant l'utilisateur existe
	if (isset($_SESSION['Pseudo'])) {
		$req = $conbd -> prepare('SELECT * FROM utilisateur WHERE Pseudo=:pseudo');
		$res=$req->execute(array('pseudo'=>$_POST['Pseudo']));
	if($res=$req->fetch()){
		$pseudo=$res['Pseudo'];
	}
}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Projet - RGK</title>
	<link rel="stylesheet" href="css/nav.css">
</head>

<header>
</header>
	<!-- TEXTE -->
<div id="annonce">
	<div id="msg">
<?php
	if(isset($_SESSION['pseudo'])) {
		echo'Bienvenue '.$_SESSION['pseudo'].'! ';
	}
	else{
		echo 'Bienvenue sur Benjam\' Corner';
	}
?>
	</div>
</div>
<br>
<!-- MENU -->
<div id="menu">
<?php
	if(isset($_SESSION['pseudo'])) {
	echo'
		<ul>
			<li><a href="index.php">ACCUEIL</a></li>
			<li><a href="#">ARTICLES</a>
				<ul>
					<li><a href="marticle.php">Mes articles</a></li>
					<li><a href="carticle">Créer un article</a></li>
				</ul>
			</li>
			<li><a href="#">BON PLAN</a>
				<ul>
					<li><a href="bp.php">Mes Bons Plans</a></li>
					<li><a href="cbp.php">Créer un Bon plan</a></li>
				</ul>
			</li>
			<li><a href="annonce.php">ANNONCES</a></li>
			<li><a href="contact.php">CONTACT</a></li>
			<li><a href="deconnexion.php">DECONNEXION</a></li>
		</ul>
			';
	}
	else{
		echo'
			<ul>
				<li><a href="index.php">ACCUEIL</a></li>
				<li><a href="#">ARTICLES</a>
				<ul>
					<li><a href="marticle.php">Mes articles</a></li>
					<li><a href="carticle">Créer un article</a></li>
				</ul>
				<li><a href="#">BON PLAN</a>
				<ul>
					<li><a href="carticle.php">Mes Bons Plans</a></li>
					<li><a href="cbp.php">Créer un Bon plan</a></li>
				</ul>
				</li>
				<li><a href="annonce.php">ANNONCES</a></li>
				<li><a href="contact.php">CONTACT</a></li>
				<li><a href="connexion.php">CONNEXION</a></li>
				<li><a href="inscription.php">INSCRIPTION</a></li>
			</ul>
			';
		}
  ?>
</div>
</html>