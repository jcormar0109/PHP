<?php

declare(strict_types=1);
session_start();

require_once("../model/libro.php");
require_once("../model/bd.php");

$bd = $_SESSION['bd'];
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$libro = buscarLibro($bd, $id);
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
    <input type="text" name="id" id="id" value="<?=getId($libro) ?>" readonly /><br /><br />

    <label for="titulo">Título </label>
    <input type="text" name="titulo" id="titulo" value="<?=getTitulo($libro) ?>" /><br /><br />

    <label for="autor">Autor </label>
    <input type="text" name="autor" id="autor" value="<?=getAutor($libro) ?>" /><br /><br />

    <label for="pvp">PVP </label>
    <input type="text" name="pvp" id="pvp" value="<?=getPvp($libro) ?>" /><br /><br />

    <input type="submit" name="editar" value="Editar" />
</form>
