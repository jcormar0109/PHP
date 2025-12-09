<?php

    require_once "../../vendor/autoload.php";
    use App\Model\Db;
    use App\Model\Book;
    session_start();

    $db = Db::getInstance();

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
    <h1>Listar:</h1>
    <hr/>
    <?php
        $books = $db->getIterator();
        foreach ($books as $book) {
            echo "Title: " . $book->getTitle() . "<br/>";
            echo "Author: " . $book->getAuthor() . "<br/>";
            echo "Price: " . $book->getPvp() . "<br/>";
        }
    ?>
    </body>
    </html>
    <?php
} else {
    $_SESSION['msg'] = "Para acceder a este recurso, primero inicia sesion";
    header("Location: ../index.php");
}
?>