<?php

declare(strict_types=1);
require_once("../vendor/autoload.php");

use App\Model\Bd;

session_start();

$bd = Bd::getInstance();

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
