<?php

require('src/models/PylonManager.php');
require('src/models/SitesManager.php');
require('src/models/EquipmentManager.php');

function incidentPage(){
	$pylon = new PylonManager();
	$site = new SitesManager();
	$equipment = new EquipmentManager();
	$pylons = $pylon->getPylons();
	$sites = $site->getSites();
	$equipments = $equipment->getEquipments();
	require("publics/views/incidentMenu.php");
}

function statitistique(){
	require("publics/views/statistique.php");
}