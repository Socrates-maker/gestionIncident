<?php ob_start(); ?>
<div class="page">
<!--<h1 class="text-center">Inscription</h1>-->

<div class=" form-container ">
	<p style="font-weight:400; font-size:20px; text-align:center;">Inscription</p>
	<form class="form-style" action="index.php?action=registration" method="post">
		<div class="form-group">
			<label>Nom</label>
			<input type="text" name="lastname" class="form-control" required>
		</div>
		<div>
			<label>Prenom</label>
			<input type="text" name="firstname" class="form-control" required>
		</div>
		<div>
			<label>Nom d'utilisateur</label>
			<input type="text" name="username" class="form-control" required>
		</div>
		<div>
			<label>Email</label>
			<input type="email" name="email" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Mot de passe</label>
			<input type="password" name="password" class="form-control" required>	
		</div>
		<br>
		<div class="form-group">
			<button class="btn btn-primary btn-sm" type="submit" name="submit">Inscription</button>
		</div>
	</form>
</div>

</div>



<?php $content=ob_get_clean(); ?>
<?php require('layout.php'); ?>