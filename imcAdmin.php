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
<body ondblclick="window.location.href = 'resultat.php'">
	<nav>
	<ul>
		<li><a href="imcAdmin.php">IMC</a></li>
		<li><a href="visite.php">Voir les visites</a></li>
		<li><a href="admin.html">Créer un utilisateur</a></li>
		<li><a href="resultat.php">Resultat</a></li>
		<li><a href="deconnexion.php">Déconnexion</a></li>
	</ul>
	</nav>

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
			echo "Votre IMC ". $_SESSION['prenom']. ": <b>" . $_SESSION['imc'] . '</b> - ' . $_SESSION['interpretation'];
			// Destruction des variables de session
			unset($_SESSION['imc']);
			unset($_SESSION['interpretation']);
		}
	?>
	
	</p>

	<?php
	echo '</br></br>';

	$idUtilisateur = $_SESSION['id'];

	echo '<div id="main" style="width: 600px;height:400px;"></div>
	<script type="text/javascript">
	  // Initialize the echarts instance based on the prepared dom
	  var myChart = echarts.init(document.getElementById("main"));

	  // Specify the configuration items and data for the chart
	  var option = {
		title: {
		  text: "Evolution"
		},
		tooltip: {},
		legend: {
		  data: ["IMC"]
		},
		xAxis: {
		  data: [';

		  $sql= "Select id, date, ip, taille, poids, imc from imc
		  where idUtilisateur = $idUtilisateur ORDER BY `imc`.`date` ASC;";

		  $result = $db->query($sql);

		  foreach ($result as $row){
			// Format the timestamp to 'Y-m-d'
			$date = date('Y-m-d', strtotime($row['date']));
			echo "'" . $date . "',";
		  }


		  echo ']

		},
		yAxis: {},
		series: [
		  {
			name: "poids",
			type: "bar",
			data: [';

			$sql= "Select id, date, ip, taille, poids, imc from imc
			where idUtilisateur = $idUtilisateur ORDER BY `imc`.`date` ASC;";
			$result = $db->query($sql);
			foreach ($result as $row){
			echo $row['poids'].",";
  
			}
  
			echo ']

		  }
		]
	  };

	  // Display the chart using the configuration items and data just specified.
	  myChart.setOption(option);
	</script>'
?>

	<?php
	require_once 'include/compteur.php';
    enregistrer_visite(1);
	nombre_vues();
?>
Il y a <?= nombre_vues()?> visites sur le site
</body>
</html>