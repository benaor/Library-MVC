<?php

class BookManager {
    private $books; 

    public function addBook($book){
        $this->books[] = $book;
    }

    public function getBooks(){
        return $this->books; 
    }
}