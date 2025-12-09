<?php
declare(strict_types=1);
session_start();

$out = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir un Libro</title>
</head>
<body>

<h2>Añadir Libro</h2>
<hr />
<form method="POST" action="../controller/crear-controller.php">
    <label for="id">ID: </label>
    <input type="text" name="id" id="id" /><br /><br />

    <label for="titulo">Título </label>
    <input type="text" name="titulo" id="titulo" /><br /><br />

    <label for="autor">Autor </label>
    <input type="text" name="autor" id="autor" /><br /><br />

    <label for="pvp">PVP </label>
    <input type="text" name="pvp" id="pvp" /><br /><br />

    <input type="submit" name="crear" value="Guardar" />
</form>
</body>
</html>
HTML;

echo $out;