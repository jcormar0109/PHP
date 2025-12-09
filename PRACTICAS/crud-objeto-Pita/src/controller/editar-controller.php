<?php

declare(strict_types=1);

require_once("../model/Bd.php");
require_once("../model/Libro.php");
use model\Libro;
use model\Bd;

session_start();

$bd = $_SESSION['bd'];

if(isset($_POST["editar"])){
    $id     = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);
    $autor  = filter_input(INPUT_POST, "autor", FILTER_SANITIZE_SPECIAL_CHARS);
    $pvp    = filter_input(INPUT_POST, "pvp", FILTER_VALIDATE_FLOAT);

    $libro = new Libro($id, $titulo, $autor, $pvp);
    $bd->actualizarLibro($libro, $id); // ✅ aquí el orden correcto

    $_SESSION["msg"] = "Libro actualizado";
} else {
    $_SESSION["msg"] = "Error al actualizar el libro";
}

$_SESSION["bd"] = $bd;
header("Location: ../index.php");
exit;
