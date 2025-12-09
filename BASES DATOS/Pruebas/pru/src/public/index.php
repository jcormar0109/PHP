    <?php
    require_once("../vendor/autoload.php");

    use app\Model\Cart;
    use app\Model\Db;
    session_start();
    $db = Db::getInstance();
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Librería</title>

    <style>
        /* ===== GENERAL ===== */
        body {
            font-family: Arial, sans-serif;
            background: #eceff1;
            margin: 0;
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

        /* ===== BUSCADOR ===== */
        form.search {
            display: flex;
            justify-content: center;
            margin: 25px 0;
            gap: 10px;
        }

        form.search input {
            width: 45%;
            padding: 12px;
            border-radius: 25px;
            border: none; /* sin borde */
            outline: none;
            font-size: 16px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }

        form.search button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 32px;
            transition: 0.2s;
        }

        form.search button:hover {
            transform: scale(1.1);
        }

        /* ===== TARJETAS LIBROS ===== */
        .books-container {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: center;
            padding: 30px;
        }

        .book-card {
            width: 220px;
            background: white;
            border: none; /* sin borde */
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
            border: none; /* sin borde */
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
        <a href="#"><span class="material-symbols-outlined">home</span>Inicio</a>
        <a href="View/cart-view.php"><span class="material-symbols-outlined">shopping_cart</span>Carrito</a>
    </div>

    <div class="right-nav">
        <?php
        if (!isset($_SESSION['user'])){
            echo "<a href='View/login.php'><span class='material-symbols-outlined'>login</span>Login</a>";
        } else {
            echo "<a href='Controller/logout-controller.php'><span class='material-symbols-outlined'>logout</span>Logout</a>";
        }
        ?>
    </div>
</header>

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

<h2>Libros más vendidos</h2>

<div class="books-container">
    <?php
    $books = $db->getAllBooks();

    foreach ($books as $book) {
        echo "<form method='POST' action='Controller/book-view-controller.php'>";
        echo "<button type='submit' class='book-card' name='book'>";
        echo "<input type='text' name='title' value='{$book["TITLE"]}'>";
        echo "<br><input type='text' name='author' value='{$book["AUTHOR"]}'>";
        echo "<br><br><input type='text' name='price' value='{$book["PVP_IVA"]} €'>";
        echo "</button></form>";
    }
    ?>
</div>

</body>
</html>
