<?php

declare (strict_types=1);
require_once '../../vendor/autoload.php';

use App\Model\Db;

session_start();

$db = Db::getInstance();

$user = $_SESSION["user"];

if ($user->getRol() == 1) {
    header("Location: ../View/adminHome.php");
} else if ($user->getRol() == 0) {
    header("Location: ../View/userHome.php");
}


