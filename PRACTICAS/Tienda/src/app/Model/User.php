<?php

namespace App\Model;

class User
{
    private int $id;
    private string $username;
    private string $dni;
    private string $passwd;
    private string $firstName;
    private string $secondName;
    private string $email;
    private string $address;

    public function __construct(int $id, string $dni, string $username , string $passwd, string $firstName, string $secondName, string $email, string $address)
    {
        $this->id = $id;
        $this->dni = $dni;
        $this->username = $username;
        $this->passwd = md5($passwd);
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->email = $email;
        $this->address = $address;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPasswd(): string
    {
        return $this->passwd;
    }

    public function setPasswd(string $passwd): void
    {
        $this->passwd = md5($passwd);
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getSecondName(): string
    {
        return $this->secondName;
    }

    public function setSecondName(string $secondName): void
    {
        $this->secondName = $secondName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDni(): string
    {
        return $this->dni;
    }

    public function setDni(string $dni): void
    {
        $this->dni = $dni;
    }


}