	<!--<h1 class="text-center">Connexion</h1>-->

<div class="container form-container" style="height: 400px;">
	<p class='banner'> 
	<?php
		if (isset($_SESSION['registre_success'])) {
			echo $_SESSION['registre_success'];
			$_SESSION['registre_success']=" ";
		}
	?>
	</p>
	<p style="font-weight:400; font-size:20px; text-align:center;">Connexion</p>
	<form class="form-style" action="" method="post">
		<div class="form-group ">
			<label for="exampleFormControlInput1">Nom d'utilisateur</label>
			<input type="text" name="username" class="form-control form-control-sm" required>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword3">Mot de passe</label>
			<input type="password" name="password" class="form-control form-control-sm" required>	
		</div>
		<br>
		<div class="form-group">
			<button class="btn btn-primary btn-sm" type="submit" name="submit">connexion</button>
		</div>
		<div  class="error" >
			<?php
				if (isset($_SESSION['error_connexion'])) {
					echo "<p>".$error_message."</p>";
				}
			?>
		</div>	
	</form>
	<p class="text-center" >Vous n'avez pas de compte ? <a href="index.php?action=registration">Inscrivez vous</a></p>
</div>
