<?php
declare(strict_types=1);
session_start();

require_once("../Model/Book.php");
require_once("../Model/Db.php");

use Model\Book;
use Model\Db;

$books = $_SESSION["books"] ?? [];
$db = new Db();
$db->setBooks($books);

if (isset($_POST["create"])) {
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
    $author = filter_input(INPUT_POST, "author", FILTER_SANITIZE_SPECIAL_CHARS);
    $publisher = filter_input(INPUT_POST, "publisher", FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, "pvp", FILTER_VALIDATE_FLOAT);

    // Manejo de imagen
    if (!empty($_FILES["img"]["name"])) {
        $dst = "../img/" . basename($_FILES["img"]["name"]);
        move_uploaded_file($_FILES["img"]["tmp_name"], $dst);
        $img = $_FILES["img"]["name"];
    } else {
        $img = "no_image.png";
    }

    if ($id && $title && $author && $price) {
        $book = new Book($id, $title, $author, $publisher ?? "", $price, $img);
        $db->insertBook($book);

        // Guardamos los libros actualizados en la sesión
        $_SESSION["books"] = $db->getBooks();

        $_SESSION["msg"] = "Libro creado correctamente.";
    } else {
        $_SESSION["msg"] = "Datos inválidos. Verifique los campos.";
    }

    header("Location: ../index.php");
    exit;
}
