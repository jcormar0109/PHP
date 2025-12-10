<?php
declare(strict_types=1);
require_once("../../vendor/autoload.php");
use App\Model\Db;
use App\Model\User;
session_start();

$db = Db::getInstance();

try {
    if(isset($_POST["login"])){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "passwd", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        if ($username === "" || $password === ""){
            $_SESSION['msg'] = "ERROR, es necesario rellenar todos los campos";
            header('Location: ../View/login.php');

        }else {
            $user = new User(0,"example",$username, $password, "example", "example", "example@gmail.com", "example");
            $user =  $db->validUser($user);
            if (!$user){
                $_SESSION['msg'] = "ERROR, las credenciles no son correctas";
                header('Location: ../View/login.php');
                exit();
            } else{
                $_SESSION['msg'] = "Bienvenido/a: ".$user->getFirstName();
                $_SESSION['user'] = $user;
                header('Location: ../index.php');
            }
        }

    } else {
        $_SESSION['msg'] = "Se ha producido un error al loguearse";
        header('Location: ../View/login.php');
    }
}  catch (Exception $error) {
    $_SESSION['msg'] = "Ha ocurrido un error";
    header("location: ../View/login.php");
}
