<?php

declare(strict_types=1);

require_once("../vendor/autoload.php");
use App\Model\Bd;

session_start();

$bd = Bd::getInstance();
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$libro = $bd->buscarLibro($id);
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
<form method="POST" action="../Controller/editar-controller.php">
    <label for="id">ID: </label>
    <input type="text" name="id" id="id" value="<?php echo $libro[0]["ID"]?>" readonly /><br /><br />

    <label for="titulo">Título </label>
    <input type="text" name="titulo" id="titulo" value="<?php echo $libro[0]["TITULO"]?>" /><br /><br />

    <label for="autor">Autor </label>
    <input type="text" name="autor" id="autor" value="<?php echo $libro[0]["AUTOR"]?>" /><br /><br />

    <label for="pvp">PVP </label>
    <input type="text" name="pvp" id="pvp" value="<?php echo $libro[0]["PVP"]?>" /><br /><br />

    <input type="submit" name="editar" value="Editar" />
</form>
