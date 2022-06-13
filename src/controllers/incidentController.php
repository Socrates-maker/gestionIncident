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
			$_SESSION['incident_success'] = "incident enregistré";
			header("Location:index.php?action=incident");
		}else{
			echo "Incident non enregistre";
		}
		//require("publics/views/incidentMenu.php");
	}

	
}

function statitistique($date_debut,$date_fin){
	$incidentsGroupByPylonLenght=0;
	$incidentsDistantLenght=0;
	$incidentsGroupByPylon=[];
	$incident_lenght=0;
	$incidents = [];
	if(!empty($date_debut) AND !empty($date_fin)){
		$incident = new IncidentManager;
		$incidents = $incident->getIncidentByDate($date_debut,$date_fin);
		$incident_lenght = count($incidents);
		$pylon = new PylonManager();
		$site = new SitesManager();
		$pylons = [];
		$i=0;
		foreach($incidents as $incidents_e){
			if ($incidents_e['pylone_pk']) {
				$pylons[$i] = $pylon->getPylonById($incidents_e['pylone_pk'])['place'];	
			}
			else{
				$pylons[$i] = $site->getSitesById($incidents_e['site_pk'])['place'];
			}

			$i++;
 		}
		require("publics/views/statistique.php");

	}else{
		require("publics/views/statistique.php");
	}
	
}

function incidentsGroupByPylon()
{
	$incident_lenght = 0;
	$incidentsDistantLenght=0;
	$incidents= [];
	$incidentpylon = new IncidentManager();
	$incidentsGroupByPylon = $incidentpylon->getMoreIncidentPylonne();
	$incidentsGroupByPylonLenght =count($incidentsGroupByPylon);
	require("publics/views/statistique.php");
}

function incidentDistant(){
	$incident_lenght = 0;
	$incidentsGroupByPylonLenght=0;
	$incident = new IncidentManager();
	$incidentsDistant = $incident->getIncientByDistant();
	$pylon = new PylonManager();
	$site =new SitesManager();
	$pylons =[];
	$i=0;
	foreach($incidentsDistant as $incidents_e){
			if ($incidents_e['pylone_pk']) {
				$pylons[$i] = $pylon->getPylonById($incidents_e['pylone_pk'])['place'];	
			}
			else{
				$pylons[$i] = $site->getSitesById($incidents_e['site_pk'])['place'];
			}

			$i++;
 	}
 	$incidentsDistantLenght = count($incidentsDistant);
 	require("publics/views/statistique.php");
}