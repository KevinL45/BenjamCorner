<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Benjam Corner - Inscription</title>
	<link rel="stylesheet" href="css/styleI.css">
</head>

<body>
	<!-- Menu -->
	<?php
	require 'include/nav.php';
	?>
	
	<!-- Formulaire d'inscription -->
	<p>
	<form action='form/form_inscription.php' method='post'>
	<fieldset>
		<legend>
		  <h2> INSCRIPTION </h2>
		</legend>
		  <br>
		  <div class="texte">
		  <label>Pseudo</label> <br>
		  <input type="text" class="form-control" name="Pseudo" placeholder="Entrez votre pseudo">
		  <br><br>
		  <label>Mot de passe</label> <br>
		  <input type="password" class="form-control" name="mdp" placeholder="Entrez votre mot de passe">
		<br> <br>
		<label>Catégorie</label> <br>
		  <SELECT name="cat" size="1">
		<?php
			$req=$conbd ->query('SELECT * FROM categorie');
			while ($res = $req->fetch()){
		?>
			<option value="<?php echo $res['CodeCat'];?>"><?php echo $res['nom'];?></option>
		<?php
			}
		?>
		  </SELECT>		  
		  <br> <br>
	</fieldset>
	<fieldset>
		<legend>
			<h2> INFORMATION PERSONNEL</h2>
		</legend>
		  <label>Nom</label> <br>
		  <input type="text" class="form-control" name="Nom" placeholder="Entrez votre nom">
		<br><br>
		  <label>Prénom</label> <br>
		  <input type="text" class="form-control" name="Prenom" placeholder="Entrez votre prénom">
		<br><br>
		  <label>Date de naissance</label> <br>
		  <input type="date" class="form-control" name="Naissance" placeholder="Entrez votre date de naissance">
		<br><br>
		  <label>Adresse</label> <br>
		  <input type="text" class="form-control" name="Adresse" placeholder="Entrez votre adresse">
		<br><br>
		  <label>Code postale</label> <br>
		  <input type="text" class="form-control" name="Postal" placeholder="Entrez votre code postale">
		<br><br>
		  <label>Ville</label> <br>
		  <input type="text" class="form-control" name="Ville" placeholder="Entrez votre ville">
		<br><br>
		  <label>Email</label> <br>
		  <input type="email" class="form-control" name="Email" placeholder="Entrez votre adresse email">
		<br><br>
		</fieldset>
		<br>
		
		  <button type="submit" value="Inscription" name="valide">Valider</button>
		  <button type="reset" value="effacer" name="effacer">Effacer</button><br><br>

		  <a href="connexion.php" >J'ai déjà un compte </a>
		</div>
	</form>
	</p>
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
