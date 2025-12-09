<?php
declare(strict_types=1);

require_once("vendor/autoload.php");

session_start();

$_SESSION["msg"] ??= "";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-ARRAYS</title>
</head>
<body>
<h2>Librería 2</h2>
<hr />
<?php

if(!empty($_SESSION["msg"])){
    echo "<h3>{$_SESSION["msg"]}</h3><hr/>";
}

?>
<ul>
    <li><a href="View/crear-view.php">Añadir un Libro (C)</a></li>
    <li><a href="View/listar-view.php">Listar Libros (R)</a></li>
    <li><a href="View/editar-index-view.php">Editar Libro (U)</a></li>
    <li><a href="View/eliminar-view.php">Eliminar un Libro (D)</a></li>
</ul>
</body>
</html>

