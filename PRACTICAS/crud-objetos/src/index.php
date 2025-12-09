<?php
declare(strict_types=1);
session_start();

require_once("Model/Book.php");
require_once("Model/Db.php");

use Model\Db;

// Si no hay base de datos en sesión o está corrupta, creamos una nueva
if (!isset($_SESSION["books"])) {
    $_SESSION["books"] = [];
}

// Creamos el objeto Db y le cargamos los libros guardados
$db = new Db();
$db->setBooks($_SESSION["books"]);

if (!isset($_SESSION["msg"])) {
    $_SESSION["msg"] = "";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD LIBROS</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>CRUD LIBROS</h1>
    <hr>
    <?php if (!empty($_SESSION["msg"])): ?>
        <h3 class="msg"><?= htmlspecialchars($_SESSION["msg"]) ?></h3>
        <hr>
        <?php $_SESSION["msg"] = ""; ?>
    <?php endif; ?>

    <h3>Elija una opción</h3>
    <ul>
        <li><a href="View/create.php">Crear</a></li>
        <li><a href="View/read.php">Listar</a></li>
        <li><a href="View/update.php">Modificar</a></li>
        <li><a href="View/delete.php">Eliminar</a></li>
    </ul>
</body>

</html>
