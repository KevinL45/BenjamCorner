<html>
<head>
	<meta charset="utf-8">
	<title>Benjam Corner - Creation d'un bon plan</title>
	<link rel="stylesheet" href="css/styleI.css">
</head>

<body>
<!-- BARRE NAVIGATION -->
<?php include("include/nav.php"); ?>
	<!-- Millieu -->
<?php
	if(isset($_SESSION['pseudo'])){
		echo'
			<form action="form/form_bonsplans" method="post">
				<h1>Création d\'un bon plan</h1><br>
				<label>Titre bon plan</label><br>
				<input type="text"
				id="titre" name="Titre" placeholder="Titre du bon plan" required><br><br>
				<label>Image</label><br>
				<input type="texte" name="image" id="image" placeholder="Saisir url de l\'image" /><br><br>
				<label >Contenu</label><br>
				<textarea id="contenu" name="Contenu" rows="10" cols="40" placeholder="Contenu du bon plan" required></textarea><br><br>
				</div>
				<input type="submit" value="Créer le bon plan" name="valide" />
				</form>
				';
			require 'include/footer.php';
	}
	else{
		echo '<div id="erreur"> Erreur <br> Il faut vous connectez pour accéder à cette page ! </div>';
	}
?>
</body>
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- Défilement annonce -->
<script type="text/javascript">
  var id = "annonce"; // id du div conteneur
  var vitesse = 30; // en ms
  var pas = 5; // en px
  var div, sp;
  window.onload=function() {
    div = document.getElementById(id);
    sp = div.getElementsByTagName("div")[0];

    div.style.height = sp.offsetHeight+"px";
    sp.style.left = div.offsetWidth+"px";
    setTimeout(defile,vitesse);
  };
   
  function defile() {
    sp.style.left = (parseInt(sp.style.left,10) - pas)+"px";
    if(parseInt(sp.style.left,10)+sp.offsetWidth < 0) {
      sp.style.left = div.offsetWidth+"px";
    }
    setTimeout(defile,vitesse);
  }
</script>