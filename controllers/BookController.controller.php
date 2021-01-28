<?php
require_once "../models/BookManager.class.php";

class BookController
{
    private $bookManager;

    public function __construct()
    {
        $this->bookManager = new BookManager;
        $this->bookManager->loadBooks();
    }

    public function showBooks()
    {
        $books = $this->bookManager->getBooks();
        require "../views/livres.view.php";
    }

    public function showBook($id)
    {
        $book = $this->bookManager->getBookById($id);
        require "../views/showBook.view.php";
    }

    public function addBook()
    {
        require "../views/addBook.view.php";
    }

    public function addBookValidation()
    {
        $file = $_FILES['image'];
        $directory = "../public/images/";
        $addedImage = $this->addImage($file, $directory);

        $this->bookManager->addBookInDataBase($_POST['title'], $_POST['nbPages'], $addedImage);
        header('location: '. URL . 'livres');
        // require "../views/addBookValidation.view.php"; 
    }

    /**
     * Permet d'ajouter une image dans le dossier image, et return le nom généré aleatoirement de celle-ci
     *
     * @param [File] $file
     * @param [String] $dir
     * @return String
     */
    private function addImage($file, $dir)
    {

        //On vérifie si le fichier existe
        if (!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez insérer une image !");
            
        //On crée le dossier de reception de l'image si il n'existe pas
        if (!file_exists($dir)) mkdir($dir, 0777);

        //On génére un chemin et nouveau nom a l'image pour éviter les doublons
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random    = rand(0, 99999);
        $newFileName = $random . "_" . $file['name'];
        $target_file = $dir . $newFileName;

        //On fait quelques vérifications sur le fichier.
        if (!getimagesize($file['tmp_name']))
            throw new Exception("Vous devez uploader une image !");
        if ($extension !== "jpg" && $extension !== "png" && $extension !== "jpeg" && $extension !== "gif")
            throw new Exception("extension de fichier non pris en charge");
        if (file_exists($target_file))
            throw new Exception("Une erreur est survenue lors de la génération du nom. Réessayer");
        if ($file['size'] > 500000)
            throw new Exception("Le fichier est trop volumineux");
        if (!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("L'ajout de l'image n'a pas fonctionné");

        //Si tout est Ok, on return le nouveau nom du fichier
        else return ($newFileName);
    }
}
