<?php

declare(strict_types=1);
session_start();

require_once("../model/libro.php");
require_once("../model/bd.php");

$bd = $_SESSION['bd'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Libros</title>
</head>
<body>

<h2>Listar Libro (<?=count($bd); ?>)</h2>
<hr />
<?php
foreach($bd as $libro) {
    echo "<ul>";
    $id = getId($libro);
    echo "<li>ID: <a href=\"editar-view.php?id=$id\">$id</a></li>";
    echo "<li>Título: ".getTitulo($libro)."</li>";
    echo "<li>Autor: ".getAutor($libro)."</li>";
    echo "<li>PVP: ".getPVP($libro)." €</li>";
    echo "</ul>";
    echo "<hr/>";

}
?>
<a href="../index.php">Volver al menú</a>
</body>
</html>