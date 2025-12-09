<?php
declare(strict_types=1);
session_start();
require_once("../model/book.php");
require_once("../model/db.php");

$db = $_SESSION["db"] ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Libros</title>
</head>
<body>
  <h2>Listar Libros (<?= count($db); ?>)</h2>
  <hr/>
<?php
foreach ($db as $book) {
    $id = htmlspecialchars((string)getId($book));
    $title = htmlspecialchars(getTitle($book));
    $author = htmlspecialchars(getAuthor($book));
    $publisher = htmlspecialchars(getPublisher($book));
    $price = htmlspecialchars((string)getPrice($book));
    $img = getImg($book);

    echo "<ul>";
        echo "<li><strong>ID:</strong> $id</li>";
        echo "<li><strong>Título:</strong> $title</li>";
        echo "<li><strong>Autor:</strong> $author</li>";
        echo "<li><strong>Editorial:</strong> $publisher</li>";
        echo "<li><strong>PVP:</strong> $price</li>";
    echo "</ul>";
    echo "<img src=\"../img/{$img}\" height=\"100px\" width=\"100px\"/>";
    echo "<hr/>";
}
?>
</body>
</html>
