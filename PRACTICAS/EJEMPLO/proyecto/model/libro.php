<?php declare(strict_types=1);

function crearLibro(int $id, string $titulo, string $autor, float $pvp):array
{
    return [
        "id" => $id,
        "titulo" => $titulo,
        "autor" => $autor,
        "pvp" => $pvp
    ];
}

function getId(array $libro): int
{
    return $libro["id"];
}
function getTitulo(array $libro): string
{
    return $libro["titulo"];
}
function getAutor(array $libro): string
{
    return $libro["autor"];
}
function getPVP(array $libro): float
{
    return $libro["pvp"];
}

function setId(array &$libro, int $id): void
{
    $libro["id"] = $id;
}

function setTitulo(array &$libro, string $titulo): void
{
    $libro["titulo"] = $titulo;
}

function setAutor(array &$libro, string $autor): void
{
    $libro["autor"] = $autor;
}

function setPvp(array &$libro, float $pvp): void
{
    $libro["pvp"] = $pvp;
}