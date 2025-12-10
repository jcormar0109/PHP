<?php
require_once("../../vendor/autoload.php");
use App\Model\Cart;
use App\Model\Book;
use App\Model\Db;

session_start();

$cart = $_SESSION['cart'] ?? new Cart();
$user = $_SESSION['user'] ?? null;
$db = Db::getInstance();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
            rel="stylesheet"
    />
    <title>Carrito</title>
    <style>
        body {
            font-family: "Inter", Arial, sans-serif;
            background: #f0f3f5;
            margin: 0;
            padding: 0 20px;
        }
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
        h2 {
            text-align: center;
            margin-top: 30px;
            font-size: 32px;
            font-weight: 800;
            color: #37474f;
        }
        .list-container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 20px 25px 40px;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
        }
        .book-item {
            display: grid;
            grid-template-columns: 80px 1fr 100px 160px 120px;
            align-items: center;
            padding: 18px 0;
            border-bottom: 1px solid #e0e0e0;
            gap: 20px;
            position: relative;
        }
        .book-item:last-child {
            border-bottom: none;
        }
        .book-cover {
            width: 70px;
            height: 95px;
            background: #cfd8dc;
            border-radius: 8px;
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
        .book-price {
            font-size: 17px;
            font-weight: bold;
            color: #00796b;
            text-align: right;
        }
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
        .delete-stock-container {
            grid-column: 5;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 6px;
        }
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
        .stock-info {
            font-size: 13px;
            color: #888888;
            text-align: right;
            user-select: none;
        }
        .total-price {
            font-size: 20px;
            text-align: right;
            font-weight: bold;
            color: #37474f;
            padding-top: 15px;
        }
        .pay-btn {
            font-family: inherit;
            font-size: 20px;
            background: #29b6f6;
            color: white;
            fill: white;
            padding: 0.9em 1em;
            width: 220px;
            max-width: 90%;
            cursor: pointer;
            border: none;
            border-radius: 30px;
            font-weight: 900;
            transition: 0.3s ease;
            margin: 35px auto 0;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .pay-btn svg {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            width: 32px;
            height: 32px;
            transition: all 0.45s ease-in-out;
            z-index: 5;
        }
        .pay-btn span {
            margin-left: 50px;
            transition: opacity 0.3s ease-in-out;
        }
        .pay-btn:hover svg {
            left: 50%;
            transform: translate(-50%, -50%) scale(1.4);
        }
        .pay-btn:hover span {
            opacity: 0;
        }
        .pay-btn:hover {
            background: #0288d1;
        }
        .pay-btn:active {
            transform: scale(0.94);
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
        if (!isset($_SESSION['user'])) {
            echo "<a href='login.php'><span class='material-symbols-outlined'>login</span>Login</a>";
        } else {
            echo "<a href='../Controller/logout-controller.php'><span class='material-symbols-outlined'>logout</span>" . $user->getUsername() . "</a>";
            echo "<a href='orders-view.php'><span class='material-symbols-outlined'>receipt</span>Pedidos</a>";
        }
        ?>
    </div>
</header>

<?php
if (isset($_SESSION['msg'])) {
    echo "<h4 style='text-align:center;color:red;'>" . $_SESSION['msg'] . "</h4>";
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
            // Ruta de la imagen según ISBN
            $coverPath = "../img/{$item->getIsbn()}.jpg";
            $coverImg = file_exists($coverPath)
                    ? "<img src='{$coverPath}' alt='Portada de {$item->getTitle()}'>"
                    : "PORTADA";

            echo "
            <div class='book-item'>
                <div class='book-cover'>{$coverImg}</div>
                <div class='book-info'>
                    <span class='book-title'>{$item->getTitle()}</span>
                    <span class='book-author'>Autor: {$item->getAuthor()}</span>
                </div>
                <span class='book-price'>{$item->getIva()} €</span>
                <div class='controls'>
                    <a class='quantity-btn' href='../Controller/sum-controller.php?quantity={$item->getQuantity()}&place={$cont}&choice=sum'>
                        <span class='material-symbols-outlined'>add</span>
                    </a>
                    <span class='quantity-number'>{$item->getQuantity()}</span>
                    <a class='quantity-btn' href='../Controller/sum-controller.php?quantity={$item->getQuantity()}&place={$cont}&choice=rest'>
                        <span class='material-symbols-outlined'>remove</span>
                    </a>
                </div>
                <div class='delete-stock-container'>
                    <a href='../Controller/cart-controller.php?isbn={$item->getIsbn()}' class='delete-btn'>Eliminar</a>
                    <div class='stock-info'>
                        Disponible: {$db->getStock($item)}
                    </div>
                </div>
            </div>
            ";
            $total += $item->getIva() * $item->getQuantity();
            $cont++;
        }
        echo "
        <p class='total-price'>Precio total: {$total}€</p>
        <form method='POST' action='../Controller/quantity-controller.php'>
            <button type='submit' class='pay-btn' name='carrito'>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                    <path d='M21 7H3C1.9 7 1 7.9 1 9v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zm0 10H3V9h18v8zm-6-4c0-.55-.45-1-1-1s-1 .45-1 1 .45 1 1 1 1-.45 1-1z'/>
                </svg>
                <span>Pagar</span>
            </button>
        </form>
        ";
    } else {
        echo "<p style='text-align:center;font-size:18px;color:#555;'>Tu carrito está vacío.</p>";
    }
    ?>

</div>
</body>
</html>
