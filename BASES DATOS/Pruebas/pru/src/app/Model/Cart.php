<?php

namespace app\Model;

use app\Model\Book;

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

    public function remove(Book $book):bool{
        $key = array_search($book, $this->books, true);
        if($key !== false){
            unset($this->books[$key]);
            return true;
        } else
            return false;
    }

    public function count(): int{
        return count($this->books);
    }

    public function getIterator(): Traversable{
        return new ArrayIterator($this->books);
    }
}