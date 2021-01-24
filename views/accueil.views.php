<?php 
ob_start();
?>

<!-- Start coding -->





<!-- End coding -->

<?php 
$title   = "Page d'accueil";
$content = ob_get_clean();
require "../template.php"; 
?>