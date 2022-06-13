<?php ob_start(); ?>
<?php
	include('connexionForm.php');
?>

<?php $content=ob_get_clean(); ?>
<?php require('layout.php'); ?>