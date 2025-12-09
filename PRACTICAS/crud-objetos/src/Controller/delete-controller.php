<?php
declare(strict_types=1);
session_start();

require_once("../Model/Book.php");
require_once("../Model/Db.php");
use Model\Book;
use Model\Db;

$db = $_SESSION["db"] ?? new Db(); // referencia directa

if (isset($_POST["delete"])) {
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

    if ($id) {

        $deleted = removeBook($id);

        if ($deleted) {
            $_SESSION["msg"] = "Libro eliminado correctamente.";
        } else {
            $_SESSION["msg"] = "No se encontró un libro con ese ID.";
        }

    } else {
        $_SESSION["msg"] = "ERROR: ID no válido.";
    }

    header("Location: ../index.php");
    exit;
}
