<?php
declare(strict_types=1);

namespace Model;

use Model\Book;

class Db
{
    private array $books = [];

    public function __construct()
    {
        $this->books = [];
    }

    public function getBooks(): array
    {
        return $this->books;
    }

    public function setBooks(array $books): void
    {
        $this->books = $books;
    }

    public function checkBook(int $id): bool
    {
        foreach ($this->books as $book) {
            if ($book instanceof Book && $book->id === $id) {
                return true;
            }
        }
        return false;
    }

    public function insertBook(Book $book): void
    {
        if (!$this->checkBook($book->id)) {
            $this->books[] = $book;
        }
    }

    public function removeBook(int $id): bool
    {
        foreach ($this->books as $index => $book) {
            if ($book instanceof Book && $book->id === $id) {
                unset($this->books[$index]);
                $this->books = array_values($this->books);
                return true;
            }
        }
        return false;
    }

    public function updateBook(
        int $id,
        ?string $title = null,
        ?string $author = null,
        ?string $publisher = null,
        ?float $pvp = null,
        ?string $img = null
    ): bool {
        foreach ($this->books as $index => $book) {
            if ($book instanceof Book && $book->id === $id) {
                if ($title !== null)
                    $book->title = $title;
                if ($author !== null)
                    $book->author = $author;
                if ($publisher !== null)
                    $book->publisher = $publisher;
                if ($pvp !== null)
                    $book->pvp = $pvp;
                if ($img !== null)
                    $book->img = $img;
                $this->books[$index] = $book;
                return true;
            }
        }
        return false;
    }
}
