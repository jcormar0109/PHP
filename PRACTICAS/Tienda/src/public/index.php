<?php
declare(strict_types=1);

require_once "../vendor/autoload.php";

use App\Model\Cart;
use App\Model\Db;
session_start();

$db = Db::getInstance();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$cart = $_SESSION["cart"] ?? new Cart();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = $cart;
}
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Librería</title>

    <style>
        body {
            font-family: "Inter", Arial, sans-serif;
            background: #f1f3f4;
            margin: 0;
            color: #263238;
        }

        header {
            background: #263238;
            padding: 15px 50px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.25);
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

        .left-nav, .right-nav {
            display: flex;
            gap: 28px;
            align-items: center;
        }

        form.search {
            display: flex;
            justify-content: center;
            margin: 30px 0;
            gap: 12px;
        }

        form.search input {
            width: 45%;
            padding: 14px 18px;
            border-radius: 30px;
            border: none;
            outline: none;
            font-size: 16px;
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
            transition: 0.2s ease;
        }

        form.search input:focus {
            box-shadow: 0 0 0 2px #4fc3f7;
        }

        form.search button {
            background: #0288d1;
            color: white;
            border: none;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            font-size: 28px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.25s ease;
        }

        form.search button:hover {
            background: #03a9f4;
            transform: scale(1.08);
        }

        .cards-container {
            max-width: 1300px;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 28px;
            padding: 20px;
        }

        .book-card {
            width: 220px;
            background: white;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            padding: 16px;
            text-align: center;
            transition: 0.25s ease;
        }

        .book-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 26px rgba(0,0,0,0.22);
        }

        .book-cover {
            width: 100%;
            height: 240px;
            background: #cfd8dc;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #37474f;
            font-weight: bold;
            font-size: 15px;
            margin-bottom: 12px;
        }

        .book-title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 4px;
            color: #263238;
        }

        .book-author {
            font-size: 14px;
            color: #546e7a;
            margin-bottom: 12px;
        }

        .book-price {
            font-size: 18px;
            font-weight: 700;
            color: #00796b;
            margin-bottom: 14px;
        }

        .details-btn {
            display: inline-block;
            padding: 10px 14px;
            border-radius: 10px;
            background: #0288d1;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: 0.25s ease;
        }

        .details-btn:hover {
            background: #03a9f4;
            transform: scale(1.06);
        }
    </style>
</head>

<body>

<header>
    <div class="left-nav">
        <a href="#"><span class="material-symbols-outlined">home</span>Inicio</a>
        <a href="View/cart-view.php"><span class="material-symbols-outlined">shopping_cart</span>Carrito</a>
    </div>

    <div class="right-nav">
        <?php
        if (!isset($_SESSION['user'])){
            echo "<a href='View/login.php'><span class='material-symbols-outlined'>login</span>Login</a>";
        } else {
            echo "<a href='Controller/logout-controller.php'><span class='material-symbols-outlined'>logout</span>".$user->getUsername()."</a>";
        }
        ?>
    </div>
</header>

<main>

    <form method="POST" action="Controller/search-controller.php" class="search">
        <input type="text" name="book" placeholder="Buscar libro...">
        <button type="submit" class="material-symbols-outlined" name="search">search</button>
    </form>

    <?php
    if (isset($_SESSION['msg'])) {
        echo "<h4 style='text-align:center;color:red;'>".$_SESSION['msg']."</h4>";
        unset($_SESSION['msg']);
    }
    ?>

    <h2 style="text-align:center; color:#37474f; font-size:32px; font-weight:800; margin-top:15px;">Libros más vendidos</h2>

    <div class="cards-container">
        <?php
        $books = $db->getAllBooks();

        foreach ($books as $book) {
            $url = "Controller/search-controller.php?title={$book["TITLE"]}&author={$book["AUTHOR"]}";

            echo "
            <div class='book-card'>
                <div class='book-cover'>PORTADA</div>
                <div class='book-title'>{$book["TITLE"]}</div>
                <div class='book-author'>Por {$book["AUTHOR"]}</div>
                <div class='book-price'>{$book["IVA"]} €</div>
                <a class='details-btn' href='$url'>Ver detalles</a>
            </div>
            ";
        }
        ?>
    </div>

</main>

</body>
</html>
