<?php
    declare(strict_types=1); 
    session_start();
    $db = $_SESSION["db"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Libro</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <h1>Crear un Libro</h1>
    <hr>

    <form action="../controller/create-controller.php" method="POST" 
        class="form-container"
        enctype="multipart/form-data">
        <label for="id">ID del libro:</label>
        <input type="number" id="id" name="id" required>

        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>

        <label for="author">Autor:</label>
        <input type="text" id="author" name="author" required>

        <label for="author">Editorial:</label>
        <input type="text" id="publisher" name="publisher" required>

        <label for="pvp">Precio (PVP):</label>
        <input type="number" step="0.01" id="pvp" name="pvp" required>

        <label for="pvp">Imagen:</label>
        <input type="file" id="img" name="img" >

        <button type="submit" name="create" value="save">Crear Libro</button>
        <a href="../index.php" class="back-link">⬅ Volver al menú</a>
    </form>
</body>
</html>
