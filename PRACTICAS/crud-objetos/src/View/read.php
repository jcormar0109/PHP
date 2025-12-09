<?php
declare(strict_types=1);
session_start();

require_once("../Model/Book.php");
require_once("../Model/Db.php");

use Model\Db;

// Restauramos libros desde sesión
$books = $_SESSION["books"] ?? [];
$db = new Db();
$db->setBooks($books);

$allBooks = $db->getBooks();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Libros</title>
</head>

<body>
  <h2>Listar Libros (<?= count($allBooks) ?>)</h2>
  <hr />
  <?php if (empty($allBooks)): ?>
    <p>No hay libros registrados.</p>
  <?php else: ?>
    <?php foreach ($allBooks as $book): ?>
      <ul>
        <li><strong>ID:</strong> <?= htmlspecialchars((string) $book->getId()) ?></li>
        <li><strong>Título:</strong> <?= htmlspecialchars($book->getTitle()) ?></li>
        <li><strong>Autor:</strong> <?= htmlspecialchars($book->getAuthor()) ?></li>
        <li><strong>Editorial:</strong> <?= htmlspecialchars($book->getAuthor()) ?></li>
        <li><strong>PVP:</strong> <?= htmlspecialchars((string) $book->getPrice()) ?></li>
      </ul>
      <img src="../img/<?= htmlspecialchars($book->getImg()) ?>" height="100px" width="100px" />
      <hr />
    <?php endforeach; ?>
  <?php endif; ?>
</body>

</html>
