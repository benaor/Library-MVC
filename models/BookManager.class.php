<?php
require_once "../models/Model.class.php";
require_once "../models/Book.class.php";

class BookManager extends Model{
    private $books; 

    public function addBook($book){
        $this->books[] = $book;
    }

    public function getBooks(){
        return $this->books; 
    }

    public function loadBooks(){
        $req = $this->getBdd()->prepare("SELECT * FROM books");
        $req->execute();
        $allBooks = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($allBooks as $book){
            $b = new Book($book['id'],$book['title'],$book['nbPages'],$book['image']);
            $this->addBook($b);
        }
    }

    public function getBookById($id){
        foreach($this->books as $book){
            if($book->getId() === $id ){
                return $book;
            }
        }
    }
}