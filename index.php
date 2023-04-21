<?php
	session_start();
	require_once "include/outils_bd.php"
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Calcul IMC">
	<meta name="author" content="ND">
	<title>Calcul de l'IMC</title>
	<link rel="stylesheet" href="css/imc.css">
	<script src="js/echarts.js"></script>
</head>
<body>
	<nav>
	<ul>
		<li><a href="index.php">Accueil</a></li>
	</ul>
	</nav>
        <h1>Accueil</h1>

        <form method="post" action="include/authentification.php">
            <label for="login">Login :</label>
            <input type="text" id="login" name="login"><br>
          
            <label for="password">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp"><br>
          
            <input type="submit" value="Se connecter">
          </form>
		  <?php if (isset($_GET['erreur'])) {
			$erreur = $_GET['erreur'];
			echo '<div class="erreur">Login ou mot de passe incorrect !</div>';
		}
		?>

		<a href="mdpOublier.php">Mot de passe oublié</a>


	<h1>Votre indice de masse corporelle</h1>
	<div>
		<form name="formIMC" method="post" action ="include/calculer_imc.php">
			<p>
				Votre taille : <input type="number" name="txtTaille" size="3"  placeholder="Cm" required>
			</p>
			<p>
				Votre poids : <input type="number" name="txtPoids" size="3" placeholder="Kg" required>
			</p>
		<input name="cmdCalculer" type="submit" class="boutonJS" value="Calculer IMC">
		</form>
	</div>
	
	<!-- Le contenu de ce paragraphe est cette fois-ci renseigné côté serveur !-->
	<p id="idIMC">
	<?php
	
		if (isset($_SESSION['imc']) && isset($_SESSION['interpretation'])) {
			echo "Votre IMC : <b>" . $_SESSION['imc'] . '</b> - ' . $_SESSION['interpretation'];
			// Destruction des variables de session
			unset($_SESSION['imc']);
			unset($_SESSION['interpretation']);
		}
	?>
	
	</p>