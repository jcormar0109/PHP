<?php

declare(strict_types=1);

require_once("../model/Libro.php");
require_once("../model/Bd.php");

use model\Libro;
use model\Bd;

session_start();

$bd = $_SESSION['bd'];
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$libro = $bd->buscarLibro($id);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar un Libro</title>
</head>
<body>

<h2>Editar Libro</h2>
<hr />
<form method="POST" action="../controller/editar-controller.php">
    <label for="id">ID: </label>
    <input type="text" name="id" id="id" value="<?=$libro->getId() ?>" readonly /><br /><br />

    <label for="titulo">Título </label>
    <input type="text" name="titulo" id="titulo" value="<?=$libro->getTitulo() ?>" /><br /><br />

    <label for="autor">Autor </label>
    <input type="text" name="autor" id="autor" value="<?=$libro->getAutor() ?>" /><br /><br />

    <label for="pvp">PVP </label>
    <input type="text" name="pvp" id="pvp" value="<?=$libro->getPvp() ?>" /><br /><br />

    <input type="submit" name="editar" value="Editar" />
</form>
