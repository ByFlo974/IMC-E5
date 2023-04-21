<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['id'])) {
  header('Location: ../imc.php');
  exit;
}

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once('outils_bd.php');

  $login = $_POST['login'];
  $mdp = $_POST['mdp'];

  // Vérifier si les identifiants sont valides
  $sql = "SELECT id, nom, prenom, login, mdp, estAdmin FROM utilisateur
  WHERE login = ? AND mdp = SHA2(?, 256)";
  $stmt = $db->prepare($sql);
  $stmt->execute([$login, $mdp]);
  $utilisateur = $stmt->fetch();

  $_SESSION['estAdmin'] = $utilisateur['estAdmin'];

  if ($utilisateur) {
    // Vérifier si l'utilisateur est un administrateur
    if ($utilisateur['estAdmin'] == 1) {
      // Connecter l'utilisateur
      $_SESSION['id'] = $utilisateur['id'];
      $_SESSION['nom'] = $utilisateur['nom'];
      $_SESSION['prenom'] = $utilisateur['prenom'];

      // Rediriger vers la page d'accueil
      header('Location: ../imcAdmin.php');
      exit;
    } else {
      $_SESSION['id'] = $utilisateur['id'];
      $_SESSION['nom'] = $utilisateur['nom'];
      $_SESSION['prenom'] = $utilisateur['prenom'];
      // Afficher un message d'erreur si l'utilisateur n'est pas un administrateur
      header('Location: ../imcUser.php');
      exit;
    }
  } else {
    // Afficher un message d'erreur si les identifiants sont invalides
    header('Location: ../index.php?erreur=connexion');
    exit;
  }
}

?>