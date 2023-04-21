<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Inclure le fichier de configuration de la base de données
  require_once "outils_bd.php";
  
  // Préparer la requête SQL
  $sql = "INSERT INTO utilisateur (nom, prenom, age, login, mdp, estAdmin) VALUES (:nom, :prenom, :age, :login, :mdp, :estAdmin)";
  
  // Préparer les paramètres de la requête
  $parametres = array(
    ':nom' => $_POST['nom'],
    ':prenom' => $_POST['prenom'],
    ':age' => $_POST['age'],
    ':login' => $_POST['login'],
    ':mdp' => $_POST['mdp'],
    ':estAdmin' => $_POST['estAdmin']
  );
  
  // Exécuter la requête
  try {
    $stmt = $db->prepare($sql);
    $stmt->execute($parametres);
    header('location: ../admin.html');
    exit();
  } catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    header('location: ../admin.html');
  }
  
}
?>