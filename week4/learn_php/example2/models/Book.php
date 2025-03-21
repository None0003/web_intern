<?php
class Book {
    private $id;
    private $title;
    private $author;
    private $price;

    public function __construct($id, $title, $author, $price) {
        $this->id = $id;   
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPrice() {
        return $this->price;
    }

    public static function getAllBooks() {
        $existingData = file_get_contents('book_data.json');
        $books_data = json_decode($existingData, true);
        $books = [];
        foreach ($books_data as $book) {
            $book = new Book($book['id'], $book['title'], $book['author'], $book['price']);
            $books[] = $book;
        }
        return $books;
    }
}