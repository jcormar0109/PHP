<?php

declare(strict_types=1);
require_once '../vendor/autoload.php';

use App\Model\Bd;

session_start();


$bd = Bd::getInstance();

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
    $salida = $bd->getLibros();
    $cont = 1;
    foreach ($salida as $fila) {
        echo "<br>LIBRO $cont:<br>";
        echo "Id: ". $fila["ID"]."<br>";
        echo "Titulo: " . $fila["TITULO"] . "<br>";
        echo "Autor: " . $fila["AUTOR"] . "<br>";
        echo "Precio: " . $fila["PVP"] . "<br>";
        $cont ++;
    }
?>
<a href="../index.php">Volver al menú</a>
</body>
</html>