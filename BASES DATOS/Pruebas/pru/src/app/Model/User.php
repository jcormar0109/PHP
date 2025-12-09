<?php

namespace app\Model;

class User
{
    private string $username;
    private string $passwd;
    private string $fisrtName;
    private string $secondName;
    private string $email;
    private string $address;

    public function __construct(string $username, string $passwd, string $fisrtName, string $secondName, string $email, string $address)
    {
        $this->username = $username;
        $this->passwd = md5($passwd);
        $this->fisrtName = $fisrtName;
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

    public function getFisrtName(): string
    {
        return $this->fisrtName;
    }

    public function setFisrtName(string $fisrtName): void
    {
        $this->fisrtName = $fisrtName;
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


}