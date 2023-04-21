<?php
	// Mini-projet IMC v3.2 (tout côté serveur)
	// Utilisation de variables session
	// Enregistrement des données dans une base MySQL
	// On suppose ici que les données transmises sont valides.

	session_start();
	
	require_once 'outils_bd.php';
	
	if (isset($_SESSION['id'])) {

		function imc($une_taille_cm, $un_poids_kg) {
			// Retourne l'IMC calculée à partir des arguments transmis
				return $un_poids_kg * 10000 / ($une_taille_cm * $une_taille_cm);
			}
			
			function interpretation($un_imc){
				// Retourne l'interprétation de l'IMC fourni en argument
				if ($un_imc > 40) {
					return "Obésité massive";
				} else if ($un_imc >= 35) {
					return "Obésité sévère";
				} else if ($un_imc >= 30) {
					return "Obésité modérée";
				} else if ($un_imc >= 25) {
					return "Surpoids";
				} else if ($un_imc >= 18.5) {
					return "Poids normal";
				} else if ($un_imc >= 16.5) {
					return "Insuffisance pondérale";
				} else {
					return "Dénutrition";
				}
			}
		
			// Récupération des variables transmises (données du formulaire)
		
			$taille = $_POST['txtTaille'];
			$poids = $_POST['txtPoids'];
			
			$imcUtilisateur = round(imc($taille, $poids), 2);
			$imcInter = interpretation($imcUtilisateur);
		
			$_SESSION['imc'] = $imcUtilisateur;
			$_SESSION['interpretation'] = $imcInter;
		
			
		
			saveDataIMC($taille, $poids, $imcUtilisateur);
			
			if ($_SESSION['estAdmin'] == 1){
			header("Location: ../imcAdmin.php");
		}else{
			header("Location: ../imcUser.php");
		}

	  } else {
		
		function imc($une_taille_cm, $un_poids_kg) {
			// Retourne l'IMC calculée à partir des arguments transmis
				return $un_poids_kg * 10000 / ($une_taille_cm * $une_taille_cm);
			}
			
			function interpretation($un_imc){
				// Retourne l'interprétation de l'IMC fourni en argument
				if ($un_imc > 40) {
					return "Obésité massive";
				} else if ($un_imc >= 35) {
					return "Obésité sévère";
				} else if ($un_imc >= 30) {
					return "Obésité modérée";
				} else if ($un_imc >= 25) {
					return "Surpoids";
				} else if ($un_imc >= 18.5) {
					return "Poids normal";
				} else if ($un_imc >= 16.5) {
					return "Insuffisance pondérale";
				} else {
					return "Dénutrition";
				}
			}
		
			// Récupération des variables transmises (données du formulaire)
		
			$taille = $_POST['txtTaille'];
			$poids = $_POST['txtPoids'];
			
			$imcUtilisateur = round(imc($taille, $poids), 2);
			$imcInter = interpretation($imcUtilisateur);
		
			$_SESSION['imc'] = $imcUtilisateur;
			$_SESSION['interpretation'] = $imcInter;
		
			
			header("Location: ../index.php");
	  }

	