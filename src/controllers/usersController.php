<?php

require('src/models/UserManager.php');


function index(){
	require('publics/views/home.php');
}

function connexion(String $username,String $password){
	$error_message = "";
	$succes_message ="";
	$succes = False;
	$confirm_message = False;
	$error = False;
	if(!empty($username) AND !empty($password)){
		$user = new UserManager();
		$user->setUserName($username);
		$users = $user->getUserByUserName();
		$user_founded = False;
		if (count($users)!=0){
			foreach ($users as $key ) {
				if (password_verify($password, $key['password'])) {
					$user_chearched = $key['firstname'];
					$user_pk = $key['id'];
					$user_founded = TRUE; 
				}
			}

			if ($user_founded) {
				$succes = TRUE;
				$succes_message = "connexion reussie . vous êtes connecté Mr ".$user_chearched;
				//require("publics/views/incidentMenu.php");
				//echo $user_pk;
				header("Location:index.php?action=incident&user_pk=".$user_pk);
			}else{
				$error = TRUE;
				$error_message = "Mot de passe incorrecte";
				require('publics/views/connexion.php');
				
			}	
		}else{
			$error = TRUE;
			$error_message = "Identifiant non trouvé";
			require('publics/views/connexion.php');
		}

	}else
	{
		require('publics/views/connexion.php');
	}
	
}

function registration(String $firstname,String $lastname,String $username,String $email,String $password){
	if (!empty($firstname) AND !empty($lastname) AND !empty($username) AND !empty($email) AND !empty($password) ) {
		$password = password_hash($password, PASSWORD_DEFAULT);
		$user = new UserManager();
		$user->setFirstName($firstname);
		$user->setLastName($lastname);
		$user->setUserName($username);
		$user->setEmail($email);
		$user->setPassword($password);
		$registre = $user->userRegistration();
		if($registre == TRUE) {
			$error = False;
			$confirm_message = TRUE;
			require("publics/views/connexion.php");
		}  else{
			echo "Une erreur innatendue s'est produite"; 
		}
		
	}else{
		require('publics/views/registration.php');
	}
	
}


