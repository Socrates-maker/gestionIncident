<?php 
require('src/controllers/usersController.php');
require('src/controllers/incidentController.php');

try {
	if (isset($_GET['action'])) {
		switch ($_GET['action']) {
		case 'home':
			index();
			break;
		case 'connexion':
			if(!(isset($_POST['username']) AND isset($_POST['password'])))
			{

				$username = "";
				$password = "";
			}else{
				$username = $_POST['username'];
				$password = $_POST['password'];
			}
			connexion($username,$password);
			break;
		case 'registration':
			if(!(isset($_POST['firstname']) AND isset($_POST['lastname']) AND isset($_POST['username']) AND isset($_POST['email']) AND isset($_POST['password'])))
			{ 
				$firstname = "";
				$lastname = "";
				$username = "";
				$email = "";
				$password = "";
			}else{
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
			}
			registration($firstname,$lastname,$username,$email,$password);
			break;
		case 'incident':
			$post = isset($_POST['pylonne']) AND isset($_POST['localisation']) AND isset($_POST['equipement']) AND isset($_POST['description']) AND isset($_POST['solution']);
			//$post = TRUE;
			if (!$post) 
			{
				$user_pk = "";
				$pylonne = "";
				$localisation = "";
				$equipement = "";
				$description = "";
				$solution = "";
			}else{
				$user_pk = $_GET['user_pk'];
				$pylonne = $_POST['pylonne'];
				$localisation = $_POST['localisation'];
				$equipement = $_POST['equipement'];
				$description = $_POST['description'];
				$solution = $_POST['solution'];
			}
			incidentPage($user_pk,$pylonne,$localisation,$equipement,$description,$solution);
			break;
		case 'statistiques':
			if (!isset($_POST['date_debut']) AND !isset($_POST['date_fin']) ) {
				$date_debut = "";
				$date_fin = "";
			}	
			else{
				$date_debut = $_POST['date_debut'];
				$date_fin = $_POST['date_fin'];
			}
			statitistique($date_debut,$date_fin);
			break;
		default:
			index();
			break;
		}
	}else{
		index();
	}
	
} catch (Exception $e) {
	die("Erreur".$e->getMessage());
}
?>