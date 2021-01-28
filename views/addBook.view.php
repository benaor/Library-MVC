<?php ob_start(); ?>
<!-- Start coding -->

<form method="POST" action="<?= URL ?>livres/validation" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Titre du livre">
    </div>
    <div class="form-group">
        <label for="nbPages">Nombre de pages :</label>
        <input type="Number" class="form-control" id="nbPages" name="nbPages" placeholder="Nombre de pages">
    </div>
    <div class="form-group">
        <label for="image">Image :</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>


<!-- End coding -->
<?php
$title   = "Ajout d'un livre";
$content = ob_get_clean();
require "../views/template.view.php";
?>