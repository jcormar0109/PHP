<?php

namespace App\Model;


class Details
{
    private int $id;
    private int $invoice_id;
    private int $book_id;
    private string $isbn;
    private string $title;
    private float $pvp;
    private int $quant;

    /**
     * @param int $id
     * @param int $invoice_id
     * @param int $book_id
     * @param string $isbn
     * @param string $title
     * @param float $pvp
     * @param int $quant
     */
    public function __construct(int $id, int $invoice_id, int $book_id, string $isbn, string $title, float $pvp, int $quant)
    {
        $this->id = $id;
        $this->invoice_id = $invoice_id;
        $this->book_id = $book_id;
        $this->isbn = $isbn;
        $this->title = $title;
        $this->pvp = $pvp;
        $this->quant = $quant;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getInvoiceId(): int
    {
        return $this->invoice_id;
    }

    public function setInvoiceId(int $invoice_id): void
    {
        $this->invoice_id = $invoice_id;
    }

    public function getBookId(): int
    {
        return $this->book_id;
    }

    public function setBookId(int $book_id): void
    {
        $this->book_id = $book_id;
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

    public function getPvp(): float
    {
        return $this->pvp;
    }

    public function setPvp(float $pvp): void
    {
        $this->pvp = $pvp;
    }

    public function getQuant(): int
    {
        return $this->quant;
    }

    public function setQuant(int $quant): void
    {
        $this->quant = $quant;
    }


}