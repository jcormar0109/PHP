<?php
require_once '../../vendor/autoload.php';
use App\Model\Db;
session_start();
$db = Db::getInstance();
$book = $_SESSION['book'];
$user = $_SESSION['user'] ?? null;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Detalle del Libro</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eceff1;
            margin: 0;
            padding: 0;
        }

        /* HEADER MODERNO */
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

        /* CONTENIDO DETALLE */
        .detail-wrapper {
            max-width: 1100px;
            margin: 35px auto;
            display: flex;
            gap: 40px;
            padding: 20px;
            justify-content: center;
            align-items: center;
        }

        .book-cover {
            width: 300px;
            height: 420px;
            background: #cfd8dc;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .detail-card {
            width: 480px;
            background: white;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            transition: .25s;
        }

        .detail-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        }

        .book-title {
            font-size: 28px;
            font-weight: bold;
            color: #263238;
            margin-bottom: 10px;
        }

        .book-author {
            font-size: 18px;
            color: #546e7a;
            margin-bottom: 20px;
        }

        .info-row {
            margin: 12px 0;
            font-size: 17px;
        }

        .info-row strong {
            color: #263238;
        }

        .add-cart-btn {
            font-family: inherit;
            font-size: 20px;
            background: #0288d1;
            color: white;
            fill: white;
            padding: 0.9em 1em;
            width: 100%;
            cursor: pointer;
            border: none;
            border-radius: 12px;
            font-weight: 900;
            transition: 0.3s ease;
            margin-top: 25px;
            position: relative;
            overflow: hidden;
        }

        .add-cart-btn svg {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            width: 34px;
            height: 34px;
            transition: all 0.45s ease-in-out;
            z-index: 5;
        }

        .add-cart-btn span {
            margin-left: 50px;
            transition: opacity 0.3s ease-in-out;
        }

        .add-cart-btn:hover svg {
            left: 50%;
            transform: translate(-50%, -50%) scale(1.4);
        }

        .add-cart-btn:hover span {
            opacity: 0;
        }

        .add-cart-btn:hover {
            background: #039be5;
        }

        .add-cart-btn:active {
            transform: scale(0.94);
        }

        h4.msg {
            text-align: center;
            color: green;
            margin-top: 15px;
        }

        @media (max-width: 900px) {
            .detail-wrapper {
                flex-direction: column;
            }

            .book-cover {
                width: 250px;
                height: 350px;
            }

            .detail-card {
                width: 90%;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="left-nav">
        <a href="../index.php"><span class="material-symbols-outlined">home</span>Inicio</a>
        <a href="cart-view.php"><span class="material-symbols-outlined">
            <?php
            if (isset($_SESSION['added'])){
                echo 'add_shopping_cart';
                unset($_SESSION['added']);
            } else {
                echo 'shopping_cart';
            }  ?>
        </span>Carrito</a>
    </div>

    <div class="right-nav">
        <?php
        if (!isset($_SESSION['user'])) {
            echo "<a href='login.php'><span class='material-symbols-outlined'>login</span>Login</a>";
        } else {
            echo "<a href='../Controller/logout-controller.php'><span class='material-symbols-outlined'>logout</span>".$user->getUsername()."</a>";
            echo "<a href='orders-view.php'><span class='material-symbols-outlined'>receipt</span>Pedidos</a>";
        }
        ?>
    </div>
</header>

<?php
if (isset($_SESSION['msg'])) {
    echo "<h4 class='msg'>".$_SESSION['msg']."</h4>";
    unset($_SESSION['msg']);
}
?>

<div class="detail-wrapper">

    <div class="book-cover">
        <img src="../../img/<?= $book->getIsbn() ?>.jpg" alt="Portada de <?= $book->getTitle() ?>">
    </div>

    <div class="detail-card">

        <div class="book-title"><?= $book->getTitle() ?></div>
        <div class="book-author">Escrito por <?= $book->getAuthor() ?></div>

        <p class="info-row"><strong>ISBN:</strong> <?= $book->getIsbn() ?></p>
        <p class="info-row"><strong>Precio sin IVA:</strong> <?= $book->getPvp() ?> €</p>
        <p class="info-row"><strong>Precio con IVA:</strong> <?= $book->getIva() ?> €</p>
        <p class="info-row"><strong>Stock disponible:</strong> <?= $book->getStock() ?></p>
        <p class="info-row"><strong>Descripcion:</strong> <?= $book->getResume() ?></p>

        <form method="POST" action="../Controller/cart-controller.php">
            <button type="submit" name="carrito" class="add-cart-btn">
                <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="30" height="30" viewBox="0 0 24 24">
                            <path d="M7 4h-2l-1 2h2l3.6 7.59-1.35 2.44C7.52 16.37
                                     8.48 18 10 18h9v-2h-9l1.1-2h7.45c.75 0 1.41-.41
                                     1.75-1.03l3.58-6.49A1 1 0 0 0 22 4H7zm-2 16a2 2 0
                                     1 0 0-4 2 2 0 0 0 0 4zm12 0a2 2 0 1 0
                                     .001-3.999A2 2 0 0 0 17 20z"/>
                        </svg>
                    </div>
                </div>
                <span>Añadir al carrito</span>
            </button>
        </form>

    </div>

</div>

</body>
</html>
