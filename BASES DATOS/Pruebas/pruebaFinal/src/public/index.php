<?php

    require_once '../vendor/autoload.php';

    use App\Model\Db;
    session_start();
    $db = Db::getInstance();

    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h2>LOGIN:</h2>
    <hr>
    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form method="POST" action="Controller/login-controller.php">
        <label>USUARIO:</label>
        <input type="text" id="username" name="username"/>
        <br/>
        <label>CONTRASEÑA:</label>
        <input type="text" id="passwd" name="passwd"/>
        <br/>
        <button type="submit">Login</button>
    </form>
</body>
</html>
