<?php

class Manager{

	public function dbconnect(){
		try {
			$db = new PDO('mysql:host=localhost;dbname=GestionIncidents;charset=utf8','socrates','socrates1234',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $db;

		} catch (PDOException $e) {
			die('Erreur'.$e->getMessage());
		}
	}
}