<?php

namespace App\Model;

class User
{
   private int $id;
   private string $name;
   private string $password;
   private int $rol;

    public function __construct($id, $name, $password, $rol = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = md5($password);
        $this->rol = $rol;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    public function getRol(): mixed
    {
        return $this->rol;
    }

    public function setRol(mixed $rol): void
    {
        $this->rol = $rol;
    }

}