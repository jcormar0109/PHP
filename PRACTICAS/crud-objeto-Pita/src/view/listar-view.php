<?php

declare(strict_types=1);

require_once("../model/Libro.php");
require_once("../model/Bd.php");

use model\Libro;
use model\Bd;

session_start();


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
        $id = $libro->getId();
        echo "<li>ID: <a href=\"editar-view.php?id=$id\">$id</a></li>";
        echo "<li>Título: " . $libro->getTitulo() . "</li>";
        echo "<li>Autor: " . $libro->getAutor() . "</li>";
        echo "<li>PVP: " . $libro->getPvp() . " €</li>";
        echo "</ul>";
        echo "<hr/>";
    }
?>
<a href="../index.php">Volver al menú</a>
</body>
</html>