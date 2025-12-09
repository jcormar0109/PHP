<?php

declare (strict_types=1);
require_once '../vendor/autoload.php';

use App\Model\Db;

session_start();

$db = Db::getInstance();

    if (isset($_SESSION['msg'])) {
        echo "<h3>".$_SESSION['msg']."</h3>";
        echo "<hr/>";
        unset($_SESSION['msg']);
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
</head>
<body>
<h2>REGISTER</h2>
<hr/>
<form action="Controller/login-controller.php" method="POST">
    <label>Usuario</label>
    <input type="text" name="username" id="username"/>
    <br/>
    <label>Constraseña 1</label>
    <input type="text" name="passwd1" id="passwd"/>
    <br/>
    <label>Constraseña 2</label>
    <input type="text" name="passwd2" id="passwd"/>
    <br/>
    <button type="submit" name="register">Registrarse</button>
    <p>tienes cuenta? <a href="index.php">Inicia sesion</a></p>
</form>
</body>
</html>
