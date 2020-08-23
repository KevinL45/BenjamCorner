<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Benjam Corner - Contact</title>
	<link rel="stylesheet" href="css/styleCO.css">
</head>

<body>
	<!-- Menu -->
	<?php
	require 'include/nav.php';
	?>
	<!-- Formulaire de contacte -->
	<form method="POST" action="traitementCO.php">
	<fieldset>
	<legend>
		<h2> Nous contacter </h2>
	</legend>
        <label for="nom">Nom :</label> <br>
        <input type="text" id="nom" name="nom" placeholder="Entrer votre nom"> 
		<br><br>
        <label for="mail">Mail :</label> <br>
        <input type="email" id="mail" name="user_mail" placeholder="exemple@mail.com"> 
		<br><br>
		<p>
        <label for="msg">Message :</label> <br>
		<textarea name="ameliorer" id="ameliorer" rows="10" cols="50" placeholder="Entrez votre message"></textarea>  		<p>
		<br><br>
		<button type="submit" value="Envoyer" name="valide">Envoyer</button>
	</fieldset>
	</form>
	<?php
	require 'include/footer.php';
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