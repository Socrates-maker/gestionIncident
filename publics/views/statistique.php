<?php ob_start(); ?>
<section style="display:flex; flex-direction:column; background-color: rgba(0, 0, 0, 0.5); color: white; " class="container">
<div><h1 style="text-align:center; border-bottom: 2px solid black;">Statistiques</h1></div>

<div style="display:flex; flex-direction:row ;" class="container">
	<div>
		<div class="container" style=" border-bottom: 2px solid black; padding-bottom:10px;">
			<form method="post" action="index.php?action=statistiques" style="" class="form-inline">
				<p>Liste des incidents entre:</p>
				<div class="form-group">
					<label>Debut</label>
					<input type="text" name="date_debut" class="form-control" placeholder="yyyy-mm-dd">
				</div>
				<div class="form-group">
					<label>Fin</label>
					<input type="text" name="date_fin" class="form-control"  placeholder="yyyy-mm-dd">
				</div>
				<br>
				<input type="submit" value="Valider" class="btn btn-primary">
			</form>
		</div>
		<div class="container" style="border-bottom: 2px solid black; padding-bottom:10px;">
			<p><a href="index.php?action=incidentByPylon" style="color: white;">Les pylonnes qui connaissent le plus d'incident</a></p>
		</div>

		<div class="container" style="border-bottom: 2px solid black; padding-bottom:10px;">
			<p><a href="index.php?action=terminauxdistant" style="color: white;">Les terminaux distants</a></p>
		</div>
	</div>	
	<div class="container" style="border-left:1px solid black ; width:400px">
		<?php
		if ($incident_lenght>0) {
			$i=0;
			echo "<table>";
			echo "<tr><td>Terminale</td><td>date</td></tr>";
			foreach ($incidents as $incident) {
				echo "<tr>";
				echo "<td> ".$pylons[$i]."</td><td>".$incident['date']."</td>";
				echo "</tr>";
				$i++;
			}

			echo "</table>";
		}

		if ($incidentsGroupByPylonLenght >0) {
			echo "<table>";
			echo "<tr><td>Pylonnes</td><td>Nombre d'incidents</td></tr>";
			foreach ($incidentsGroupByPylon as $incidentpylon){
				echo "<tr>";
				echo "<td>".$incidentpylon['pylone']."</td><td> ".$incidentpylon['nbre']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}

		if ($incidentsDistantLenght>0){
			$i=0;
			echo "<table>";
			echo "<tr><td>Terminale</td><td>Site/pylone</td></tr>";
			foreach ($incidentsDistant as $incidentpylon){
				echo "<tr>";
				if($incidentpylon['pylone_pk']){
				echo "<td>".$pylons[$i]."</td><td> pylone</td>";
				}else{
					echo "<td>".$pylons[$i]."</td><td> site</td>";
				}
				echo "</tr>";
				$i++;
			}
			echo "</table>";
		}	
		?>
	</div>
</div>
</section>



<?php 
$content = ob_get_clean();
require("layout.php");

?>