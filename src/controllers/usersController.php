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
				$succes_message = "connexion reussie . vous êtes connecté Mr ".$user_chearched
				;
				//session_start();
				$_SESSION['username'] = $user_chearched;
				$_SESSION['succes'] = $succes_message;
				$_SESSION['user_pk'] = $user_pk;
				header("Location:index.php?action=incident&user_pk=".$user_pk);
			}else{
				$error = TRUE;
				$error_message = "Mot de passe incorrecte";
				require('publics/views/connexion.php');
				
			}	
		}else{
			$error = TRUE;
			$error_message = "Identifiant non trouvé";
			$_SESSION['error_connexion'] = $error_message;
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
			$registre_success = "insciption reussie. connectez vous";
			$_SESSION['registre_success'] = $registre_success;
			//require("publics/views/connexion.php");
			header("Location:index.php?action=connexion");
		}  else{
			echo "Une erreur innatendue s'est produite"; 
		}
	}else{
		$_SESSION["error_registration"] = "Erreur! Vous devez remplir les champs";
		require('publics/views/registration.php');
	}
	
}


