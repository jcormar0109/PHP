<?php
require_once '../../vendor/autoload.php';
use App\Model\Db;
session_start();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Material Symbols (iconos) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    <title>Login</title>

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

        /* ===== FORMULARIO LOGIN ===== */
        .login-container {
            max-width: 400px;
            background: white;
            border-radius: 14px;
            padding: 25px;
            margin: 40px auto;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            text-align: center;
        }

        .login-container:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        }

        .login-container h3 {
            margin-bottom: 20px;
            color: #37474f;
        }

        .login-container label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        .login-container input {
            width: 95%;
            padding: 10px;
            border-radius: 25px;
            border: 1px solid #bbb;
            outline: none;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .login-container button[name="login"] {
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            background: #4fc3f7;
            border: none;
            border-radius: 25px;
            color: white;
            cursor: pointer;
            transition: 0.25s;
        }

        .login-container button[name="login"]:hover {
            background: #0288d1;
            transform: scale(1.05);
        }

        .login-container p {
            margin-top: 15px;
            font-size: 14px;
        }

        .login-container p a {
            color: #0288d1;
            text-decoration: none;
            font-weight: bold;
        }

        .login-container p a:hover {
            text-decoration: underline;
        }

        .login-msg {
            color: red;
            margin-bottom: 15px;
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
        if (isset($_SESSION['user'])) {
            echo "<a href='../Controller/logout-controller.php'><span class='material-symbols-outlined'>logout</span>Logout</a>";
        }
        ?>
    </div>
</header>

<div class="login-container">

    <?php
    if (isset($_SESSION['msg'])) {
        echo "<div class='login-msg'>".$_SESSION['msg']."</div>";
        unset($_SESSION['msg']);
    }
    ?>

    <h3>LOGIN</h3>

    <form method="POST" action="../Controller/login-controller.php" accept-charset="UTF-8">
        <label for="username">Usuario</label>
        <input type="text" name="username" id="username" required>

        <label for="passwd">Contraseña</label>
        <input type="password" name="passwd" id="passwd" required>

        <button type="submit" name="login">Login</button>
    </form>

    <p>Aún no tienes cuenta? <a href="register.php">Regístrate</a></p>
</div>

</body>
</html>
