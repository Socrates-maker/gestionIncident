<?php 
 require_once("Manager.php");

 class PylonManager extends Manager{

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

	public function getPylons(){
		$db = $this->dbconnect();
		$req = $db->prepare("SELECT id,place FROM pylon");
		$req->execute();
		return $req->fetchAll();
	}
 }