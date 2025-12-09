<?php

namespace App\Model;

const IVA = 1.21;
class Book
{
    protected int $id;
    protected string $isbn;
    protected string $title;
    protected string $author;
    protected float $pvp;
    protected float $iva;
    protected float $stock;
    protected int $quantity = 1;

    public function __construct(int $id, string $isbn, string $title, string $author, float $pvp, float $stock)
    {
        $this->id = $id;
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->pvp = $pvp;
        $this->iva = $pvp * IVA;
        $this->stock = $stock;
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


}