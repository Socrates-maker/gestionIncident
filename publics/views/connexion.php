<?php ob_start(); ?>
<div class="page">
	<!--<h1 class="text-center">Connexion</h1>-->

	<?php
		if ($confirm_message) {
			echo "<p class='banner'> Inscription reussie. Vous pouvez vous connecter.</p>";
		}
	?>
<div class="container form-container">
	<p style="font-weight:400; font-size:20px; text-align:center;">Connexion</p>
	<form class="form-style" action="" method="post">
		<div class="form-group ">
			<label for="exampleFormControlInput1">Nom d'utilisateur</label>
			<input type="text" name="username" class="form-control form-control-sm">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword3">Mot de passe</label>
			<input type="password" name="password" class="form-control form-control-sm">	
		</div>
		<br>
		<div class="form-group">
			<button class="btn btn-primary btn-sm" type="submit" name="submit">connexion</button>
		</div>
		<div  class="error" >
			<?php
				if ($error) {
					echo "<p>".$error_message."</p>";
				}
			?>
		</div>	
	</form>
	<p class="text-center" >Vous n'avez pas de compte ? <a href="index.php?action=registration">Inscrivez vous</a></p>
</div>

</div>


<?php $content=ob_get_clean(); ?>
<?php require('layout.php'); ?>