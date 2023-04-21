<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Récupération de mot de passe</title>
	<meta charset="utf-8">
	<meta name="description" content="Calcul IMC (correction v3.2)">
	<meta name="author" content="ND">
	<title>Données IMC</title>
	<link rel="stylesheet" href="css/imc.css">
	<script src="js/echarts.js"></script>
  </head>
  <body>
  <nav>
	<ul>
		<li><a href="index.php">Accueil</a></li>
	</ul>
	</nav>

    <h1>Récupération de mot de passe</h1>
    <p>Veuillez entrer les informations suivantes :</p>
    <form action="include/mdpOublieTraitement.php" method="post">
      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" required><br>
      <label for="prenom">Prénom :</label>
      <input type="text" id="prenom" name="prenom" required><br>
      <label for="login">Login :</label>
      <input type="text" id="login" name="login" required><br>
      <label for="login">Nouveau mot de passe :</label>
      <input type="password" id="mdp" name="mdp" required><br>
      <input type="submit" value="Valider">
    </form>

    <?php 
        session_start();
        if (isset($_SESSION['erreur'])) {
            echo $_SESSION['erreur'];
            unset($_SESSION['erreur']);
        }
    ?>
  </body>
</html>

