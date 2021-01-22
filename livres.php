<?php

require_once "Book.class.php";
$book1 = new Book(1, "algorithmique selon H2PROG", 300, "algo.png");
$book2 = new Book(2, "Le virus asiatique", 200, "virus.png");
$book3 = new Book(3, "La france du 19ieme", 100, "france.png");
$book4 = new Book(4, "algorithmique selon H2PROG", 500, "JS.png");

require "BookManager.class.php"; 
$bookManager = new BookManager;
$bookManager->addBook($book1);
$bookManager->addBook($book2);
$bookManager->addBook($book3);
$bookManager->addBook($book4);

ob_start();
?>
<!-- Start coding -->

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de page</th>
        <th colspan="2">Actions</th>
    </tr>

    <?php

    foreach ($bookManager->getBooks() as $book) {
    ?>
        <tr>
            <td class="align-middle"><img src="public/images/<?= $book->getImage() ?>" width="60px;" /></td>
            <td class="align-middle"><?= $book->getTitle() ?></td>
            <td class="align-middle"><?= $book->getnbPages() ?></td>
            <td class="align-middle"> <a href="" class="btn btn-warning"> Modifier</a> </td>
            <td class="align-middle"> <a href="" class="btn btn-danger"> Supprimer</a> </td>
        </tr>
    <?php } ?>
</table>

<a href="" class="btn btn-success d-block">Ajouter</a>

<!-- End coding -->
<?php
$title   = "Liste des livres";
$content = ob_get_clean();
require "template.php";
?>