<?php
    session_start();

    if (isset($_SESSION['user'])) {
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Document</title>
        </head>
        <body>
        <h1>Elige una opcion</h1>
            <ul>
                <li><a href="add.php">Añadir</a></li>
                <li><a href="remove.php">ELimiar</a></li>
                <li><a href="list-books.php">Ver todos</a></li>
            </ul>
        </body>
        </html>
<?php
    } else {
        $_SESSION['msg'] = "Para acceder a este recurso, primero inicia sesion";
        header("Location: ../index.php");
    }
    ?>