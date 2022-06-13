<?php

class IncidentManager extends Manager{
	private  $id;
	private  $user_pk;
	private  $pylon_pk;
	private  $site_pk;
	private  $equipment_pk;
	private  $description;
	private  $solution;
	private  $distant;
	private  $date;

	public function IncidentManager(){
		
	}

	public function getId(){
		return $this->id;
	}

	public function setId(int $id){
		$this->id = $id;
	}

	public function getUser_pk(){
		return $this->user_pk;
	}

	public function setUser_pk(int $user_pk){
		$this->user_pk = $user_pk;
	}

	public function setPylon_pk(int $pylon_pk){
		$this->pylon_pk = $pylon_pk;
	}

	public function getSite_pk(){
		return $this->site_pk;
	}

	public function setSite_pk(int $site_pk){
		$this->site_pk = $site_pk;
	}

	public function getEquipment_pk(){
		return $this->equipement_pk;
	}

	public function setEquipement(int $equipement_pk){
		$this->equipement_pk = $equipement_pk;
	}

	public function getDesciption(){
		return $this->description;
	}


	public function setDescription(String $description){
		$this->description = $description;
	}

	public function getSolution(){
		return $this->solution;
	}

	public function setSolution(String $solution){
		$this->solution = $solution;
	}

	public function getDistant(){
		return $this->distant;
	}

	public function setDistant(int $distant){
		$this->distant = $distant;
	}

	public function getdate(){
		return $this->date;
	}


	public function setDate(Date $date){
		$this->date = $date;
	}


	public function createIncident(){
		$db = $this->dbconnect();
		if($this->site_pk==0){
			$req = $db->prepare("INSERT INTO incident(users_pk,pylone_pk,equipment_pk,description,solution,distant,date) VALUE(?,?,?,?,?,?,now())");
			return $req->execute(array($this->user_pk,$this->pylon_pk,$this->equipement_pk,$this->description,$this->solution,$this->distant));

		}else{
			$req = $db->prepare("INSERT INTO incident(users_pk,site_pk,equipment_pk,description,solution,distant,date) VALUE(?,?,?,?,?,?,now())");
			return $req->execute(array($this->user_pk,$this->site_pk,$this->equipement_pk,$this->description,$this->solution,$this->distant));
		}
		
	}

	public function getIncidentByDate($date_debut,$date_fin){
		$db = $this->dbconnect();
		$req = $db->prepare("SELECT  * FROM incident WHERE incident.date>=? AND incident.date<=? ");
		$req->execute(array($date_debut,$date_fin));
		return $req->fetchAll();
	}

	public function getMoreIncidentPylonne(){
		$db = $this->dbconnect();
		$req = $db->prepare("SELECT count(*) as nbre,pylon.place as pylone FROM pylon,incident WHERE pylone_pk=pylon.id GROUP BY pylone ORDER BY nbre DESC");
		$req->execute();
		return $req->fetchAll();
	}

	public function getIncientByDistant(){
		$db = $this->dbconnect();
		$req = $db->prepare("SELECT * FROM incident WHERE distant = 1");
		$req->execute();
		return$req->fetchAll();
	}
	
}