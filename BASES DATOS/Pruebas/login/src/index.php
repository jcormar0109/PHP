<?php
declare(strict_types=1);

require_once("vendor/autoload.php");

session_start();

$_SESSION["msg"] ??= "";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
<h2>LOGIN</h2>
<hr />
<?php

if(!empty($_SESSION["msg"])){
    echo "<h3>{$_SESSION["msg"]}</h3><hr/>";
}

?>
<form method="POST" action="Controller/login.php">
    <label for="username">Username</label>
    <input id="username" name="username">
    <br>
    <label for="passwd">Password</label>
    <input id="passwd" name="passwd">
    <br>
    <button type="submit" name="login">Login</button>
</form>
</body>
</html>

