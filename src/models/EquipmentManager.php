<?php 
 require_once("Manager.php");

 class EquipmentManager extends Manager{

 	private  $id;
	private  $name;

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	public function setId(){
		$this->id = $id;
	}

	public function setname(){
		$this->place = $name;
	}

	public function getEquipments(){
		$db = $this->dbconnect();
		$req = $db->prepare("SELECT * FROM equipment");
		$req->execute();
		return $req->fetchAll();
	} 
 }