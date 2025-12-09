<?php

namespace app\Model;

class Book
{
    private int $id;
    private string $title;
    private string $author;
    private float $pvp;
    private float $pvpIva;

    public function __construct(int $id, string $title, string $author, float $pvp, float $pvpIva)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->pvp = $pvp;
        $this->pvpIva = $pvpIva;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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

    public function getPvpIva(): float
    {
        return $this->pvpIva;
    }

    public function setPvpIva(float $pvpIva): void
    {
        $this->pvpIva = $pvpIva;
    }
    
}