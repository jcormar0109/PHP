<?php

declare(strict_types=1);

require_once("../vendor/autoload.php");

use App\Model\Bd;
use App\Model\Libro;

session_start();

$bd = Bd::getInstance();

if(isset($_POST["crear"])){
    $id     = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);
    $autor  = filter_input(INPUT_POST, "autor", FILTER_SANITIZE_SPECIAL_CHARS);
    $pvp    = filter_input(INPUT_POST, "pvp", FILTER_VALIDATE_FLOAT);

    $libro = new Libro($id, $titulo, $autor, $pvp);
    $bd->insertarLibro($libro);

    $_SESSION["msg"] = "Libro creado";

} else {

    $_SESSION["msg"] = "Error al crear el libro";

}

$_SESSION["bd"] = $bd;
header("Location: ../index.php");