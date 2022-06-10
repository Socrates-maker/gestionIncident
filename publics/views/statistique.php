<?php ob_start(); ?>
<hr>

<div><h1 style="text-align:center;">Page des statistiques</h1></div>

<?php 
$content = ob_get_clean();
require("layout.php");

?>