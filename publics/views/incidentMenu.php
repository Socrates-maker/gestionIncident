<?php ob_start(); ?>

<div class="page">
	<div class="incident-menu-container">
		<div class="incident-element-menu">
			<button id="enregistrer"  class="btn btn-primary btn-lg btn-block">Enregistrer un incident </button>
		</div>
		<div class="incident-element-menu">
			<button class="btn btn-primary btn-lg btn-block"><a href="index.php?action=statistiques" > Page des statistiques</a></button>
		</div>	
	</div>
	<div class="form-incident-container bg-info"  id = "incident-form">
		<p style="font-weight: 400;text-align: center; font-size:20px ;">Enregistrer un incident</p> 
			<form class="form-style" action="index.php?action=incident&user_pk=<?php echo $_GET['user_pk']?>" method="post">
				<div class="form-group">
					<label for="exampleFormControlSelect3">Siege de l'incident</label>
					<select class="form-control form-control-sm" name="pylonne">
						<optgroup label="Pylones">
							<?php 
								foreach($pylons as $pylon){
									echo "<option value=".$pylon['id']."P>".$pylon['place']."</option>";
								}
							?>
						</optgroup>
						<optgroup label="Sites">
							<?php 
								foreach($sites as $site){
									echo "<option value=".$site['id']."S>".$site['place']."</option>";
								}
							?>
						</optgroup>
					</select>
				</div>
				<div>
					<label for="exampleFormControlSelect1">Localisation</label>
					<select class="form-control form-control-sm" name="localisation">
						<option>Site distant</option>
						<option>Site non distant</option>
					</select>

				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Equipement</label>
					<select class="form-control form-control-sm" aria-label="Default select example" id="exampleFormControlTextarea1" name="equipement">
						<?php 
							foreach($equipments as $equipment){
								echo "<option value=".$equipment['id'].">".$equipment['nom']."</option>";
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Description</label>
					<textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" name="description"></textarea>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">Avez vous trouver la solution</label>
					<div>
						<label class="form-check-label">oui</label>
						<input type="radio" name="unchecked" id="oui" value="oui" class="form-check-input">
						<label class="form-check-label">non</label>
						<input type="radio" name="unchecked" id="non" value="non" class="form-check-input">
					</div>
				</div>
				<div class="form-group" style="display: none;" id="solution" >
					<label>Solution proposée</label>
					<textarea class="form-control form-control-sm" name="solution"></textarea>
				</div>
				<br>
				<div>
					<input type="submit" name="submit" id="Enregistrer" value="Enregistrer" class="btn btn-outline-primary btn-sm my-1">
					<button class="btn btn-outline-secondary btn-sm" id="annuler">Annuler</button>
				</div>
			</form>
	</div>
</div>
<div style="text-align: center;">
	<?php
	if (isset($_POST['pylonne'])) {
		echo $_POST['pylonne'][1];
	}
	
	?>
</div>	


<script type="text/javascript" src="publics/js/incident.js"></script>

<?php 
	$content=ob_get_clean(); 
	require("layout.php");
?>
