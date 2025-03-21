<?php
require_once "models/Book.php";

class BookController {
    public function index() {
        $books = Book::getAllBooks();

        require_once "views/book_list.php";
    }
}