<?php
session_start();
require '../include/cobdd.php';
if (isset($_POST['Pseudo']) AND isset ($_POST['mdp'])) {
	$pass=$_POST['mdp'];
    $req=$conbd -> prepare('SELECT Pseudo,mdp FROM utilisateur WHERE Pseudo=:pseudo');
	$res=$req->execute(array('pseudo'=>$_POST['Pseudo']));
    if($res=$req->fetch()){
		if(password_verify($pass, $res['mdp'])){
				$_SESSION['pseudo'] = $_POST['Pseudo'];
				header('Location:../index.php');
		}else
			header('Location:../connexion.php?inscription=Login reconnue mais mot de passe incorrect');
    }else
		header('Location:../connexion.php?inscription=Login incorrect');
}	
?>
