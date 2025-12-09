<?php

require_once "../vendor/autoload.php";

use App\Model\Bd;
use App\Model\User;

session_start();

$bd = Bd::getInstance();

if(isset($_POST["login"])){
    $username   = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $passwd     = filter_input(INPUT_POST, "passwd", FILTER_SANITIZE_SPECIAL_CHARS);

    $user = new User(0, $username, $passwd);
    $user = $bd->isUserValdid($user);

    if ($user === false) {
        $_SESSION["msg"] = "ERROR: Las credenciales no son válidas";
        header("location: ../index.php");
    } else {
        $_SESSION["user"] = $user;
        header("location: ../View/home.php");
    }
}

