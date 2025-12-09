<?php
declare(strict_types=1);

require_once "Persona.php";
require_once "Nota.php";
require_once "Etiqueta.php";
class Alumno extends Persona implements Nota
{
    use Etiqueta;
    public function __construct(
        int $id,
        string $dni,
        string $nombre,
        string $apellidos,
        protected int $matricula
    ) {
        parent::__construct($id, $dni, $nombre, $apellidos);
    }

    function getTipo(): string
    {
        return "Alumno";
    }

    function getNota()
    {

    }

    function setNota(float $nota)
    {

    }
}
