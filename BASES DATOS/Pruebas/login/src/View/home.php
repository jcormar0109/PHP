<?php

require_once "../vendor/autoload.php";

use App\Model\Bd;
use App\Model\User;

session_start();

$bd = Bd::getInstance();
$user = $_SESSION["user"]  ;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME</title>
</head>
<body>
    <h2>LOGIN</h2>
    <hr/>
    <a href="../Controller/logout.php">Cerrar Sesión (<?= $user->getUsername() ?>)</a>
</body>
</html>
