<?php
    declare (strict_types = 1);
    require_once '../../vendor/autoload.php';

    use App\Model\Db;

    session_start();

    $db = Db::getInstance();

    if (isset($_SESSION['msg'])) {
        echo "<h3>".$_SESSION['msg']."</h3>";
        echo "<hr/>";
        unset($_SESSION['msg']);
    }

    $user = $_SESSION["user"];

    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    Administrador: Sesion iniciada como <?php echo $user->getName()?>
    <a href="../Controller/logout-controller.php">Cerrar Sesión</a>

    <h3>Selecciona una opcion:</h3>
    <ul>
        <li><a href="">Añadir Libro</a></li>
        <li><a href="">Modificar Libro</a></li>
        <li><a href="listar-view.php">Listar Libros</a></li>
        <li><a href="">Eliminar Libro</a></li>
    </ul>
</body>
</html>
