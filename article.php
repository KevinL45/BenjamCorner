<html>
<head>
	<meta charset="utf-8">
	<title>Projet - RGK</title>
	<link rel="stylesheet" href="css/article.css">
</head>

<body>
<!-- BARRE NAVIGATION -->
<?php include("include/nav.php"); ?>
	<!-- Millieu -->
<section>
<h1>Mes articles</h1>
	<article>
		<?php
			if(isset($_SESSION['pseudo'])){
				// Connexion à la base de données
				require 'include/cobdd.php';

				// Récupération des 5 derniers articles
				$ch='SELECT * FROM article ORDER BY id WHERE Pseudo='.$_POST['pseudo'];
				$req=$conbd->query($ch);

				// Affichage de chaque article
				while ( $res = $req -> fetch()){
					?>
					<div class="art">
					<?php
						echo '<p><h3>'.$res['Titre'].'</h3>'.
						$res['Contenu'].'<br><br>';
						echo '<div class=pseu>'.$res['Pseudo'].' - '.$res['Date'].' </p></div>';
					 ?>
					 </div>
					 <?php
				}
			}
		?> 
	</article>
</section>
<?php include 'include/footer.php'; ?>
</body>
</html>
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