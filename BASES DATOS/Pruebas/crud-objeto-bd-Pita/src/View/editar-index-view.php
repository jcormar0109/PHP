<?php

declare(strict_types=1);
session_start();
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
<form method="GET" action="editar-view.php">
    <label for="id">ID: </label><input type="text" name="id" id="id" /><br /><br />
    <input type="submit" name="editar" value="Editar" />
</form>
</body>
</html>