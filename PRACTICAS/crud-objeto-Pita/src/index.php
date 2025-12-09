<?php
declare(strict_types=1);

require_once("model/Bd.php");
require_once("model/Libro.php");
use model\Libro;
use model\Bd;

session_start();
$bd = new Bd();


$_SESSION["bd"] ??= $bd;
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
    <li><a href="view/crear-view.php">Añadir un Libro (C)</a></li>
    <li><a href="view/listar-view.php">Listar Libros (R)</a></li>
    <li><a href="view/editar-index-view.php">Editar Libro (U)</a></li>
    <li><a href="view/eliminar-view.php">Eliminar un Libro (D)</a></li>
</ul>
</body>
</html>

