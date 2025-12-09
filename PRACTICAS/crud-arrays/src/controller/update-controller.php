<?php
    declare(strict_types= 1); 
    session_start();

    require_once("../model/book.php");
    require_once("../model/db.php");

    $db = $_SESSION["db"];

    if(isset($_POST["update"])){
        $id     = filter_input(INPUT_POST,"id", FILTER_VALIDATE_INT);
        $title  = filter_input(INPUT_POST,"title", FILTER_SANITIZE_SPECIAL_CHARS);
        $author = filter_input(INPUT_POST,"author", FILTER_SANITIZE_SPECIAL_CHARS);
        $publisher = filter_input(INPUT_POST,"publisher", FILTER_SANITIZE_SPECIAL_CHARS);
        $img = filter_input(INPUT_POST,"img", FILTER_SANITIZE_SPECIAL_CHARS);
        $price  = filter_input(INPUT_POST,"pvp", FILTER_VALIDATE_FLOAT);

        $book = createBook($id, $title, $author, $publisher, $price, $img);
        updateBook($id,$title,$author,$publisher, $price, $img);

        $_SESSION["db"] = $db;
        $_SESSION["msg"] = "Libro actualizado";

        header("Location: ../index.php");
    }
