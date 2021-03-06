<?php ob_start(); ?>
<!-- Start coding -->

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de page</th>
        <th colspan="2">Actions</th>
    </tr>

    <?php
    foreach ($books as $book) {
    ?>
        <tr>
            <td class="align-middle"><img src="../public/images/<?= $book->getImage() ?>" width="60px;" /></td>
            <td class="align-middle">
            <a href="<?= URL ?>livres/show/<?= $book->getId() ?>"><?= $book->getTitle() ?></a>
            </td>
            <td class="align-middle"><?= $book->getnbPages() ?></td>
            <td class="align-middle"> <a href="" class="btn btn-warning"> Modifier</a> </td>
            <td class="align-middle"> <a href="" class="btn btn-danger"> Supprimer</a> </td>
        </tr>
    <?php } ?>
</table>

<a href="<?= URL ?>livres/add" class="btn btn-success d-block">Ajouter</a>

<!-- End coding -->
<?php
$title   = "Liste des livres";
$content = ob_get_clean();
require "../views/template.view.php";
?>