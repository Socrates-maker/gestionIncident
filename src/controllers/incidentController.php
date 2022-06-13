<?php

require('src/models/PylonManager.php');
require('src/models/SitesManager.php');
require('src/models/EquipmentManager.php');
require('src/models/IncidentManager.php');

function incidentPage($user_pk,$pylonne,$localisation,$equipement,$description,$solution){
	$pylon = new PylonManager();
	$site = new SitesManager();
	$equipment = new EquipmentManager();
	$pylons = $pylon->getPylons();
	$sites = $site->getSites();
	$equipments = $equipment->getEquipments();
	if ( empty($pylonne) AND empty($localisation) AND  empty( $equipement )  AND  empty($description) AND empty($solution)) {
			require("publics/views/incidentMenu.php");
	}
	else{
		//echo $user_pk."<br>";
		//echo $equipement;
		$incident = new IncidentManager();
		$incident->setUser_pk($user_pk);
		if ($pylonne[1] == 'P'){
			$incident->setPylon_pk($pylonne[0]);
			$incident->setSite_pk(0);
		}else{
			$incident->setSite_pk($pylonne[0]);
			$incident->setPylon_pk(0);
		}
		$incident->setEquipement($equipement);
		if ($localisation == "Site distant") {
			$incident->setDistant(1);
		}
		if($localisation=="Site non distant"){
			$incident->setDistant(0);
		}
		echo $incident->getDistant();
		$incident->setDescription($description);
		$incident->setSolution($solution);
		$created = $incident->createIncident();
		if($created){
			echo "Incident enregistre";
		}else{
			echo "Incident non enregistre";
		}
		//require("publics/views/incidentMenu.php");
	}

	
}

function statitistique($date_debut,$date_fin){
	$incident_lenght=0;
	$incidents = [];
	if(!empty($date_debut) AND !empty($date_fin)){
		$incident = new IncidentManager;
		$incidents = $incident->getIncidentByDate($date_debut,$date_fin);
		$incident_lenght = count($incidents);
		require("publics/views/statistique.php");

	}else{
		require("publics/views/statistique.php");
	}
	
}