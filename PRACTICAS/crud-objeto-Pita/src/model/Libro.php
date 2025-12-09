<?php declare(strict_types=1);

namespace model;

class Libro {
    public function __construct(
        public int $id,
        public string $titulo,
        public string $autor,
        public float $pvp,
    )
    {
    }

    public function getId(): int{
        return $this->id;
    }
    public function getTitulo(): string{
        return $this->titulo;
    }

    public function getAutor(): string{
        return $this->autor;
    }

    public function getPvp(): float{
        return $this->pvp;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setTitulo(string $titulo): void{
        $this->titulo = $titulo;
    }

    public function setAutor(string $autor): void{
        $this->autor = $autor;
    }

    public function setPvp(float $pvp): void{
        $this->pvp = $pvp;
    }
}
