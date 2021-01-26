<?php ob_start(); ?>
<!-- Start coding -->


<div class="row">
    <div class="col-6">
        <img src="<?= URL ?>images/<?= $book->getImage() ?>" alt="">
    </div>
    <div class="col-6">
        <p>Titre : <?= $book->getTitle() ?></p>
        <p>Nombre de pages : <?= $book->getNbPages() ?></p>
    </div>
</div>


<!-- End coding -->
<?php
$title   = $book->getTitle();
$content = ob_get_clean();
require "../views/template.view.php";
?>