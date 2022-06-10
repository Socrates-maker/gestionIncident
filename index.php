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
			incidentPage();
			break;
		case 'statistiques':
			statitistique();
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