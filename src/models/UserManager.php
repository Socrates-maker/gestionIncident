<?php 

require_once('Manager.php');

class UserManager extends Manager{
	private int $id;
	private String $firstname;
	private String $lastname;
	private String $username;
	private String $email;
	private String $password;


	public function getId()
	{
		return $this->id;
	}

	public function getFirstName(){
		return $this->name;
	}

	public function getLastName(){
		return $this->lastname;
	}

	public function getUserName(){
		return $this->username;
	}	

	public function getEmail(){
		return $this->email;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setId(int $id){
		$this->id = $id;
	}

	public function setFirstName(String $firstname){
		$this->firstname = $firstname; 
	}

	public function setLastName(String $lastname){
		$this->lastname = $lastname;
	}

	public function setUserName(String $username){
		$this->username = $username;
	}

	public function setEmail(String $email){
		$this->email = $email;
	}

	public function setPassword(String $password){
		$this->password = $password;
	}

	public function userRegistration(){
		$db = $this->dbconnect();
		$req = $db->prepare("INSERT INTO users(firstname,lastname,username,email,password,date) VALUE(?,?,?,?,?,now())");
		return $req->execute(array($this->firstname,$this->lastname,$this->username,$this->email,$this->password));
	}

	public function getUserByName(){
		$db = $this->dbconnect();
		$req = $db->prepare("SELECT firstname,lastname,email,password FROM users WHERE firstname = ?");
		$req->execute(array($this->name));
		return $req->fetchAll();
	}

	public function getUserByEmail(){
		$db = $this->dbconnect();
		$req = $db->prepare("SELECT firstname,lastname,email,password FROM users WHERE email = ?");
		$req->execute(array($this->email));
		return $req>fetchAll();
	}

	public function getUserByUserName(){
		$db = $this->dbconnect();
		$req = $db->prepare("SELECT firstname,lastname,email,password FROM users WHERE username = ?");
		$req->execute(array($this->username));
		return $req->fetchAll();
	}


}