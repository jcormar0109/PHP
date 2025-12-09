<?php
require_once '../../vendor/autoload.php';
use app\Model\Db;
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
            padding: 15px 50px;
            color: white;
            display: flex;
            justify-content: space-between;
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

        .left-nav, .right-nav {
            display: flex;
            gap: 30px;
            align-items: center;
        }


        /* ===== CONTENEDOR DE DETALLE ===== */
        .detail-container {
            max-width: 500px;
            background: white;
            border-radius: 14px;
            padding: 25px;
            margin: 30px auto;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            text-align: center;
            transition: 0.25s;
        }

        .detail-container:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        }

        .detail-container p {
            font-size: 16px;
            margin: 12px 0;
        }

        /* BOTÓN AÑADIR AL CARRITO */
        button[name="carrito"] {
            margin-top: 15px;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            background: #4fc3f7;
            border: none;
            border-radius: 25px;
            color: white;
            cursor: pointer;
            transition: 0.25s;
        }

        button[name="carrito"]:hover {
            background: #0288d1;
            transform: scale(1.05);
        }
    </style>
</head>

<body>

<header>
    <!-- IZQUIERDA -->
    <div class="left-nav">
        <a href="../index.php"><span class="material-symbols-outlined">home</span>Inicio</a>
        <a href="cart-view.php"><span class="material-symbols-outlined">shopping_cart</span>Carrito</a>
    </div>

    <!-- DERECHA -->
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
    echo "<h4 style='text-align:center;color:green;'>".$_SESSION['msg']."</h4>";
    unset($_SESSION['msg']);
}
?>

<div class="detail-container">
        <p><strong>Título:</strong> <?= htmlspecialchars($book->getTitle()) ?></p>
        <p><strong>Autor:</strong> <?= htmlspecialchars($book->getAuthor()) ?></p>
        <p><strong>Precio sin IVA:</strong> <?= htmlspecialchars($book->getPvp()) ?> €</p>
        <p><strong>Precio con IVA:</strong> <?= htmlspecialchars($book->getPvpIva()) ?> €</p>

    <form method="POST" action="../Controller/cart-controller.php">
        <button type="submit" name="carrito">Añadir al carrito</button>
    </form>
</div>

</body>
</html>
