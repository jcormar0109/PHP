<?php
declare(strict_types=1);
abstract class Persona
{
    public function __construct(
        protected int $id,
        protected string $dni,
        protected string $nombre,
        protected string $apellidos
    ) {

    }

    public function getNombreCompleto(): string
    {
        return $this->apellidos . "," . $this->nombre . "<br/>";
    }

    abstract public function getTipo(): string;
}
