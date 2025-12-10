<?php
require_once("../../vendor/autoload.php");
use App\Model\Db;
$db = Db::getInstance();
session_start();
$user = $_SESSION['user'] ?? null;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Búsqueda / Libros</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eceff1;
            margin: 0;
            padding: 0 20px;
        }

        /* ===== HEADER ===== */
        header {
            background: #263238;
            padding: 15px 40px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.25);
        }

        .left-nav, .right-nav {
            display: flex;
            gap: 28px;
            align-items: center;
        }

        header a {
            color: white;
            text-decoration: none;
            font-size: 17px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: 0.25s ease;
            padding: 6px 10px;
            border-radius: 6px;
        }

        header a:hover {
            background: rgba(255,255,255,0.12);
            transform: translateY(-2px);
        }

        /* ===== LISTA DE LIBROS ===== */
        .list-container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
        }

        .book-item {
            display: grid;
            grid-template-columns: 70px 1fr 100px 120px;
            align-items: center;
            padding: 14px 10px;
            border-bottom: 1px solid #ddd;
            gap: 20px;
        }

        .book-item:last-child {
            border-bottom: none;
        }

        .book-cover {
            width: 60px;
            height: 85px;
            background: #cfd8dc;
            border-radius: 6px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .book-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .book-title {
            font-size: 18px;
            font-weight: bold;
            color: #263238;
        }

        .book-author {
            font-size: 15px;
            color: #455a64;
        }

        .book-price {
            font-size: 16px;
            font-weight: bold;
            color: #00796b;
            text-align: right;
        }

        .book-item a.detail-btn {
            text-decoration: none;
            background: #0288d1;
            color: white;
            padding: 8px 14px;
            border-radius: 8px;
            transition: 0.2s;
            text-align: center;
            font-weight: bold;
        }

        .book-item a.detail-btn:hover {
            background: #03a9f4;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            font-size: 28px;
            color: #37474f;
        }
    </style>
</head>

<body>

<header>
    <div class="left-nav">
        <a href="../index.php"><span class="material-symbols-outlined">home</span>Inicio</a>
        <a href="cart-view.php"><span class="material-symbols-outlined">
            <?php echo isset($_SESSION['added']) ? 'add_shopping_cart' : 'shopping_cart'; ?>
        </span>Carrito</a>
    </div>

    <div class="right-nav">
        <?php
        if (!isset($_SESSION['user'])){
            echo "<a href='login.php'><span class='material-symbols-outlined'>login</span>Login</a>";
        } else {
            echo "<a href='Controller/logout-controller.php'><span class='material-symbols-outlined'>logout</span>".$user->getUsername()."</a>";
            echo "<a href='Controller/logout-controller.php'><span class='material-symbols-outlined'>receipt</span>Pedidos</a>";
        }
        ?>
    </div>
</header>

<h2>Libros</h2>

<div class="list-container">
    <?php
    if (isset($_SESSION['books'])) {
        $books = $_SESSION['books'];

        foreach ($books as $book) {
            // Ruta de la imagen según ISBN
            $coverPath = "../img/{$book["ISBN"]}.jpg";
            $coverImg = file_exists($coverPath)
                    ? "<img src='{$coverPath}' alt='Portada de {$book["TITLE"]}'>"
                    : "PORTADA";

            echo "
            <div class='book-item'>
                <div class='book-cover'>{$coverImg}</div>

                <div class='book-info'>
                    <span class='book-title'>{$book["TITLE"]}</span>
                    <span class='book-author'>Autor: {$book["AUTHOR"]}</span>
                </div>

                <span class='book-price'>{$book["IVA"]} €</span>

                <a href='../Controller/search-controller.php?title={$book["TITLE"]}&author={$book["AUTHOR"]}' class='detail-btn'>Detalles</a>
            </div>";
        }
    }
    ?>
</div>

</body>
</html>
