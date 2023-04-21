<?php
	// Mini-projet IMC v3.2 (tout côté serveur)

	// Paramètres de connexion à la base MySQL
	// $_bdHote = "172.18.156.100";
	// $_bdNom = "2022_imc_users";
	// $_bdUtilisateur = "2022_sio2";
	// $_bdMotDePasse = "Imc++SIO2";

	// $bdHote        = "localhost";
	// $bdNom         = "2022_imc";
	// $bdUtilisateur = "2022_sio2_imc";
	// $bdMotDePasse  = "ImcR974!";

	$_bdHote = "localhost";
	$_bdNom = "imc_e5";
	$_bdUtilisateur = "root";
	$_bdMotDePasse = "";

	// Ouverture de la connexion
    try {
		$db = new PDO('mysql:host='.$_bdHote.';dbname='.$_bdNom, $_bdUtilisateur, $_bdMotDePasse);
    }
 
    catch(Exception $err) {
        echo 'Erreur : '.$err->getMessage().'<br />';
		echo 'N° : '.$err->getCode();
    }
	
	function saveDataIMC($une_taille_cm, $un_poids_kg, $un_imc) {
		global $db;

		$idUtilisateur = $_SESSION['id'];
		
		$ip = $_SERVER['REMOTE_ADDR'];
		$sql = "Insert Into imc (ip ,taille, poids, imc, idUtilisateur) " .
			   "values ('$ip', $une_taille_cm, $un_poids_kg, $un_imc, $idUtilisateur)";

		$db->exec($sql);
	}
	