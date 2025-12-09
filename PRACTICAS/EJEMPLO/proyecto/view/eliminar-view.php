<?php

declare(strict_types=1);
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar un Libro</title>
</head>
<body>

<h2>Eliminar Libro</h2>
<hr />
<form method="POST" action="../controller/eliminar-controller.php">
    <label for="id">ID: </label><input type="text" name="id" id="id" /><br /><br />
    <input type="submit" name="eliminar" value="Eliminar" />
</form>
</body>
</html>