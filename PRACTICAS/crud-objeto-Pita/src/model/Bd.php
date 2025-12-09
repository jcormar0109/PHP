<?php declare(strict_types=1);

namespace model;
use ArrayIterator;
use IteratorAggregate;
use Traversable;
use Countable;
use model\Libro;

class Bd implements IteratorAggregate, Countable {
    private array $libros;
    public function __construct(
    ){
        $this->libros = [];
    }
    public function insertarLibro(Libro $libro){
        $this->libros[] = $libro;
    }

    public function eliminarLibro(int $id):bool{
        $cont = 0;
        foreach ($this->libros as $libro){
            if($libro->getId() === $id){
                unset($this->libros[$cont]);
                $this->libros = array_values($this->libros);
                return true;
            }
            $cont ++;
        }
        return false;
    }

    public function actualizarLibro(Libro $newLibro, int $id):bool{
        $cont = 0;
        foreach ($this->libros as $libro){
            if($libro->getId() === $id){
                $this->libros[$cont] = $newLibro;
                return true;
            }
            $cont ++;
        }
        return false;
    }

    public function buscarLibro(int $id):mixed{
        foreach ($this->libros as $libro){
            if($libro->getId() === $id){
                return $libro;
            }
        }
        return [];
    }

    public function getCantLibros(){
        $cont = 0;
        foreach ($this->libros as $libro){
            $cont ++;
        }
        return $cont;
    }

    public function getLibros(){
        return $this->libros;
    }

    public function count():int{
        return count($this->libros);
    }

    public function getIterator():Traversable{
        return new ArrayIterator($this->libros);
    }
}
