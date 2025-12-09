<?php

declare(strict_types=1);
require_once("../model/Libro.php");
require_once("../model/Bd.php");
use model\Libro;
use model\Bd;
session_start();

$bd= $_SESSION['bd'];

if(isset($_POST["eliminar"])) {
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    if($id){
        if($bd->eliminarLibro($id)){
            $_SESSION["bd"] = $bd;
            $_SESSION["msg"] = "Libro eliminado";
            header("Location: ../index.php");
        } else {
            $_SESSION["msg"] = "Error al eliminar el libro";
            header("Location: ../index.php");
        }
    } else {
        $_SESSION["msg"] = "Error: ID no válido";
        header("Location: ../index.php");
    }
}
