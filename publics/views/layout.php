
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestion des incidents</title>
	<link rel="stylesheet" type="text/css" href="publics/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="publics/css/app.css">
	<script type="text/javascript" src="publics/js/bootstrap/bootstrap.js"></script>
	<style type="text/css">
		body{
			background-image: url('publics/img/pylonneSocrates.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
	
</head>
<body>

	<?php
		if (isset($_SESSION['username'])) {
			include('nav1.php');
		}else{
		 include('nav.php');
		}
	?>
	<section>
		<?=$content?>
	</section>
	<div class="bg-dark">
		<p style="color: white; text-align: center;">copyright Socrates</p>
	</div> 
</body>
</html>