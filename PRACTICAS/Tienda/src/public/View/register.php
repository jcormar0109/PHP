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

    <!-- Importación correcta de Google Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    <title>Register</title>

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

        /* ===== FORMULARIO REGISTER ===== */
        .register-container {
            max-width: 500px;
            background: white;
            border-radius: 14px;
            padding: 25px;
            margin: 40px auto;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            text-align: center;
            transition: 0.25s;
        }

        .register-container:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        }

        .register-container h3 {
            margin-bottom: 20px;
            color: #37474f;
        }

        .register-container label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        .register-container input {
            width: 95%;
            padding: 10px;
            border-radius: 25px;
            border: 1px solid #bbb;
            outline: none;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .register-container button[name="register"] {
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

        .register-container button[name="register"]:hover {
            background: #0288d1;
            transform: scale(1.05);
        }

        .register-container p {
            margin-top: 15px;
            font-size: 14px;
        }

        .register-container p a {
            color: #0288d1;
            text-decoration: none;
            font-weight: bold;
        }

        .register-container p a:hover {
            text-decoration: underline;
        }

        .register-msg {
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

<div class="register-container">

    <?php
    if (isset($_SESSION['msg'])) {
        echo "<div class='register-msg'>".$_SESSION['msg']."</div>";
        unset($_SESSION['msg']);
    }
    ?>

    <h3>REGISTER</h3>

    <form method="POST" action="../Controller/register-controller.php" accept-charset="UTF-8">
        <label for="dni">DNI</label>
        <input type="text" name="dni" id="dni" required>

        <label for="username">Usuario</label>
        <input type="text" name="username" id="username" required>

        <label for="passwd1">Contraseña</label>
        <input type="password" name="passwd1" id="passwd1" required>

        <label for="passwd2">Repetir contraseña</label>
        <input type="password" name="passwd2" id="passwd2" required>

        <label for="name">Nombre</label>
        <input type="text" name="first_name" id="first_name" required>

        <label for="second_name">Apellido</label>
        <input type="text" name="second_name" id="second_name" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="address">Dirección</label>
        <input type="text" name="address" id="address" required>

        <button type="submit" name="register">Registrarse</button>
    </form>

    <p>Ya tienes cuenta? <a href="login.php">Logueate</a></p>
</div>

</body>
</html>
