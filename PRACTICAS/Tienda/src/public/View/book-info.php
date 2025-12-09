<?php
require_once '../../vendor/autoload.php';
use App\Model\Db;
session_start();
$db = Db::getInstance();
$book = $_SESSION['book'];
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <title>Detalle del Libro</title>

    <style>
        body {
            font-family: "Inter", Arial, sans-serif;
            background: #f1f3f4;
            margin: 0;
            padding: 0;
            color: #263238;
        }

        /* HEADER */
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

        /* CONTENEDOR PRINCIPAL */
        .detail-wrapper {
            max-width: 1100px;
            margin: 40px auto;
            display: flex;
            gap: 40px;
            padding: 20px;
            justify-content: center;
            align-items: flex-start;
        }

        /* PORTADA */
        .book-cover {
            width: 300px;
            height: 420px;
            background: #cfd8dc;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            color: #37474f;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* INFORMACIÓN */
        .detail-card {
            width: 480px;
            background: white;
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            transition: 0.25s ease;
        }

        .detail-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 26px rgba(0,0,0,0.22);
        }

        .book-title {
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 8px;
            color: #263238;
        }

        .book-author {
            font-size: 16px;
            color: #546e7a;
            margin-bottom: 18px;
        }

        .info-row {
            margin: 10px 0;
            font-size: 16px;
            color: #37474f;
        }

        .info-row strong {
            color: #263238;
        }

        /* BOTÓN CARRITO */
        .cart-btn {
            margin-top: 25px;
            width: 100%;
            padding: 13px;
            font-size: 17px;
            font-weight: 600;
            background: #0288d1;
            border: none;
            border-radius: 12px;
            color: white;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .cart-btn:hover {
            background: #03a9f4;
            transform: scale(1.06);
        }

        h4.msg {
            text-align: center;
            color: #00796b;
            font-size: 18px;
            margin-top: 15px;
            font-weight: 600;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .detail-wrapper {
                flex-direction: column;
                align-items: center;
            }

            .book-cover {
                width: 250px;
                height: 350px;
            }

            .detail-card {
                width: 92%;
            }
        }
    </style>

</head>

<body>

<header>
    <div class="left-nav">
        <a href="../index.php"><span class="material-symbols-outlined">home</span>Inicio</a>
        <?php

        if (isset($_SESSION['added'])) {
                echo "<a href='cart-view.php'><span class='material-symbols-outlined'>add_shopping_cart</span>Carrito</a>";
                unset($_SESSION['added']);
            }else {
                echo "<a href='cart-view.php'><span class='material-symbols-outlined'>shopping_cart</span>Carrito</a>";
            }

        echo "</div>
        <div class='right-nav'>";

            if (!isset($_SESSION['user'])){
            echo "<a href='../View/login.php'><span class='material-symbols-outlined'>login</span>Login</a>";
        } else {
            echo "<a href='../Controller/logout-controller.php'><span class='material-symbols-outlined'>logout</span>Logout</a>";
        }

    echo "</div>
    </header>";

    if (isset($_SESSION['msg'])) {
        echo "<h4 class='msg'>".$_SESSION['msg']."</h4>";
        unset($_SESSION['msg']);
    }
    ?>

<div class="detail-wrapper">

    <div class="book-cover">
        PORTADA
    </div>

    <div class="detail-card">
        <div class="book-title"><?= htmlspecialchars($book->getTitle()) ?></div>
        <div class="book-author">Escrito por <?= htmlspecialchars($book->getAuthor()) ?></div>

        <p class="info-row"><strong>ISBN:</strong> <?= htmlspecialchars($book->getIsbn()) ?></p>
        <p class="info-row"><strong>Precio sin IVA:</strong> <?= htmlspecialchars($book->getPvp()) ?> €</p>
        <p class="info-row"><strong>Precio con IVA:</strong> <?= htmlspecialchars($book->getIva()) ?> €</p>
        <p class="info-row"><strong>Stock disponible:</strong> <?= htmlspecialchars($book->getStock()) ?></p>

        <form method="POST" action="../Controller/cart-controller.php">
            <button type="submit" name="carrito" class="cart-btn">
                Añadir al carrito
            </button>
        </form>
    </div>

</div>

</body>
</html>
