<?php
session_start();
require '../include/cobdd.php';
if(isset($_SESSION['pseudo'])){
	if(isset($_POST['valide'])){ 
	$req = $conbd->prepare('INSERT INTO bonsplan(TitreBP,Pseudo,ResumeBP,datebp,image)VALUES (:Titre,:Pseudo,:Contenu,now(),:image)');
	$res=$req->execute(array(
			'Titre' => $_POST['Titre'],
			'Pseudo' => $_SESSION['pseudo'],
			'image' => $_POST['image'],
			'Contenu' => $_POST['Contenu']));
		header('Location : ../bp.php');
	}
}
?>