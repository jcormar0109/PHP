<?php declare(strict_types=1);

function crearDB():array
{
    return [];
}

function insertarLibro(array &$bd, array $libro): void
{
    $bd[] = $libro;
}

function eliminarLibro(array &$bd, int $id):bool
{
    foreach($bd as $i => $libro){
        if($libro["id"]===$id){
            unset($bd[$i]);
            $bd = array_values($bd);
            return true;
        }
    }

    return false;
}

function actualizarLibro(array &$bd, int $id, array $newlibro):bool
{
    foreach($bd as &$libro){
        if($libro["id"]===$id){
            $libro = array_merge($libro, $newlibro);
            return true;
        }
    }
    return false;
}

function buscarLibro(array $bd, int $id): array
{
    foreach($bd as $libro){
        if($libro["id"]===$id){
            return $libro;
        }
    }
    return [];
}
