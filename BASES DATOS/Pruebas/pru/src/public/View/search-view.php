<?php
require_once("../../vendor/autoload.php");
use app\Model\Db;
$db = Db::getInstance();
session_start();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <title>Carrito / Libros</title>

    <style>
        /* ===== GENERAL ===== */
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
        }

        .left-nav, .right-nav {
            display: flex;
            gap: 25px;
            align-items: center;
        }

        header a {
            color: white;
            text-decoration: none;
            font-size: 17px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s;
        }

        header a:hover {
            color: #4fc3f7;
        }

        /* ===== LIBROS COMO CARDS ===== */
        .books-container {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: center;
            padding: 30px 0;
        }

        .book-card {
            width: 220px;
            background: white;
            border: none;
            border-radius: 14px;
            padding: 18px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            cursor: pointer;
            transition: .25s ease;
            text-align: center;
        }

        .book-card:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        }

        .book-card input {
            border: none;
            background: transparent;
            text-align: center;
            font-weight: bold;
            width: 100%;
            font-size: 15px;
            pointer-events: none;
        }

        /* TITULO */
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
        <a href="cart-view.php"><span class="material-symbols-outlined">shopping_cart</span>Carrito</a>
    </div>

    <div class="right-nav">
        <?php
        if (!isset($_SESSION['user'])){
            echo "<a href='../View/login.php'><span class='material-symbols-outlined'>login</span>Login</a>";
        } else {
            echo "<a href='../Controller/logout-controller.php'><span class='material-symbols-outlined'>logout</span>Logout</a>";
        }
        ?>
    </div>
</header>

<hr/>
<h2>Libros</h2>

<div class="books-container">
    <?php
    if (isset($_SESSION['books'])) {
        $books = $_SESSION['books'];
        $count = 1;

        foreach ($books as $book) {
            echo "<form method='POST' action='../Controller/book-view-controller.php'>";
            echo "<button type='submit' class='book-card' name='book'>";
            echo "<input type='text' name='title' value='{$book["TITLE"]}'><br><br>";
            echo "<input type='text' name='author' value='{$book["AUTHOR"]}'><br><br>";
            echo "<input type='text' name='price' value='{$book["PVP_IVA"]} €'><br><br>";
            echo "</button>";
            echo "</form>";
            $count++;
        }
    }
    ?>
</div>

</body>
</html>
