<?php

class Persona
{
    public function __construct(
        public int $id,
        public string $name,
        public int $age,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getAge(): int
    {
        return $this->age;
    }

    public function toString(): string
    {
        $salida = "Id: " . $this->getId() . ", Nombre: " . $this->getName() . ", Edad: " . $this->getAge() . "<br/>";
        return $salida;
    }
}
