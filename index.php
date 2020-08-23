<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Benjam Corner - Accueil</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<!-- Menu -->
	<?php
		include'include/nav.php';
	?>
	<!-- Atricle et bon plan -->
	<section>
		<article>
			<h1> Les 5 derniers articles </h1>
			<?php
				// Connexion à la base de données
				require 'include/cobdd.php';

				// Récupération des 5 derniers articles
				$a='SELECT * FROM article INNER JOIN theme ON article.numT = theme.numT
				INNER JOIN utilisateur ON article.Pseudo = utilisateur.pseudo 
				INNER JOIN categorie ON utilisateur.CodeCat = categorie.CodeCat
				ORDER BY NumArt DESC LIMIT 5';
				$req=$conbd->query($a);
				
				
				

				// Affichage de chaque article
				while ( $res = $req -> fetch()){
					?>
					<div class="art">
					<?php
						echo '<p><h3>'.$res['Titre'].' - '.$res['nomtheme'].'</h3>';
						echo '<div class=imag><img src="'.$res['image'].'" width="400" height="200"/></div>';
						echo '<br>'.$res['Contenu'].'<br><br>';
						echo '<div class=pseu>'.$res['Pseudo'].' - ('.$res['nom'].') '.$res['dateArt'].'</p></div>';
						
						$b='SELECT * FROM commentaire WHERE numArt='.$res['NumArt'];
						$req2=$conbd->query($b);
				
							while ( $res2 = $req2 -> fetch()){
							echo '<p> Avis de '.$res2['Pseudo'].' - : '.$res2['avis'].'</p>';
							
						}
					

					 ?>
					 
					 </div>
					 <?php
				}
			?> 
		</article>
		<aside>
		<h1> Bon plan </h1>
			<?php
				$ch='SELECT * FROM bonsplan 
				INNER JOIN utilisateur ON bonsplan.Pseudo = utilisateur.pseudo 
				INNER JOIN categorie ON utilisateur.CodeCat = categorie.CodeCat
				ORDER BY NumBP DESC LIMIT 5';
				$req=$conbd->query($ch);

				// Affichage de bon plan
				while ( $res = $req -> fetch()){
			?>
				<div class="bonP">
					<?php
						echo '<p><h4>'.$res['TitreBP'].'</h4>';
						echo '<div class=imag><img src="'.$res['image'].'" width="150" height="100"/></div><br>';
						echo $res['ResumeBP'].'<br><br>';
						echo $res['Pseudo'].' - ('.$res['nom'].') '.$res['datebp'].' </p>';
					 ?>
					 </div>
				<?php
				}
			?> 
		</aside>
	</section>
	<?php
		include 'include/footer.php';
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