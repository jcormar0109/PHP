<?php
    declare(strict_types= 1); 
    session_start();

    require_once("../model/book.php");
    require_once("../model/db.php");

    $db = $_SESSION["db"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
</head>
<body>
<h2>Editar Libro</h2>
<form action="../controller/update-controller.php" method="post">
    <label for="id">ID:</label>
    <input type="text" name="id" id="id" ><br><br>

    <label for="title">Nuevo título:</label>
    <input type="text" name="title" id="title" ><br><br>

    <label for="author">Nuevo autor:</label>
    <input type="text" name="author" id="author" ><br><br>

    <label for="publisher">Nueva editorial:</label>
    <input type="text" name="publisher" id="publisher" ><br><br>

    <label for="pvp">Nuevo precio:</label>
    <input type="number" step="0.01" name="pvp" id="pvp" value="0"><br><br>

    <label for="img">Nueva imagen:</label>
    <input type="text" name="img" id="img"><br><br>

    <button type="submit" name="update">Actualizar</button>
</form>
</body>
</html>
