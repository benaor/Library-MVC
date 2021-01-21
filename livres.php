<?php 
ob_start();
?>
<!-- Start coding -->



<!-- End coding -->
<?php 
$title   = "Liste des livres"; 
$content = ob_get_clean();
require "template.php"; 
?>