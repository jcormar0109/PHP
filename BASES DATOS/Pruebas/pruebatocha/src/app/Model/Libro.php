<?php

namespace App\Model;

class Libro
{
    private int $id;
    private string $title;
    private string $author;
    private float $pvp;

    public function __construct(string $title, string $author, float $pvp)
    {
        $this->title = $title;
        $this->author = $author;
        $this->pvp = $pvp;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getPvp(): float
    {
        return $this->pvp;
    }

    public function setPvp(float $pvp): void
    {
        $this->pvp = $pvp;
    }


}