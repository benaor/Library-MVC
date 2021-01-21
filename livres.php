<?php
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

    <tr>
        <td class="align-middle"><img src="public/images/algo.png" width="60px;" /></td>
        <td class="align-middle">Algorithmique selon H2PROG</td>
        <td class="align-middle">300</td>
        <td class="align-middle"> <a href="" class="btn btn-warning"> Modifier</a> </td>
        <td class="align-middle"> <a href="" class="btn btn-danger"> Supprimer</a> </td>
    </tr>
    <tr>
        <td class="align-middle"><img src="public/images/virus.png" width="60px;"></td>
        <td class="align-middle">Le virus Asiatique</td>
        <td class="align-middle">200</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
</table>

<a href="" class="btn btn-success d-block">Ajouter</a>

<!-- End coding -->
<?php
$title   = "Liste des livres";
$content = ob_get_clean();
require "template.php";
?>