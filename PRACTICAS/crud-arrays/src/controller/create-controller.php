<?php
declare(strict_types=1);
session_start();

require_once("../model/book.php");
require_once("../model/db.php");

$db = $_SESSION["db"] ?? [];

if (isset($_POST["create"])) {
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
    $author = filter_input(INPUT_POST, "author", FILTER_SANITIZE_SPECIAL_CHARS);
    $publisher = filter_input(INPUT_POST, "publisher", FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, "pvp", FILTER_VALIDATE_FLOAT);

    $dst = "../img/".$_FILES["img"]["name"];
    move_uploaded_file($_FILES["img"]["tmp_name"], $dst);

    if ($id !== false && $title && $author && $price && $_FILES["img"]["name"] !== false) {
        $book = createBook($id, $title, $author, $publisher, $price, $_FILES["img"]["name"]);
        insertBook($book); 
        $_SESSION["db"] = $db;
        $_SESSION["msg"] = "Libro creado correctamente.";
    } else {
        $_SESSION["msg"] = "Datos inválidos. Verifique los campos.";
    }

    header("Location: ../index.php");
}
