<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Benjam Corner - Annonces</title>
	<link rel="stylesheet" href="css/annonce.css">
</head>

<body>
	<!-- Menu -->
	<?php
		include'include/nav.php';
	?>
	<!-- Barre de rechercher -->
	<form method="post" action="annonce.php"> 
	<div id="titre">
		ANNONCES
	</div>
	<div id="recherche">
		<label for="recherche">Recherche </label> 
        <input type="search" name="recherche" placeholder="Mot-clé" /> 
		<label>Catégorie </label> 
		<SELECT name="cat" size="1">
		<option value="all" id="all"> -- Catégorie --</option>
		<?php
			$req=$conbd ->query('SELECT * FROM theme');
			while ($res = $req->fetch()){
		?>
			<option value="<?php echo $res['numT'];?>" ><?php echo $res['nomtheme'];?></option>
		<?php
			}
		?>
		</SELECT>
		  <button type="submit" value="Inscription" name="valide">Rechercher</button>
	</div>
	</form>
	<!-- Affichage des annonce -->
	<section>
	<?php 
	require 'include/cobdd.php';

	if(empty($_POST['valide'])){
			$ch='SELECT * FROM annonce';
			$req=$conbd->query($ch);
			
			// Affichage de chaque article
			while ( $res2 = $req -> fetch()){
					?>
					<div class="ann">
					<?php
						echo $res2['contenu'].'<br><br>';
						echo '<div class=pseu>'.$res2['Pseudo'].'</p></div>';
					 ?>
					 </div>
	<?php
			} // Fin du While
	// Si la catégorie est rentré
	} else {
		$choix=$_POST['cat'];
		if (isset($_POST['recherche']) AND $choix=="all"){
					$ch='SELECT * FROM annonce WHERE contenu LIKE "%'.$_POST['recherche'].'%"';
					$req=$conbd->query($ch);
				
					while ( $res4 = $req -> fetch() ){
					?>
						<div class="ann">
						<?php
							echo $res4['contenu'].'<br><br>';
							echo '<div class=pseu>'.$res4['Pseudo'].'</p></div>';
						 ?>
						 </div>
	<?php
					} // Fin du WHILE
				}
			else {
				if(isset($_POST['recherche']) AND isset($_POST['cat'])){
					$ch='SELECT * FROM annonce WHERE contenu LIKE "%'.$_POST['recherche'].'%" AND numT="'.$_POST['cat'].'"';
					$req=$conbd->query($ch);
			
					while ( $res5 = $req -> fetch() ){
						?>
							<div class="ann">
							<?php
							echo $res5['contenu'].'<br><br>';
							echo '<div class=pseu>'.$res5['Pseudo'].'</p></div>';
						 ?>
						 </div>
	<?php
					} // Fin du while
				} // Fin du if
			else{
				if (isset($_POST['cat']) ){
				$ch = 'SELECT * FROM annonce WHERE numT='.$_POST['cat'].'';
				$req=$conbd->query($ch);
				
					while ( $res3 = $req -> fetch() ){
					?>
						<div class="ann">
						<?php
							echo $res3['contenu'].'<br><br>';
							echo '<div class=pseu>'.$res3['Pseudo'].'</p></div>';
						 ?>
						 </div>
	<?php
					} // Fin du WHILE	
				}
			}
		}
		
	}
	?>
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
</html>