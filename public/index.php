<?php

if (empty($_GET['page'])) {
    require "../views/accueil.views.php";
} else {
    switch ($_GET['page']) {
        case 'accueil': require "../views/accueil.views.php";
            break;
        case 'livres': require "../views/livres.views.php";
    }
}

