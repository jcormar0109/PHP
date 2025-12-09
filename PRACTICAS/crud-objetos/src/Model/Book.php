<?php
declare(strict_types=1);

namespace Model;


class Book
{

    public function __construct(
        public int $id,
        public string $title,
        public string $author,
        public string $publisher,
        public float $pvp,
        public mixed $image,
    ) {
    }

    // Getters
    function getId(): int
    {
        return $this->id;
    }
    function getTitle(): string
    {
        return $this->title;
    }
    function getAuthor(): string
    {
        return $this->author;
    }

    function getPublisher(): string
    {
        return $this->publisher;
    }
    function getPrice(): float
    {
        return $this->pvp;
        ;
    }

    function getImg()
    {
        return $this->image;
    }

    //Setters

    function SetId(int $id): void
    {
        $this->id = $id;
    }
    function SetPublisher(string $publisher): void
    {
        $this->publisher = $publisher;
    }
    function SetTitle(string $title): void
    {
        $this->title = $title;
    }
    function SetAuthor(string $author): void
    {
        $this->author = $author;
    }
    function SetPrice(float $price): void
    {
        $this->pvp = $price;
    }

    function SetImg($img): void
    {
        $this->image = $img;
    }
}

