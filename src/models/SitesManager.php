<?php

require_once("Manager.php");

class SitesManager extends Manager{
	private  $id;
	private  $place;

	public function getId(){
		return $this->id;
	}

	public function getPlace(){
		return $this->place;
	}

	public function setId(){
		$this->id = $id;
	}

	public function setPlace(){
		$this->place = $place;
	}

	public function getSites(){
		$db = $this->dbconnect();
		$req = $db->prepare("SELECT * FROM sites");
		$req->execute();
		return $req->fetchAll();
	}
}