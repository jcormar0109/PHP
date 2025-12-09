<?php
require_once("../../vendor/autoload.php");
use App\Model\Cart;
use App\Model\Book;

session_start();

$cart = $_SESSION['cart'] ?? new Cart();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    <title>Carrito</title>

    <style>
        body {
            font-family: "Inter", Arial, sans-serif;
            background: #f0f3f5;
            margin: 0;
            padding: 0 20px;
        }

        /* ===== HEADER ===== */
        header {
            background: #263238;
            padding: 16px 40px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.25);
        }

        .left-nav, .right-nav {
            display: flex;
            gap: 30px;
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
            padding: 6px 10px;
            border-radius: 6px;
            transition: 0.25s ease;
        }

        header a:hover {
            background: rgba(255,255,255,0.12);
            transform: translateY(-2px);
        }

        /* ===== TÍTULO ===== */
        h2 {
            text-align: center;
            margin-top: 30px;
            font-size: 32px;
            font-weight: 800;
            color: #37474f;
        }

        /* ===== CONTENEDOR PRINCIPAL ===== */
        .list-container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 20px 25px 40px;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
        }

        /* ===== ITEM ===== */
        .book-item {
            display: grid;
            grid-template-columns: 80px 1fr 100px 160px 120px;
            align-items: center;
            padding: 18px 0;
            border-bottom: 1px solid #e0e0e0;
            gap: 20px;
        }

        .book-item:last-child {
            border-bottom: none;
        }

        /* PORTADA */
        .book-cover {
            width: 70px;
            height: 95px;
            background: #cfd8dc;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            color: #455a64;
            font-weight: bold;
        }

        /* INFO */
        .book-info {
            display: flex;
            flex-direction: column;
        }

        .book-title {
            font-size: 18px;
            font-weight: bold;
            color: #263238;
            margin-bottom: 4px;
        }

        .book-author {
            font-size: 14px;
            color: #546e7a;
        }

        /* PRECIO */
        .book-price {
            font-size: 17px;
            font-weight: bold;
            color: #00796b;
            text-align: right;
        }

        /* CONTROLES DE CANTIDAD */
        .controls {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        .quantity-btn {
            text-decoration: none;
            padding: 4px;
            border-radius: 6px;
            cursor: pointer;
            color: #1565c0;
            display: flex;
            align-items: center;
            transition: 0.15s ease;
        }

        .quantity-btn:hover {
            background: #e3f2fd;
        }

        .quantity-number {
            font-size: 17px;
            font-weight: 600;
            width: 20px;
            text-align: center;
        }

        /* BOTÓN ELIMINAR */
        .delete-btn {
            background: #e53935;
            color: white;
            padding: 8px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            transition: 0.2s ease;
            display: inline-block;
        }

        .delete-btn:hover {
            background: #b71c1c;
            transform: scale(1.04);
        }

        /* TOTAL */
        .total-price {
            font-size: 20px;
            text-align: right;
            font-weight: bold;
            color: #37474f;
            padding-top: 15px;
        }

        /* BOTÓN PAGAR */
        .pay-btn {
            margin: 35px auto 0;
            display: block;
            padding: 14px 24px;
            font-size: 20px;
            font-weight: bold;
            background: #29b6f6;
            border: none;
            border-radius: 30px;
            color: white;
            cursor: pointer;
            transition: 0.25s;
        }

        .pay-btn:hover {
            background: #0288d1;
            transform: scale(1.07);
        }
    </style>
</head>

<body>

<header>
    <div class="left-nav">
        <a href="../index.php"><span class="material-symbols-outlined">home</span>Inicio</a>
        <a href="#"><span class="material-symbols-outlined">shopping_cart</span>Carrito</a>
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

<?php
if (isset($_SESSION['msg'])) {
    echo "<h4 style='text-align:center;color:red;'>".$_SESSION['msg']."</h4>";
    unset($_SESSION['msg']);
}
?>

<h2>Carrito</h2>

<div class="list-container">

    <?php
    if ($cart->count() > 0) {

        $total = 0;
        $cont = 0;

        foreach ($cart as $item) {

            echo "
        <div class='book-item'>
            
            <div class='book-cover'>PORTADA</div>

            <div class='book-info'>
                <span class='book-title'>{$item->getTitle()}</span>
                <span class='book-author'>Autor: {$item->getAuthor()}</span>
            </div>

            <span class='book-price'>{$item->getIva()} €</span>

            <div class='controls'>
                <a class='quantity-btn'
                   href='../Controller/sum-controller.php?quantity={$item->getQuantity()}&place={$cont}&choice=sum'>
                    <span class='material-symbols-outlined'>add</span>
                </a>

                <span class='quantity-number'>{$item->getQuantity()}</span>

                <a class='quantity-btn'
                   href='../Controller/sum-controller.php?quantity={$item->getQuantity()}&place={$cont}&choice=rest'>
                    <span class='material-symbols-outlined'>remove</span>
                </a>
            </div>

            <a href='../Controller/cart-controller.php?isbn={$item->getIsbn()}' class='delete-btn'>Eliminar</a>

        </div>
        ";

            $total += $item->getIva() * $item->getQuantity();
            $cont++;
        }

        echo "
        <p class='total-price'>Precio total: {$total}€</p>
        <form method='POST' action='../Controller/pay-controller.php'>
            <button type='submit' class='pay-btn' name='carrito'>Pagar</button>
        </form>
    ";

    } else {
        echo "<p style='text-align:center;font-size:18px;color:#555;'>Tu carrito está vacío.</p>";
    }
    ?>

</div>

</body>
</html>
