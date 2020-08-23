<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Benjam Corner - Mes articles</title>
	<link rel="stylesheet" href="css/styleMesArt.css">
</head>

<body>
	<!-- Menu -->
<?php
	require 'include/nav.php';
	if(isset($_SESSION['pseudo'])){
?>
<section>
<aside>
<h2>
<a href="carticle.php" > Créer un articles </a>
</h2>
</aside>
<article>
<?php
				// Connexion à la base de données
				require 'include/cobdd.php';

				// Récupération des 5 derniers articles
				$ch='SELECT * FROM article INNER JOIN theme ON article.numT = theme.numT
				WHERE Pseudo ="'.$_SESSION["pseudo"].'" ORDER BY NumArt DESC ';
				$req=$conbd->query($ch);

				// Affichage de chaque article
				if( $res = $req -> fetch()){
					while($res = $req -> fetch()){
						?>
						<div class="art">
						<?php
							echo '<p><h3>'.$res['Titre'].' - '.$res['nomtheme'].'</h3>';
							echo '<div class=imag><img src="'.$res['image'].'" width="400" height="200"/></div>';
							echo '<br>'.$res['Contenu'].'<br><br>';
							echo '<div class=pseu>'.$res['Pseudo'].' - '.$res['dateArt'].'</p></div>';
						?>
						</div>
						<?php
					}
				}else
					echo '<div id="pascree">Vous n\'avez pas crée d\'article !</div>';
				require 'include/footer.php';
}
	else{
		echo '<div id="erreur"> Erreur <br> Il faut vous connectez pour accéder à cette page ! </div>';
	}
?> 
</article>
</section>	
</body>

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- D�filement annonce -->
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
