<?php
declare(strict_types=1);
require_once("../../vendor/autoload.php");
use app\Model\Db;
use app\Model\User;
session_start();

$db = Db::getInstance();

if(isset($_POST["login"])){
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "passwd", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    if ($username === "" || $password === ""){
        $_SESSION['msg'] = "ERROR, es necesario rellenar todos los campos";
        header('Location: ../View/login.php');

    }else {
            $user = new User($username, $password, "alice", "alice", "alice@gmail.com", "alice");
            $user =  $db->validUser($user);
                if (!$user){
                    $_SESSION['msg'] = "ERROR, el usuario ya existe";
                    header('Location: ../index.php');
                    exit();
                } else{
                    $_SESSION['msg'] = "Bienvenido/a: ".$user->getFisrtName();
                    $_SESSION['user'] = $user;
                    header('Location: ../index.php');
                }
    }

} else {
    $_SESSION['msg'] = "Se ha producido un error al loguearse";
    header('Location: ../View/login.php');
}