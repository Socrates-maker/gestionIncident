<?php ob_start(); ?>
<hr>

<div><h1 style="text-align:center;">Page des statistiques</h1></div>
<section style="display:flex; flex-direction:row ;" class="container">
	<div>
		<div class="container">
			<form method="post" action="" style="width:200px">
				<p>Liste des incidents entre:</p>
				<div class="form-group">
					<label>Debut</label>
					<input type="text" name="date_debut" class="form-control">
				</div>
				<div class="form-group">
					<label>Fin</label>
					<input type="text" name="date_fin" class="form-control">
				</div>
				<br>
				<input type="submit" value="Valider">
			</form>
		</div>
		<div class="container">
			<p><a href="">Les pylonnes qui connaissent le plus d'incident</a></p>
		</div>

		<div class="container">
			<p><a href="">Les terminaux distants</a></p>
		</div>
	</div>	
	<div class="container" style="border-left:1px solid black ;">
		<p class="text-center">Resulats</p>
		<?php
		if ($incident_lenght>=0) {
			foreach ($incidents as $incident) {
				echo $incident['place']."<br>";
			}
		}
			
		?>
	</div>
</section>



<?php 
$content = ob_get_clean();
require("layout.php");

?>