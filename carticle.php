<html>
<head>
	<meta charset="utf-8">
	<title>Benjam Corner - Creation d'un article</title>
	<link rel="stylesheet" href="css/styleI.css">
</head>

<body>
<!-- BARRE NAVIGATION -->
<?php include("include/nav.php"); ?>
	<!-- Millieu -->
<?php
	if(isset($_SESSION['pseudo'])){
		echo'
			<p>
				<form action="form/form_article.php" method="post">
				<h1>Création d\'article</h1><br>
				<label>Titre de l\'article</label><br>
				<input type="text" id="titre" name="Titre" placeholder="Titre de l\'article" required><br><br>
				
				<label>Image</label><br>
				<input type="texte" name="image" id="image" placeholder="Saisir url de l\'image" /><br><br>
				
				<label>Temps</label><br>
				<input type="texte" name="temps" id="temps" placeholder="Saisir le temps" /><br><br>
			
				
				<label>Théme</label> <br>
				<SELECT name="theme" size="1">'
				?>
				<?php
					$req=$conbd ->query('SELECT * FROM theme');
					while ($res = $req->fetch()){
				?>
					<option value="<?php echo $res['numT'];?>"><?php echo $res['nomtheme'];?></option>
				<?php
					}
				echo'
				</SELECT><br><br> 
				<label>Contenue de l\'article</label><br>
				<textarea id="contenu" name="Contenu" rows="10" cols="40" placeholder="Contenue de l\'article" required></textarea><br>
				</div>
				<input type="submit" value="Créer l\'article" name="valide" />
				</form>
				</p>
			';
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