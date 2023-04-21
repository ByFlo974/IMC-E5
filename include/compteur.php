<?php

require_once 'outils_bd.php';

// function enregistrer_visite(int $nbVues) {
//     global $db;

//     $sql = "INSERT INTO visite (annee, mois, nb_visites)
//     VALUES (YEAR(NOW()), MONTH(NOW()), :nb_vues) ON DUPLICATE KEY UPDATE nb_visites = nb_visites + 1";
//     $stmt = $db->prepare($sql);
//     $stmt->bindParam(':nb_vues', $nbVues, PDO::PARAM_INT);
//     $stmt->execute();
// }

// function nombre_vues() {
//     global $db;
//     $sql = "SELECT nb_visites FROM visite WHERE annee = YEAR(NOW()) AND mois = MONTH(NOW())";
//     $stmt = $db->query($sql);
//     $nbVues = $stmt->fetchColumn();
//     if (!$nbVues) {
//         $nbVues = 0;
//     }
//     return $nbVues;
// }

function enregistrer_visite(int $nbVues) {
    global $db;

    if (!isset($_COOKIE['visite'])) { // Vérifier la présence du cookie
        $sql = "INSERT INTO visite (annee, mois, nb_visites)
        VALUES (YEAR(NOW()), MONTH(NOW()), :nb_vues) ON DUPLICATE KEY UPDATE nb_visites = nb_visites + 1";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nb_vues', $nbVues, PDO::PARAM_INT);
        $stmt->execute();

        setcookie('visite', 'true', time()+20); // Stocker le cookie pour 20sec
    }
    setcookie('visite', 'true', time()+20); // Stocker le cookie pour 20sec
}

function nombre_vues() {
    global $db;
    $sql = "SELECT nb_visites FROM visite WHERE annee = YEAR(NOW()) AND mois = MONTH(NOW())";
    $stmt = $db->query($sql);
    $nbVues = $stmt->fetchColumn();
    if (!$nbVues) {
        $nbVues = 0;
    }
    return $nbVues;
}
?>