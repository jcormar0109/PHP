<?php

namespace App\Model;

class User
{
    private int $id;
    private string $username;
    private string $passwd;
    public function __construct(int $id, string $username, string $passwd)
    {
        $this->id = $id;
        $this->username = $username;
        $this->passwd = md5($passwd);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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

    public function __toString(): string
    {
        return "USER[{$this->getId()}, {$this->getUsername()}, {$this->getPasswd()}]";
    }
}