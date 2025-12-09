<?php

namespace App\Model;

use App\Model\Book;

use Countable;
use IteratorAggregate;
use ArrayIterator;
use Traversable;


class Cart implements IteratorAggregate, Countable{
    private array $books;

    public function __construct(){
        $this->books = [];
    }

    public function add(Book $book){
        $this->books[] = $book;
    }

    public function remove(Book $bookCheck):bool{
        $cont = 0;
        foreach($this->books as $book){
            if($book->getIsbn() === $bookCheck->getIsbn()){
                $key = $cont;
            } else $cont++;
        }
        if($key !== false){
            unset($this->books[$key]);
            $this->books = array_values($this->books);
            return true;
        } else
            return false;
    }

    public function count(): int{
        return count($this->books);
    }

    public function hasBook(Book $bookCheck):bool{
        foreach($this->books as $book){
            if($book->getIsbn() === $bookCheck->getIsbn()){
                return true;
            }
        }
        return false;
    }

    public function sumBookQuant(Book $book):void{
        $key = array_search($book, $this->books);
        if ($key !== false) {
            $this->books[$key]->setQuantity(1);
        }
    }

    public function restBookQuant(Book $book):void{
        $key = array_search($book, $this->books);
        if ($key !== false) {
            $this->books[$key]->setQuantity(2);
        }
    }


    public function getIterator(): Traversable{
        return new ArrayIterator($this->books);
    }

    public function getBook(int $index):Book{
        return $this->books[$index];
}
}