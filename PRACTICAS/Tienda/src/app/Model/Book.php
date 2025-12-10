<?php

namespace App\Model;

const IVA = 1.21;
class Book
{
    private int $id;
    private string $isbn;
    private string $title;
    private string $author;
    private float $pvp;
    private float $iva;
    private float $stock;
    private string $resume;
    private int $quantity = 1;

    public function __construct(int $id, string $isbn, string $title, string $author, float $pvp, string $resume, float $stock)
    {
        $this->id = $id;
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->pvp = $pvp;
        $this->iva = $pvp * IVA;
        $this->stock = $stock;
        $this->resume = $resume;
        $this->quantity = 1;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
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

    public function getIva(): float
    {
        return $this->iva;
    }

    public function setIva(float $iva): void
    {
        $this->iva = $iva;
    }

    public function getStock(): float
    {
        return $this->stock;
    }

    public function setStock(float $stock): void
    {
        $this->stock = $stock;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $choice): void
    {
        if ($choice === 1){
            $this->quantity += 1;
        } else {
            $this->quantity -= 1;
        }

    }

    public function getResume(): string
    {
        return $this->resume;
    }

    public function setResume(string $resume): void
    {
        $this->resume = $resume;
    }


}