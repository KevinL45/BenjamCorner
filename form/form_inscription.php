<?php 
require '../include/cobdd.php';
/*Cherche si un compte posséde le même pseudo ou le même email*/
if(isset($_POST['valide'])){
	$req= $conbd -> prepare('SELECT * FROM utilisateur where Pseudo ="'.$_POST['Pseudo'].'"OR Email ="'.$_POST['Email'].'"');
	$res=$req->execute(array(
			'pseudo' => $_POST['Pseudo'],
			'email' => $_POST['Email']
			));
			$res=$req->fetch();
	

/*Si aucun compte posséde le compte on crée le compte*/
if ($res == false){ 
	$pass=$_POST['mdp'];
	$hash=password_hash($pass, PASSWORD_DEFAULT);
	$req = $conbd->prepare('INSERT INTO utilisateur(Pseudo,Nom,Prenom,Naissance,Adresse,Postal,Ville,Email,mdp, CodeCat)
	VALUES (:pseudo,:nom,:prenom,:naissance,:adresse,:postal,:ville,:email,:mdp, :code)');
	$res=$req->execute(array(
			'pseudo' => $_POST['Pseudo'],
			'nom' => $_POST['Nom'],
			'prenom' => $_POST['Prenom'],
			'naissance' => $_POST['Naissance'],
			'adresse' => $_POST['Adresse'],
			'postal' => $_POST['Postal'],
			'ville' => $_POST['Ville'],
			'email' => $_POST['Email'],
			'code' => $_POST['cat'],
			'mdp' => $hash));
			
		header('Location:../connexion.php');
	}else{
		header('Location:inscription.php?inscription=Identifiant ou Email déjà existant !');
}
}
?>