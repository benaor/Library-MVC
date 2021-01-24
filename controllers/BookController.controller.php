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

    public function showBooks() {
        $books = $this->bookManager->getBooks();
        require "../views/livres.view.php"; 
    }
}
