<?php
session_start();
require '../include/cobdd.php';
if(isset($_SESSION['pseudo'])){
	if(isset($_POST['valide'])){ 
		$req = $conbd->prepare('INSERT INTO article(Titre,Contenu,Pseudo,numT,dateArt, image, temps)VALUES (:titre,:contenu,:pseudo,:theme,now(),:image,:temps)');
		$res=$req->execute(array(
			'titre' => $_POST['Titre'],
			'pseudo' => $_SESSION['pseudo'],
			'theme' => $_POST['theme'],
			'image' => $_POST['image'],
			'temps' => $_POST['temps'],
			'contenu' => $_POST['Contenu']));
		header('Location : ../marticle.php');
	}
}
?>