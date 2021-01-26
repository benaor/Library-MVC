<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "../controllers/BookController.controller.php";
$bookController = new BookController;

try {
    if (empty($_GET['page'])) {
        require "../views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case 'accueil':
                require "../views/accueil.view.php";
                break;
            case "livres":
                if (empty($url[1])) {
                    $bookController->showBooks();
                } else {
                    switch ($url[1]) {
                        case 'show':
                            $bookController->showBook($url[2]); // Need create the method
                            break;
                        case 'add':
                            echo "Page d'ajout";
                            break;
                        case 'edit':
                            echo "Page de modification";
                            break;
                        case 'delete':
                            echo "Page de suppression";
                            break;
                        default:
                            throw new Exception("404 NOT FOUND, PARAMETER INVALID");
                            break;
                    }
                }
                break;
            default:
                throw new Exception("404 NOT FOUND");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
