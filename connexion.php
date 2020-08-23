<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Benjam Corner - Connexion</title>
	<link rel="stylesheet" href="css/styleC.css">
</head>

<body>
	<!-- Menu -->
	<?php
	require 'include/nav.php'
	?>
		<form action='form/form_connexion.php' method='post'>
	<fieldset>
		<legend>
		  <h2> CONNEXION </h2>
		</legend>
		  <br>
		  <div class="texte">
		  <label>Pseudo</label> <br>
		  <input type="text" class="form-control" name="Pseudo" placeholder="Entrez votre pseudo">
		  <br><br>
		  <label>Mot de passe</label> <br>
		  <input type="password" class="form-control" name="mdp" placeholder="Entrez votre mot de passe">
		<br> <br>
		<button type="submit" value="inscription" name="valide">Valider</button><br><br>
		<?php if (isset($_GET['inscription'])){
			echo $_GET['inscription'];
		}
		?>
	</fieldset>
	</div>
	</form>
	
	
	
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