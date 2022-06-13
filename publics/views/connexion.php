<?php ob_start(); ?>
<!--<div class="page">-->
	<?php include("connexionForm.php") ?>
<!--</div>-->


<?php $content=ob_get_clean(); ?>
<?php require('layout.php'); ?>