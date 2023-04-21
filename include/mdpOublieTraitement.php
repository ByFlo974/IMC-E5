<?php
require_once('outils_bd.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $login = $_POST['login'];
  $nouveau_mdp = $_POST['mdp'];
  
  // Appeler la procédure stockée pour modifier le mot de passe
  $sql = "CALL modifier_mot_de_passe(?, ?, ?, ?)";
  $stmt = $db->prepare($sql);
  $stmt->execute([$nom, $prenom, $login, $nouveau_mdp]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

}
  // Afficher le message de retour
    $_SESSION['erreur'] = "Utilisateur introuvable.";
    header('Location: ../mdpOublier.php');


 ?>