<?php
	require_once 'include/outils_bd.php';
	// $nbLogs = getNbLog();
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Calcul IMC (correction v3.2)">
	<meta name="author" content="ND">
	<title>Données IMC</title>
	<link rel="stylesheet" href="css/imc.css">
	<script src="js/echarts.js"></script>
</head>
<body ondblclick="window.location.href = 'visite.php'">
	<nav>
		<ul>
			<li><a href="imcAdmin.php">IMC</a></li>
			<li><a href="visite.php">Voir les visites</a></li>
			<li><a href="admin.html">Créer un utilisateur</a></li>
			<li><a href="resultat.php">Resultat</a></li>
			<li><a href="deconnexion.php">Déconnexion</a></li>
		</ul>
	</nav>
	<?php
		echo '<h1>Données des utilisateurs</h1>';
		echo '<table>';
		echo '<tr>';
			echo '<td>Date</td>';
			echo '<td>IP</td>';
			echo '<td>Taille</td>';
			echo '<td>Poids</td>';
			echo '<td>IMC</td>';
		echo '</tr>';

		$sql = "Select * from imc ;";
		$mesLignes = $db->query($sql);
		
		foreach ($mesLignes as $uneLigne) {
			// Génération des lignes du tableau
			echo '<tr>';
				echo '<td>' . $uneLigne[1] . '</td>';
				echo '<td>' . $uneLigne[2] . '</td>';
				echo '<td>' . $uneLigne[3] . '</td>';
				echo '<td>' . $uneLigne[4] . '</td>';
				echo '<td>' . $uneLigne[5] . '</td>';
			echo '</tr>';
		}
		
		echo '</table>';

		echo '</br></br>';

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
	
			  $sql= "Select id, date, ip, taille, poids, imc from imc  ORDER BY `imc`.`date` ASC;";
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
	
				$sql= "Select id, date, ip, taille, poids, imc from imc  ORDER BY `imc`.`date` ASC;";
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



</body>
</html>