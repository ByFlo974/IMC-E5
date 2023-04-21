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
<?php
echo '<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Visites</title>
    <!-- Include the ECharts file you just downloaded -->
    <script src="js/echarts.js"></script>
  </head>';
  ?>
  
  <body ondblclick="window.location.href = 'imc.php'">
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
    
    require_once "include/outils_bd.php";
    global $cnx;
    global $db;

    echo '<div id="main" style="width: 600px;height:400px;"></div>
    <script type="text/javascript">
      // Initialize the echarts instance based on the prepared dom
      var myChart = echarts.init(document.getElementById("main"));

      // Specify the configuration items and data for the chart
      var option = {
        title: {
          text: "Nombres de visites"
        },
        tooltip: {},
        legend: {
          data: ["Visites"]
        },
        xAxis: {
          data: [';

          $sql= "Select mois, annee, nb_visites from visite
           ORDER BY `visite`.`annee` ASC;";
          $result = $db->query($sql);

          foreach ($result as $row){
            $monnum = $row['mois'];
          echo $monnum.",";

          }

          echo ']

        },
        yAxis: {},
        series: [
          {
            name: "Visites",
            type: "bar",
            data: [';

            $sql= "Select mois, annee, nb_visites from visite
              ORDER BY `visite`.`annee` ASC;";
            $result = $db->query($sql);
            foreach ($result as $row){
            echo $row['nb_visites'].",";
  
            }
  
            echo ']

          }
        ]
      };

      // Display the chart using the configuration items and data just specified.
      myChart.setOption(option);
    </script>'
    ?>
  </body >
</html>