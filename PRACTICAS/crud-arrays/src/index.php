<?php
declare(strict_types=1);
session_start();

require_once("model/book.php");
require_once("model/db.php");

if (!isset($_SESSION["db"])) {
    $_SESSION["db"] = [];
}
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
    <?php if (!empty($_SESSION["msg"])){
        $mySesionMsg = htmlspecialchars($_SESSION["msg"]);
        echo "<h3 class=\"msg\"> $mySesionMsg</h3>";
        echo "<hr>";
        $_SESSION["msg"] = ""; 
    }
    ?>
    <h3>Elija una opción</h3>
    <ul>
        <li><a href="view/create.php">Crear</a></li>
        <li><a href="view/read.php">Listar</a></li>
        <li><a href="view/update.php">Modificar</a></li>
        <li><a href="view/delete.php">Eliminar</a></li>
    </ul>
</body>
</html>
