<?php

declare(strict_types=1);
session_start();

require_once("../model/libro.php");
require_once("../model/bd.php");

$bd = $_SESSION["bd"];

if(isset($_POST["crear"])){
    $id     = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);
    $autor  = filter_input(INPUT_POST, "autor", FILTER_SANITIZE_SPECIAL_CHARS);
    $pvp    = filter_input(INPUT_POST, "pvp", FILTER_VALIDATE_FLOAT);

    $libro = crearLibro($id, $titulo, $autor, $pvp);
    insertarLibro($bd, $libro);

    $_SESSION["msg"] = "Libro creado";

} else {

    $_SESSION["msg"] = "Error al crear el libro";

}

$_SESSION["bd"] = $bd;
header("Location: ../index.php");