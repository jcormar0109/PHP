<?php

namespace App\Model;

use Cassandra\Date;

class Invoice
{
    private int $id;
    private string $date;
    private string $n_invoice;
    private int $client_id;
    private string $dni;
    private string $first_name;
    private string $second_name;
    private string $address;
    private int $iva;

    /**
     * @param int $id
     * @param string $date
     * @param string $n_invoice
     * @param int $client_id
     * @param string $dni
     * @param string $first_name
     * @param string $second_name
     * @param string $address
     * @param int $iva
     */
    public function __construct(int $id, string $date, string $n_invoice, int $client_id, string $dni, string $first_name, string $second_name, string $address, int $iva)
    {
        $this->id = $id;
        $this->date = $date;
        $this->n_invoice = $n_invoice;
        $this->client_id = $client_id;
        $this->dni = $dni;
        $this->first_name = $first_name;
        $this->second_name = $second_name;
        $this->address = $address;
        $this->iva = $iva;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getNInvoice(): string
    {
        return $this->n_invoice;
    }

    public function setNInvoice(string $n_invoice): void
    {
        $this->n_invoice = $n_invoice;
    }

    public function getClientId(): int
    {
        return $this->client_id;
    }

    public function setClientId(int $client_id): void
    {
        $this->client_id = $client_id;
    }

    public function getDni(): string
    {
        return $this->dni;
    }

    public function setDni(string $dni): void
    {
        $this->dni = $dni;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function getSecondName(): string
    {
        return $this->second_name;
    }

    public function setSecondName(string $second_name): void
    {
        $this->second_name = $second_name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getIva(): int
    {
        return $this->iva;
    }

    public function setIva(int $iva): void
    {
        $this->iva = $iva;
    }


}